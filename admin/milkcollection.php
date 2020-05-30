
<?php require_once "data/slidebar.php"; ?><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Milk Collection</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Milk Collection</h1>
		</div>
	</div><!--/.row-->
	
    <?php
        if (isset($_POST['btnsubmit']))
        {
            $ctype=$_POST['ddlmc'];
            $litre=$_POST['txtlitre'];
            $staffid=$_POST['ddlandmark'];
			mysqli_query($connection,"insert into tblmilkcollection (cattletype,liter,date,time,staffid) values ('$ctype','$litre',CURRENT_DATE,CURRENT_TIME,'$staffid')");
			header("location:index.php");
        }
        
        
    ?>
	
	<div class="panel panel-default">
		<div class="panel-heading">Collection Form</div>
		
		<div class="panel-body">
			<div class="col-md-10" style="margin-left: 50px;">
				<form role="form" action="#" method="post">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Cattel type</label>
							<select style="margin-left: 20px;" name="ddlmc" title="select Cattle" class="form-control">
								<option value="Cow">Cow</option>
								<option value="Buffelo">Buffalo</option>
							</select>
						
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Litre</label>
							<input type="text" name="txtlitre" class="form-control" style="width: 110%" placeholder="Litres of milk" title="liters" onkeypress="return event.charCode>=48 && event.charCode<=57" minlength="1" maxlength="2">
						
						</div>
					</div>
                    <div class="col-lg-6">
					<div class="form-group">
						<label style="margin-left: 20px;">Collected By:</label>
						<select style="margin-left: 20px;" name="ddlandmark" title="Select Landmark" class="form-control">
                            <option hidden selected>Select Staff</option>
							<?php
								$ddlm = "select * from tblstaff";
								$result = $connection->query($ddlm);
								while ($row = $result->fetch_assoc()) {
									echo "<option value=" . $row['id'] . ">" . $row['fname']." ".$row['lname'] . "</option>";
								}
							?>
						
						</select>
					</div>
                    </div>
					<div>
						<br>
						<div class="col-lg-3">
							
							<div class="form-group">
								<br>
								<input class="btn btn-lg btn-primary form-control" style="width: 80%; margin-left: 40px;" type="submit" value="submit" name="btnsubmit">
							</div>
						</div>
						<div class="col-lg-3">
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
