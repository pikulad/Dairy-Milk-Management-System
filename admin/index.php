
        <?php include "data/slidebar.php"; ?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div><!--/.row-->
            <?php
				$order_sql="select B.no, DATE_FORMAT(B.date,'%d/%m/%Y') as date, PC.name, M.type, C.qty, B.status from tblcustomerorder C inner join tblproduct P on C.productid = P.id inner join tblproductcategory PC on P.productcategoryid = PC.id inner join tblmeasurement M on P.measurementid = M.id INNER JOIN tblbill B on C.billno = B.no WHERE B.date between CURRENT_DATE - INTERVAL 1 DAY and CURRENT_DATE and B.status = 0 ORDER BY B.no ASC";
				$order_query=mysqli_query($connection,$order_sql);
				$num_order=mysqli_num_rows($order_query);
				
				$earning_query=mysqli_query($connection,"SELECT SUM(total_amount) as total FROM `tblbill` WHERE date BETWEEN CURRENT_DATE - INTERVAL 30 DAY AND CURRENT_DATE");
				$total_query=mysqli_query($connection,"SELECT SUM(total_amount) as total FROM `tblbill`");
				$total_earning=mysqli_fetch_row($total_query);
				$monthly_earning=0;
				while ($earning_data=mysqli_fetch_array($earning_query)){
				    $monthly_earning=$earning_data['total'];
                }
                $cow_query=mysqli_query($connection,"SELECT SUM(liter) from tblmilkcollection where cattletype='Cow' and date=CURRENT_DATE ");
				$cow_liter=mysqli_fetch_row($cow_query);
				if($cow_liter[0]==null){
				    $cow_liter[0]=0;
                }
				
				$buffalo_query=mysqli_query($connection,"SELECT SUM(liter) from tblmilkcollection where cattletype='Buffelo'and date=CURRENT_DATE");
				$buffalo_liter=mysqli_fetch_row($buffalo_query);
				if($buffalo_liter[0]==null){
					$buffalo_liter[0]=0;
				}
				
				$retailer_order=mysqli_query($connection,"select sum(no) from tblRetailerorder where date=current_date ");
				$retailer_query=mysqli_fetch_row($retailer_order);
				if($retailer_query[0]==null)
                {
                    $retailer_query[0]=0;
                }
                
            ?>
            <div class="panel panel-container">
                <div class="row">
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                                <div class="large"><?php echo $num_order;?></div>
                                <div class="text-muted">New Orders</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-blue panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-money color-orange"></em>
                                <div class="large">&#8377;<?php echo $monthly_earning; ?></div>
                                <div class="text-muted">Last 30days Earning</div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $countuser="select count(*) from tblcustomer";
                        $resultcount= mysqli_query($connection, $countuser);
                        $row2= mysqli_fetch_row($resultcount);
                    ?>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                                <div class="large"><?php echo "$row2[0]"; ?></div>
                                <div class="text-muted">Users</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-red panel-widget ">
                            <div class="row no-padding"><em class="fa fa-xl fa-money color-red"></em>
                                <div class="large">&#8377;<?php echo $total_earning['0']; ?></div>
                                <div class="text-muted">Total Earning</div>
                            </div>
                        </div>
                    </div>
                </div><!--/.row-->
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>New Orders</h4>
                            <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $num_order;?>" ><span class="percent"><?php echo $num_order;?>%</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Retailer Order</h4>
                            <div class="easypiechart" id="easypiechart-orange" data-percent=<?php echo $retailer_query[0]; ?> ><span class="percent"><?php echo $retailer_query[0]; ?>%</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Today's Cow Milk</h4>
                            <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo "$cow_liter[0]"; ?>" ><span class="percent"><?php echo $cow_liter[0]." ltr."; ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Today's Buffalo Milk</h4>
                            <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo "$buffalo_liter[0]"; ?>" ><span class="percent"><?php echo "$buffalo_liter[0]"." ltr.";  ?></span></div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h3>RECENT ORDER</h3>
                            <div class="col-md-12 col-xs-12" style="margin: auto;padding: 5%">
                                <?php
                                    
                                    if($num_order < 1){
                                        echo "<h4>NO CUSTOMER ORDER.</h4>";
                                    }
                                    else{
                                    ?>
                                        <table class="table table-hover">
                                            <thead >
                                                <th>Bill No.</th>
                                                <th>Bill Date</th>
                                                <th>Product Name</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($row=mysqli_fetch_array($order_query)){
                                                    $billno=$row['no'];
                                                    echo "<tr>
                                                            <td>".$row['no']."</td>
                                                            <td>".$row['date']."</td>
                                                            <td>".$row['name']."</td>
                                                            <td>".$row['type']."</td>
                                                            <td>".$row['qty']."</td>
                                                            <td><a href='data/deliverd.php?billno=$billno'>Deliverd</a></td>
                                                          </tr>";
                                                }
                                            ?>
                                            </tbody>
                                            <tfoot>
                                                <th>Bill No.</th>
                                                <th>Bill Date</th>
                                                <th>Product Name</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tfoot>
                                        </table>
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 row" style="margin: 0%;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Retailer Order
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                    class="fa fa-toggle-up"></em></span>
                    </div>
                    <div class="panel-body">



                        <!-- Name input-->
                        <div class="form-group">
                            <div class="col-md-9" style="margin: auto;">
                                <table class="table table-responsive" style="margin: auto; margin-left: 17%; ">
                                    <thead>
                                    <th>Retailer Name</th>
                                    <th>Order No.</th>
                                    <th>Liter</th>
                                    <th>Price</th>
                                    <th>Order Date</th>
                                    </thead>
									<?php
										$order_history=mysqli_query($connection,"select t.name,tblRetailerorder.* from tblRetailerorder inner join tblretailer t on tblRetailerorder.retailerid = t.id where tblRetailerorder.date between current_date - interval 3 DAY and current_date ");
										while ($row=mysqli_fetch_array($order_history))
										{
											echo "<tr>
                                                    <td>".$row['name']."</td>
                                                    <td>".$row['no']."</td>
                                                    <td>".$row['litre']."</td>
                                                    <td>".$row['price']."</td>
                                                    <td>".$row['date']."</td>
                                                    </tr>";
										}
									?>
                                    <tfoot>
                                    <th>Retailer Name</th>
                                    <th>Order No.</th>
                                    <th>Liter</th>
                                    <th>Price</th>
                                    <th>Order Date</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h3>Staff Details</h3>
                            <div class="col-md-12 col-xs-12" style="margin: auto;padding: 5%">
                            <?php include "table.php";?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>	<!--/.main-->
        
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