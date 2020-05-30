
<?php require_once "data/slidebar.php"; ?><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Staff Report</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Milk Report</h1>
		</div>
	</div><!--/.row-->
	
	
	
	<div class="panel panel-default">
		<div class="panel-heading">Collection Form</div>
		<div class="panel-body">
			<div class="col-md-11" style="margin-left: 50px;">
				<form role="form" action="#" method="post">
					<div class="col-lg-3">
						<div class="form-group">
							<label style="margin-left: 20px;">Staff:</label>
							<select style="margin-left: 20px;" name="staffid" title="Select Landmark" class="form-control">
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
					<div class="col-lg-3">
						
						<div class="form-group">
							<label style="margin-left: 20px;">Start Date:</label>
							<input type="date" class="form-control" name="sdate" max="<?php echo date('Y-m-d');?>" min="2019-05-01" value="2019-05-01">
						</div>
					</div>
					<div class="col-lg-3">
						
						<div class="form-group">
							<label style="margin-left: 20px;">End Date:</label>
							<input type="date" class="form-control" name="edate" max="<?php echo date('Y-m-d');?>" min="2019-05-01" value="<?php echo date('Y-m-d');?>">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="col-lg-12">
							<div class="form-group"><br>
								<input class="btn btn-lg btn-primary form-control" style="width: 80%; margin-left: 40px;" type="submit" value="submit" name="btnsubmit">
							</div>
						</div>
					</div>
					
					<?php
						if(isset($_POST['btnsubmit'])) {
							
							$sid = $_POST['staffid'];
							$sdate = $_POST['sdate'];
							$edate = $_POST['edate'];
							$report_query = mysqli_query($connection, "SELECT concat(S.fname,' ',S.lname)as name ,MC.cattletype,MC.date,MC.time,MC.liter FROM tblmilkcollection MC INNER JOIN tblstaff S on S.id = MC.staffid WHERE MC.staffid=$sid AND MC.date BETWEEN '$sdate' AND '$edate';");
							
							
							?>
                            <div class="col-lg-11">
                                <table class="table table-hover">
                                    <thead>
                                    <th>Staff Name</th>
                                    <th>Cattle Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Liter</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $total=0;
											while ($report = mysqli_fetch_array($report_query)) {
											    echo "<tr>";
												echo "<td>". $report['name']."</td>";
												echo "<td>". $report['cattletype']."</td>";
												echo "<td>". $report['date']."</td>";
												echo "<td>". $report['time']."</td>";
												echo "<td>". $report['liter']."</td>";
												$total+=$report['liter'];
												echo "</tr>";
											}
                                        ?>
                                        <tr><td colspan="5"></td></tr>
                                    <tr>
                                        <td colspan="4" align="right">
                                            Total Collection:
                                        </td>
                                        <td>
                                            <?php echo $total; ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <th>Staff Name</th>
                                    <th>Cattle Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Liter</th>
                                    </tfoot>
                                </table>
                            </div>
							<?php
						}
                    ?>
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
