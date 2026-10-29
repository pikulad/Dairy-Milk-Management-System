-- Widen only password columns so modern password_hash() values fit.
-- This does not rewrite, delete, or otherwise transform existing credentials.
ALTER TABLE tblcustomer MODIFY password VARCHAR(255) NOT NULL;
ALTER TABLE tblretailer MODIFY password VARCHAR(255) NOT NULL;
ALTER TABLE tblstaff MODIFY password VARCHAR(255) NOT NULL;

-- Rollback is intentionally manual. Do not shrink these columns after any
-- password has been rehashed; verify every value fits in VARCHAR(100) first.
