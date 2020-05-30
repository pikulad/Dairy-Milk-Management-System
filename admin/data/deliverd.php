<?php
require_once "../connection.php";
	if(!isset($_GET['billno'])){
		header("location:index.php");
	}
	else{
		$billno=$_GET['billno'];
		mysqli_query($connection,"UPDATE `tblbill` SET `status`=1 WHERE no=$billno");
		header("location:../index.php");
		
	}
?>