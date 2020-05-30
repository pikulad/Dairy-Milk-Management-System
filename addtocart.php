<?php
session_start();
require_once "connection.php";
$url=$_SESSION['url'];
/**
 * Created by PhpStorm.
 * User: priyanklad
 * Date: 2019-03-26
 * Time: 20:53

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}*/

if(isset($_SESSION['username'])){

    if(isset($_POST['btnCart'])){
        echo "Welcome";
        $uid=$_SESSION['uid'];
        $pid=$_POST['ddweight'];
        $qty=$_POST['qty'];
        $sql="insert into tblcart (customerid, productid, qty) values ($uid,$pid,$qty)";
        $query=mysqli_query($con,$sql);
        if ($query){
        	$_SESSION['msg']="Thank you!  Product is added in your cart.";
            echo "<script>alert('Thank you!  Product is added in your cart.');</script>";

            header("location:$url");
        }
        else{
			$_SESSION['msg']="Error!   Please Try Again.";
            echo "<script>alert('Error!!');</script>";
            header("location:$url");
        }
    }
    else{

        header("location:$url");
    }
}else{
    header("location:login.php");
}
?>