<?php require_once "data/slidebar.php"; ?><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Manage Retailer</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Add Retailer</h1>
		</div>
	</div><!--/.row-->
	
	<?php
		//$flag=0;
		$error = array();
		if (isset($_POST['btnsubmit'])) {
			$fname = $_POST['txtfname'];
			$lname = $_POST['txtlname'];
			$address = $_POST['txtaddress'];
			$contactno = $_POST['txtcontact'];
			$email = $_POST['txtemail'];
			$password = $_POST['txtpassword'];
			$landmark = $_POST['ddlandmark'];
			$datetime = date("Y-m-d h:i:s");
			if (empty($fname)) {
				$error['fnameerr'] = "Only letters and white space allowed";
			} else {
				if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
					$error['fnameerr'] = "Only letters and white space allowed";
				}
			}
			if (empty($lname)) {
				$error['lnameerr'] = "Only letters and white space allowed";
			} else {
				if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
					$error['lnameerr'] = "Only letters and white space allowed";
				}
			}
			if (empty($contactno)) {
				$error["contacterr"] = 'please enter contact no';
			} else {
				if (strlen($contactno) > 10 && strlen($contactno) < 10 ) {
					$error["contacterr"] = "Contact Number should be 10 digits only.";
				}
				/*if (!filter_var($contactno, FILTER_VALIDATE_INT)) {
					$error["contacterr"] = "Contact should be digits only";
				}*/
			}
			if (empty($password)) {
				$error["passerr"] = "please enter password";
			} else {
				if (strlen($password) < 4) {
					$error["passerr"] = "password should be more than 4 digits only.";
				}
			}
			if(count($error)==0)
			{
				$password=md5($password);
				$name=$fname." ".$lname;
				$sql="insert into tblretailer(name, address, landmarkid, contactno, emailid, password)values('$name','$address',$landmark,$contactno,'$email','$password')";
				echo $sql;
				$query=mysqli_query($connection, $sql);
				if($query)
				{
					header("location:index.php");
				}
				else {
					echo "<script>alert('Registration Denied!&nbsp;');</script>";
				}
			}
			
			//if($flag==0)
			//{
			/*
			 
			 */
			
			// }
		}
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Add Retailer Form</div>
		
		<div class="panel-body">
			<div class="col-md-8" style="margin-left: 50px;">
				<form role="form" action="#" method="post">
					<div class="col-lg-6">
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" type="text" name="txtfname" placeholder="Enter First Name"  title="First Name" value="<?php if(isset($fname)){echo $fname;} ?>">
							
							
							<?php
								if (isset($error['fnameerr'])) {
									echo $error['fnameerr'];
								}
							?>
						
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="txtlname" class="form-control" style="width: 110%" placeholder="Enter Last Name" title="Last Name" value="<?php if(isset($lname)){echo $lname;} ?>">
							
							<?php
								if (isset($error['lnameerr'])) {
									echo $error['lnameerr'];
								}
							?>
						
						</div>
					</div>
					<div class="form-group">
						<label style="margin-left: 20px;">Address</label>
						<textarea class="form-control" name="txtaddress" style="width: 100%;margin-left: 20px;" rows="3" title="Address" placeholder="Enter Address"><?php if(isset($address)){echo $address;} ?></textarea>
					</div>
					<div class="form-group">
						<label style="margin-left: 20px;">Landmark</label>
						<select style="margin-left: 20px;" name="ddlandmark" title="Select Landmark" class="form-control">
							<?php
								$ddlm = "select * from tbllandmark";
								$result = $connection->query($ddlm);
								while ($row = $result->fetch_assoc()) {
									echo "<option value=" . $row['id'] . ">" . $row['Name'] . "</option>";
								}
							?>
						
						</select>
					</div>
					
					<div class="form-group">
						<label style="margin-left: 20px">Contact Number:</label>
						<input type="number" name="txtcontact" style="margin-left: 20px" class="form-control" placeholder="Enter Contact Number" title="Phone Number / Contact Number" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="10" value=value="<?php if(isset($contactno)){echo $contactno;} ?>">
						
						<?php
							if (isset($error["contacterr"])) {
								echo $error["contacterr"];
							}
						?>
					
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label style="margin-left: 5px">Email Id:</label>
							<input style="margin-left: 5px" class="form-control" placeholder="Enter Email Address" name="txtemail" type="email" title="Email Address" value="<?php if(isset($email)){echo $email;} ?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Password</label>
							<input style="width: 110%" type="password" name="txtpassword" placeholder="Enter Password." class="form-control">
							
							<?php
								if (isset($error["passerr"])) {
									echo $error["passerr"];
								}
							?>
						
						
						
						</div>
					</div>
					<div>
						<br>
						<div class="col-lg-6">
							
							<div class="form-group">
								<br>
								<input class="btn btn-lg btn-primary form-control" style="width: 80%; margin-left: 40px;" type="submit" value="submit" name="btnsubmit">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<br>
								<input class="form-control btn btn-lg btn-default" style="width: 80%; margin-left: 50px;" type="reset" value="reset">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


</div>	<!--/.main-->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>
<?php
	ob_end_flush();
?>