<?php
require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ||
    !app_csrf_is_valid(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null)) {
    http_response_code(400);
    exit('Invalid request.');
}

$billno = filter_input(INPUT_POST, 'billno', FILTER_VALIDATE_INT);
if (!$billno || $billno < 1) {
    http_response_code(400);
    exit('Invalid bill number.');
}

$statement = mysqli_prepare($connection, "UPDATE tblbill SET status = 1 WHERE no = ?");
mysqli_stmt_bind_param($statement, 'i', $billno);
if (!mysqli_stmt_execute($statement)) {
    mysqli_stmt_close($statement);
    error_log('Unable to update delivery status.');
    http_response_code(500);
    exit('Unable to update delivery status.');
}
mysqli_stmt_close($statement);
header("Location: ../index.php");
exit;
?>