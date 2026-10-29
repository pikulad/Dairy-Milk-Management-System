<?php
require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../connection.php';

$request = $_REQUEST;
$columns = array('fname', 'lname', 'address', 'gender', 'contactno', 'email', 'role');
$draw = isset($request['draw']) ? (int)$request['draw'] : 0;
$orderIndex = isset($request['order'][0]['column']) ? (int)$request['order'][0]['column'] : 0;
$orderColumn = isset($columns[$orderIndex]) ? $columns[$orderIndex] : 'fname';
$orderDirection = isset($request['order'][0]['dir']) && strtolower($request['order'][0]['dir']) === 'desc' ? 'DESC' : 'ASC';
$start = isset($request['start']) ? max(0, (int)$request['start']) : 0;
$length = isset($request['length']) ? (int)$request['length'] : 10;
$length = $length < 1 ? 10 : min($length, 100);
$search = isset($request['search']['value']) ? trim($request['search']['value']) : '';

$totalResult = mysqli_query($connection, "SELECT COUNT(*) AS total FROM tblstaff");
$totalData = (int)mysqli_fetch_assoc($totalResult)['total'];
$where = '';
if ($search !== '') {
    $where = " WHERE fname LIKE CONCAT(?, '%') OR lname LIKE CONCAT(?, '%') OR CAST(contactno AS CHAR) LIKE CONCAT(?, '%') OR email LIKE CONCAT(?, '%')";
}
$countStatement = mysqli_prepare($connection, "SELECT COUNT(*) AS total FROM tblstaff" . $where);
if ($search !== '') {
    mysqli_stmt_bind_param($countStatement, 'ssss', $search, $search, $search, $search);
}
mysqli_stmt_execute($countStatement);
$totalFilter = (int)mysqli_fetch_assoc(mysqli_stmt_get_result($countStatement))['total'];
mysqli_stmt_close($countStatement);

$sql = "SELECT fname,lname,address,gender,contactno,email,role FROM tblstaff" . $where .
    " ORDER BY `$orderColumn` $orderDirection LIMIT ?, ?";
$statement = mysqli_prepare($connection, $sql);
if ($search !== '') {
    mysqli_stmt_bind_param($statement, 'ssssii', $search, $search, $search, $search, $start, $length);
} else {
    mysqli_stmt_bind_param($statement, 'ii', $start, $length);
}
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        $row['fname'],
        $row['lname'],
        $row['address'],
        $row['gender'],
        $row['contactno'],
        $row['email'],
        (int)$row['role'] === 0 ? 'Admin' : 'Employee'
    );
}
mysqli_stmt_close($statement);

header('Content-Type: application/json; charset=utf-8');
echo json_encode(array(
    'draw' => $draw,
    'recordsTotal' => $totalData,
    'recordsFiltered' => $totalFilter,
    'data' => $data
));
?>
