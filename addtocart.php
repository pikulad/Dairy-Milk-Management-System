<?php
require_once __DIR__ . '/app_security.php';
app_start_session();
require_once "connection.php";
$url=isset($_SESSION['url']) ? $_SESSION['url'] : 'shop.php';
/**
 * Created by PhpStorm.
 * User: priyanklad
 * Date: 2019-03-26
 * Time: 20:53

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}*/

if(isset($_SESSION['customer_id'])){

    if(isset($_POST['btnCart'])){
        if (!app_csrf_is_valid(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null)) {
            http_response_code(400);
            exit('Invalid request token.');
        }
        $uid=(int)$_SESSION['customer_id'];
        $pid=isset($_POST['ddweight']) ? filter_var($_POST['ddweight'], FILTER_VALIDATE_INT) : false;
        $qty=isset($_POST['qty']) ? filter_var($_POST['qty'], FILTER_VALIDATE_INT) : false;
        if (!$pid || $pid < 1 || !$qty || $qty < 1 || $qty > 5) {
            http_response_code(400);
            exit('Invalid product or quantity.');
        }
        $statement=mysqli_prepare($con, "INSERT INTO tblcart (customerid, productid, qty) SELECT ?, id, ? FROM tblproduct WHERE id = ? AND status = 1");
        mysqli_stmt_bind_param($statement, 'iii', $uid, $qty, $pid);
        $query=mysqli_stmt_execute($statement) && mysqli_stmt_affected_rows($statement) === 1;
        mysqli_stmt_close($statement);
        if ($query){
        	$_SESSION['msg']="Thank you!  Product is added in your cart.";
            header("Location: " . $url);
            exit;
        }
        else{
			$_SESSION['msg']="Error!   Please Try Again.";
            header("Location: " . $url);
            exit;
        }
    }
    else{

        header("location:$url");
    }
}else{
    header("location:login.php");
    exit;
}
?>