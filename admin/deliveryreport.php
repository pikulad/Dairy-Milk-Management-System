<?php require_once "data/slidebar.php"; ?><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Report</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Delivery Report</h1>
		</div>
	</div><!--/.row-->
	
	
	
	<div class="panel panel-default">
		<div class="panel-heading">Delivery Report</div>
		<div class="panel-body">
			<div class="col-md-11" style="margin-left: 50px;">
				<form role="form" action="#" method="post">
					<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(app_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
					<div class="col-lg-3">
						<div class="form-group">
							<label style="margin-left: 20px;">Customer Name:</label>
							<input type="search" class="form-control" name="cname" placeholder="Enter Customer Name">
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
							$cn = isset($_POST['cname']) ? trim($_POST['cname']) : '';
							$sdate = isset($_POST['sdate']) ? $_POST['sdate'] : '';
							$edate = isset($_POST['edate']) ? $_POST['edate'] : '';
							if (!app_csrf_is_valid(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null) ||
								!preg_match('/^\d{4}-\d{2}-\d{2}$/', $sdate) ||
								!preg_match('/^\d{4}-\d{2}-\d{2}$/', $edate) || $sdate > $edate) {
								http_response_code(400);
								exit('Invalid report request.');
							}
							$searchName = '%' . $cn . '%';
							$reportStatement = mysqli_prepare($connection, "SELECT concat(tblcustomer.fname, ' ', tblcustomer.lname) AS name, tblcustomer.address, tblcustomer.contactno, tblbill.no, DATE_FORMAT(tblbill.date, '%d/%m/%Y') AS date, tblbill.total_amount, tblbill.status FROM tblbill INNER JOIN tblcustomer ON tblcustomer.id = tblbill.customerid WHERE concat(tblcustomer.fname, ' ', tblcustomer.lname) LIKE ? AND tblbill.date BETWEEN ? AND ?");
							mysqli_stmt_bind_param($reportStatement, 'sss', $searchName, $sdate, $edate);
							mysqli_stmt_execute($reportStatement);
							$report_query = mysqli_stmt_get_result($reportStatement);
							$report_total=mysqli_num_rows($report_query);
							if($report_total<1){
							    echo "<br><br><br><br><br><br><h3 class='form-control'>NO REPORTS FOUND ! </h3>";
                            }else {
								?>
                                <div class="col-lg-11">
                                    <table class="table table-hover">
                                        <thead>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>contactno</th>
                                        <th>Bill Number</th>
                                        <th>Bill Date</th>
                                        <th>Bill Amount</th>
                                        <th>Delivery Status</th>
                                        </thead>
                                        <tbody>
										<?php
											$total = 0;
											while ($report = mysqli_fetch_array($report_query)) {
												echo "<tr>";
												if ($report['status'] == "0") {
													$status = "Pending";
												}
												if ($report['status'] == "1") {
													$status = "Delivered";
												}
												echo "<td>" . $report['name'] . "</td>";
												echo "<td>" . $report['address'] . "</td>";
												echo "<td>" . $report['contactno'] . "</td>";
												echo "<td>" . $report['no'] . "</td>";
												echo "<td>" . $report['date'] . "</td>";
												echo "<td>" . $report['total_amount'] . "</td>";
												echo "<td>" . $status . "</td>";
												echo "</tr>";
											}
										?>
                                        <tr>
                                            <td colspan="7"></td>
                                        </tr>

                                        </tbody>
                                        <tfoot>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>contactno</th>
                                        <th>Bill Number</th>
                                        <th>Bill Date</th>
                                        <th>Bill Amount</th>
                                        <th>Delivery Status</th>
                                        </tfoot>
                                    </table>
                                </div>
								<?php
							}
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
