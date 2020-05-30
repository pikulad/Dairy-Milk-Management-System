<?php
	session_start();
	session_unset();
	unset($_SESSION['retailer_username']);
	unset($_SESSION['rid']);
	session_destroy();
	header("Location:../login.php");
	?>