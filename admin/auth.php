<?php
require_once __DIR__ . '/../app_security.php';
app_start_session();

if (empty($_SESSION['staff_id']) || !isset($_SESSION['staff_role']) || (int)$_SESSION['staff_role'] !== 0) {
    header('Location: login.php');
    exit;
}
?>
