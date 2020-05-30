<?php
	ob_start();
	session_start();
	require './connection.php';
	$uid=$_SESSION['uid'];
	if(!$_SESSION['username']){
		header("location:login.php");
	}
    if(isset($_POST['btnpass']))
    {
        $password=$_POST['oldpass'];
		$new_password=$_POST['npass'];
		$comfim_password=$_POST['cpass'];
		$change_query=mysqli_query($connection,"select password from tblstaff where id=$uid");
		$userpass=mysqli_fetch_row($change_query);
		if(!$change_query){
		   echo "<script>alert('Username does not exist.')</script>";
        }
		else if($password != $userpass['password']){
			echo "<script>alert('Incorrect Password!')</script>";
		}
		if($new_password != $comfim_password){
			echo "<script>alert('Password does not match.')</script>";
        }
		else{
			$update_query=mysqli_query($connection,"update tblstaff set password='$comfim_password' where id=$uid;");
			if($update_query){
				echo "<script>alert('Your Password have successfully changed')</script>";
			}
			else{
				echo "<script>alert('Error!')</script>";
			}
			
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dudhwala.com - Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>

    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>Dudhwala.com</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Panel</a>
            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-key"></em><span class="label label-danger"></span>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-messages">
                        <form method="post" action="#">
                        <li>
                            <div class="dropdown-messages-box">
                                <div class="message-body">
                                <input type="password" style="margin-left:13%;" name="oldpass" class="form-control" placeholder="Enter Old Password">
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <div class="message-body">
                                    <input type="password" class="form-control" name="npass" style="margin-left:13%;"  placeholder="Enter New Password">
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>

                            <div class="dropdown-messages-box">
                                <div class="message-body">
                                    <input type="password" name=cpass" class="form-control" style="margin-left:13%;" placeholder="Enter Confirm Password">
                                </div>
                            </div>
                        </li>
                        <li>

                            <div class="dropdown-messages-box">
                                <div class="message-body"><small>
                                    <input type="submit" name="btnpass" class="form-control" style="margin-left:13%;" value="Change Passwords"></small>
                                </div>
                            </div>
                        </li>
                        </form>
                    </ul>
                    
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<img src="./image/footer-logo.png" class="img-responsive" alt="">
		</div>
		<div class="profile-usertitle">
			<div class="profile-usertitle-name"><?PHP if(isset($_SESSION['username'])){$adminname=$_SESSION['username']; echo $adminname;} ?></div>
			<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="divider"></div>
	<form role="search">
		<div class="form-group">
		</div>
	</form>
    
    
    <!--
    
    SlideBar
    //
    //
    //
    
    -->
    
	<ul class="nav menu">
		<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		<!--
		<li><a href="elements.php"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
		<li><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>-->
        <li><a href="milkcollection.php"><em class="fa fa-navicon">&nbsp;</em>Milk Collection</a></li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Manage Staff <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-1">
				<li><a class="" href="addstaff.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Staff
					</a></li>
				<li><a class="" href="staffview.php">
						<span class="fa fa-arrow-right">&nbsp;</span> View Staff
					</a></li>
				<li><a class="" href="staff_report.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Staff Reports
					</a></li>
			</ul>
		</li>
		<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Manage Product <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-2">
				<li><a class="" href="addpcategory.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Categories
					</a></li>
				<li><a class="" href="addproduct.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Product
					</a></li>
				<li><a class="" href="productview.php">
						<span class="fa fa-arrow-right">&nbsp;</span> View Product
					</a></li>
			</ul>
		</li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-navicon">&nbsp;</em> Manage Retailer <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-3">
                <li><a class="" href="addretailer.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Retailer
                    </a></li>
                <li><a class="" href="retailerview.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> View Retailers
                    </a></li>
                <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Retailer Reports
                    </a></li>
            </ul>
        </li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
                <em class="fa fa-navicon">&nbsp;</em> Reports <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-4">
                <li><a class="" href="orderreport.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Order Report
                    </a></li>
                <li><a class="" href="staff_report.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Staff Report
                    </a></li>
                <li><a class="" href="deliveryreport.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Delivery Report
                    </a></li>
            </ul>
        </li>
        
		<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
	</ul>
</div><!--/.sidebar-->
