
<?php require_once "data/slidebar.php"; ?><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Order Report</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Customer Order Report</h1>
		</div>
	</div><!--/.row-->
	
	
	
	<div class="panel panel-default">
		<div class="panel-heading">Customer Order Form</div>
		<div class="panel-body">
			<div class="col-md-11" style="margin-left: 50px;">
				<form role="form" action="#" method="post">
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
							$sdate = $_POST['sdate'];
							$edate = $_POST['edate'];
							$report_query = mysqli_query($connection, "select B.no, DATE_FORMAT(B.date,'%d/%m/%Y') as date, PC.name, M.type, C.qty, B.status from tblcustomerorder C inner join tblproduct P on C.productid = P.id inner join tblproductcategory PC on P.productcategoryid = PC.id inner join tblmeasurement M on P.measurementid = M.id INNER JOIN tblbill B on C.billno = B.no WHERE B.date between '$sdate' and '$edate' ORDER BY B.no ASC");
							
							
							?>
							<div class="col-lg-11">
								<table class="table table-hover">
									<thead>
									<th>Bill NO.</th>
									<th>Bill Date</th>
									<th>Product Name</th>
									<th>Type</th>
									<th>Quantity</th>
									<th>Status</th>
									</thead>
									<tbody>
									<?php
										
										while ($report = mysqli_fetch_array($report_query)) {
											echo "<tr>";
												if($report['status']=="0"){
													$status="Pending";
												}
												if($report['status']=="1"){
													$status="Delivered";
												}
											echo "<td>". $report['no']."</td>";
											echo "<td>". $report['date']."</td>";
											echo "<td>". $report['name']."</td>";
											echo "<td>". $report['type']."</td>";
											echo "<td>". $report['qty']."</td>";
											echo "<td>". $status."</td>";
											echo "</tr>";
										}
									?>
									<tr><td colspan="6"></td></tr>
									</tbody>
									<tfoot>
									<th>Bill NO.</th>
									<th>Bill Date</th>
									<th>Product Name</th>
									<th>Type</th>
									<th>Quantity</th>
									<th>Status</th>
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
