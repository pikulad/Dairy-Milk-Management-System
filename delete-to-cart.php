<?php
require_once __DIR__ . '/app_security.php';
app_start_session();
require_once "connection.php";

if (empty($_SESSION['customer_id'])) {
    header("location:login.php");
    exit;
}
$id = $_SERVER['REQUEST_METHOD'] === 'POST'
    ? (isset($_POST['did']) ? filter_var($_POST['did'], FILTER_VALIDATE_INT) : false)
    : (isset($_GET['did']) ? filter_var($_GET['did'], FILTER_VALIDATE_INT) : false);
if (!$id || $id < 1) {
    header("location:cart.php");
    exit;
}
$customerId = (int)$_SESSION['customer_id'];
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $check = mysqli_prepare($con, "SELECT id FROM tblcart WHERE id = ? AND customerid = ?");
    mysqli_stmt_bind_param($check, 'ii', $id, $customerId);
    mysqli_stmt_execute($check);
    $ownedItem = mysqli_fetch_assoc(mysqli_stmt_get_result($check));
    mysqli_stmt_close($check);
    if (!$ownedItem) {
        http_response_code(404);
        exit('Cart item not found.');
    }
    ?>
    <!doctype html>
    <html lang="en">
    <head><meta charset="utf-8"><title>Remove cart item</title></head>
    <body>
    <form method="post" action="delete-to-cart.php">
        <p>Remove this item from your cart?</p>
        <input type="hidden" name="did" value="<?php echo (int)$id; ?>">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(app_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <button type="submit">Remove item</button>
        <a href="cart.php">Cancel</a>
    </form>
    </body>
    </html>
    <?php
    exit;
}
if (!app_csrf_is_valid(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null)) {
    http_response_code(400);
    exit('Invalid request.');
}
$statement = mysqli_prepare($con, "DELETE FROM tblcart WHERE id = ? AND customerid = ?");
mysqli_stmt_bind_param($statement, 'ii', $id, $customerId);
$query = mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
$_SESSION['msg'] = $query ? "Product removed from your cart." : "Unable to remove product.";
header("Location: cart.php");
exit;
?>