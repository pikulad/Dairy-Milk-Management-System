import pathlib
import unittest


ROOT = pathlib.Path(__file__).resolve().parents[1]


def source(path):
    return (ROOT / path).read_text(encoding="utf-8")


class SecurityContractTests(unittest.TestCase):
    def test_database_credentials_are_environment_configured(self):
        config = source("connection.php")
        self.assertIn("getenv('DB_HOST')", config)
        self.assertIn("getenv('DB_PASSWORD')", config)
        self.assertNotIn('"root"', config)
        self.assertNotIn('"mysql"', config)

    def test_checkout_recomputes_order_and_uses_transaction(self):
        checkout = source("checkout.php")
        self.assertIn("SELECT C.productid, C.qty, P.price", checkout)
        self.assertIn("mysqli_begin_transaction($con)", checkout)
        self.assertIn("mysqli_commit($con)", checkout)
        self.assertIn("mysqli_rollback($con)", checkout)
        self.assertNotIn("$_POST['total_amt']", checkout)
        self.assertNotIn("$_SESSION['product']", checkout)

    def test_password_helpers_support_secure_hashing_and_legacy_login(self):
        security = source("app_security.php")
        self.assertIn("password_verify($plainPassword, $storedPassword)", security)
        self.assertIn("password_hash($plainPassword, PASSWORD_DEFAULT)", security)
        self.assertIn("md5($plainPassword)", security)
        self.assertIn("app_upgrade_password", source("login.php"))

    def test_sensitive_bill_lookup_is_customer_scoped(self):
        invoice = source("purchase_bill.php")
        self.assertIn("B.customerid=?", invoice)
        self.assertIn("mysqli_stmt_bind_param($bill_statement, 'ii', $billno, $customerId)", invoice)

    def test_delivery_mutation_requires_staff_session_and_csrf(self):
        endpoint = source("admin/data/deliverd.php")
        self.assertIn("require_once __DIR__ . '/../auth.php'", endpoint)
        self.assertIn("app_csrf_is_valid", endpoint)
        self.assertIn("$_SERVER['REQUEST_METHOD'] !== 'POST'", endpoint)

    def test_uploaded_category_uses_generated_image_name_and_prepared_insert(self):
        upload = source("admin/addpcategory.php")
        self.assertIn("random_bytes(16)", upload)
        self.assertIn("FILEINFO_MIME_TYPE", upload)
        self.assertIn("mysqli_prepare($connection", upload)
        self.assertNotIn("$picture", upload)

    def test_admin_reports_and_staff_updates_bind_request_data(self):
        delivery_report = source("admin/deliveryreport.php")
        order_report = source("admin/orderreport.php")
        staff_report = source("admin/staff_report.php")
        staff_update = source("admin/updatestaff.php")
        self.assertIn("mysqli_stmt_bind_param($reportStatement, 'sss'", delivery_report)
        self.assertIn("mysqli_stmt_bind_param($reportStatement, 'ss'", order_report)
        self.assertIn("mysqli_stmt_bind_param($reportStatement, 'iss'", staff_report)
        self.assertIn("mysqli_stmt_bind_param($updateStatement", staff_update)
        self.assertNotIn("LIKE '%$cn%'", delivery_report)
        self.assertNotIn("BETWEEN '$sdate' AND '$edate'", staff_report)

    def test_price_lookup_binds_and_validates_product_id(self):
        lookup = source("load_price.php")
        self.assertIn("FILTER_VALIDATE_INT", lookup)
        self.assertIn("mysqli_prepare($con, \"SELECT price FROM tblproduct WHERE id = ? AND status = 1\")", lookup)
        self.assertIn("mysqli_stmt_bind_param($statement, 'i', $productId)", lookup)


if __name__ == "__main__":
    unittest.main()
