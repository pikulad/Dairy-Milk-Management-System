<?php

session_start();
include "connection.php";

//product data fetch

if (!isset($_GET['did'])) {
    header("location:cart.php");
} else {
    $id = $_GET['did'];
    $sql = "delete from tblcart where id=$id";
    $query = mysqli_query($con, $sql);
    $_SESSION['msg']="Product Remove from cart.";
    echo "<script>alert('Product Remove from cart.');</script>";
    header("location:cart.php");
}
?>