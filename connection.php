
<?php
require_once __DIR__ . '/app_security.php';

$dbhost = getenv('DB_HOST');
$dbuser = getenv('DB_USER');
$dbpass = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');

if ($dbhost === false || $dbuser === false || $dbpass === false || $database === false ||
    $dbhost === '' || $dbuser === '' || $dbpass === '' || $database === '') {
    error_log('Database configuration is incomplete.');
    http_response_code(500);
    exit('Application database configuration is unavailable.');
}

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $database);
if (!$con) {
    error_log('Database connection failed.');
    http_response_code(500);
    exit('Application database is unavailable.');
}

mysqli_set_charset($con, 'utf8mb4');
$connection = $con;
?>