# DESI MILK WALA security audit and local patch

## Scope and evidence

This review covers first-party PHP application code and `dudhwala.sql`; vendored
libraries were excluded. The repository is a legacy PHP/MySQL application with
customer ordering, staff/admin and retailer pages. Its README describes
WampServer, and the SQL dump contains legacy MySQL/PHP-era schema conventions.
The reviewed checkout shows payment on delivery; no online payment provider or
payment-verification implementation was found.

The SQL dump contains old customer/staff/retailer records with contact and
credential fields. Its records were not copied into this report. No production
system or database was accessed.

## Findings and changes

| Severity | Finding and evidence | Patch status |
|---|---|---|
| Critical | `admin/addpcategory.php` relied on the generic `username` session that customer login also set, then wrote uploaded files into a served directory using the client filename. | Requires an admin-role staff session; validates upload MIME and size, generates a random filename, uses a prepared insert and CSRF token. |
| High | `connection.php`, `admin/connection.php`, `retailer/index.php`, and `admin/data/dtstaff.php` embedded MySQL credentials. | Central connection now requires non-empty `DB_*` environment values and emits generic client errors; affected duplicate connection code now uses it. `.env.example` contains placeholders only. |
| High | Customer passwords were MD5 or plain text, retailer/staff passwords could be plain text, and staff creation/login used direct comparison. | New customer/staff/retailer passwords are hashed. Successful legacy login verifies plaintext or MD5 once, then upgrades that credential to `password_hash()`. This is a gradual, backward-compatible migration; dormant accounts remain legacy until they log in. |
| High | `admin/addpcategory.php` allowed a customer session to reach a potentially executable upload. | Authentication checks a staff-only session and the staff role. Upload filenames use image extensions only after server-side MIME detection. Deployment must still deny script execution from upload directories. |
| Medium | `checkout.php` interpolated address fields into SQL and trusted posted totals; order rows came from session state, and bill/item/cart operations had no transaction. | Address and cart queries are prepared; checkout recomputes from database cart/product rows, validates quantities and totals, locks cart rows, creates bill/items and clears cart in a transaction. Empty-cart replay is rejected. |
| Medium | `purchase_bill.php` looked up invoices by bill number without authenticating or confirming ownership. | Requires a customer session; both bill and order queries are parameterized and scoped to the logged-in customer. |
| Medium | `admin/data/deliverd.php` accepted unauthenticated GET requests to mark orders delivered. | Requires an admin-role staff session, POST and CSRF validation, and a prepared bill update. The admin screen submits a CSRF-protected form. |
| Medium | `admin/data/dtstaff.php` built search, sorting and pagination SQL from request data and used a hardcoded database account. | Uses the shared connection, admin authorization, bound search/pagination parameters and a fixed sort-column allowlist. |
| Medium | Admin report filters, staff-edit lookups, milk collection writes and `load_price.php` built SQL from submitted values. | Switched those paths to prepared statements, validate dates/IDs/quantities and add CSRF checks to staff report/milk collection forms. |
| Low | Login/session mutation routes lacked CSRF/session-hardening controls. Cart mutation and retailer-order routes also accepted weakly validated values. | Added session cookie hardening, session ID regeneration on login, CSRF checks on touched forms and validated/prepared cart and retailer-order writes. |

## Important remaining risks

- The audit and patch are not a complete remediation of every interpolated SQL
  query in this legacy repository. The targeted application paths above are
  parameterized, but other legacy queries outside this first patch scope still
  need a repository-wide prepared-query and authorization pass.
- Most legacy admin pages share the protected sidebar include; perform a
  runtime role-by-role authorization test of every route before deployment.
- The database schema stores order totals as integers while product prices are
  `FLOAT`; this patch rounds calculated totals to match the existing bill
  column. Currency precision and historical price snapshots need a business
  decision and a separately planned schema change.
- Passwords are rehashed only on successful legacy login. If legacy passwords
  may have been exposed, require password resets rather than relying only on
  gradual upgrades.
- The app has no discovered online payment integration. The current reviewed
  customer checkout is pay-on-delivery and does not establish payment
  settlement.
- Environment variables must be configured by the local web server/runtime;
  this repository does not include a dotenv loader. Keep `.env` outside version
  control and do not expose it through the web server.
- Deployment HTTPS, web-server upload execution rules, backups, monitoring,
  rate limits, email delivery, and production PHP/MySQL compatibility were not
  verified. `mysqli_stmt_get_result()` requires the mysqlnd driver.

## Automated checks and test status

`tests/test_security_contracts.py` adds standard-library static regression
checks for DB configuration, transaction-based checkout, password migration,
invoice ownership, delivery authorization and upload handling. These are
source-contract checks, not end-to-end database tests.

The current environment has no `php` or `composer` executable, so PHP lint,
database integration tests, concurrent checkout tests, browser tests, and
existing application behavior could not be run here. Do not treat the patch as
production-approved until those checks pass against an isolated local database.

## Local application and migration guide

1. Make a separate local Git branch and back up your local database. Do not run
   this against production.
2. Configure `DB_HOST`, `DB_NAME`, `DB_USER`, and `DB_PASSWORD` in the local
   PHP/Apache environment. Use a dedicated database account with only the
   required application privileges; the example values in `.env.example` are
   placeholders, not credentials.
3. Before deploying the password code locally, run
   `migrations/20261029_expand_password_hash_columns.sql` against a disposable
   copy or your backed-up local database. It only widens password columns and
   preserves stored values.
4. Run `python -m unittest discover -s tests -v`. With PHP installed, run
   `php -l` on every changed PHP file and then exercise customer registration,
   legacy and hashed customer/staff/retailer logins, add/remove cart, checkout,
   replay/concurrent checkout, invoice ownership and delivery authorization
   against test accounts in the isolated database.
5. Confirm invalid CSRF requests, tampered totals, invalid quantities,
   unowned invoice IDs, non-admin sessions and non-image uploads are rejected.
   Verify order rows and cart state roll back together when an insert fails.

## Rollback

Disable the patched PHP application and restore the local code branch if the
checks fail. The SQL migration does not rewrite credential values, and wider
varchar columns can normally remain in place during an application rollback.
Do not shrink columns automatically: only consider changing them back to
`VARCHAR(100)` after confirming all stored password strings fit and after
stopping every version that writes newer hashes. Restoring a pre-migration
database backup is the only complete rollback of database state; do this only
for the local copy and never overwrite production data.
