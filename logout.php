<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


	setcookie("username", "", time() - 60);
	session_unset();
	session_destroy();
	header("Location: index.php");
?>