
		<?php require_once "data/slidebar.php"; ?><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Manage Product</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Product</h1>
                </div>
            </div><!--/.row-->
            <?php
            $viewproduct = "select * from tblproductcategory";
            $result = $connection->query($viewproduct);
            while ($row = $result->fetch_array()) {
                $id = $row['id'];
                $name = $row['name'];

                
                ?>
            <p class="danger" style="color: red;text-align: center;"><?php if(isset($_SESSION['msgupdate'])){echo $_SESSION['msgupdate']; $_SESSION['msgupdate']="";} ?></p>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $id . " " . $name; ?>
                            
                            <ul class="pull-right panel-settings panel-button-tab-right">
                                <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                        <em class="fa fa-cogs"></em>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <ul class="dropdown-settings">
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Update
                                                    </a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> View
                                                    </a></li>


                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                            <div class="panel-body" style="margin: auto;">
                            <div class="col-md-3">
                                <img src="../<?php echo $row['imagepath']?>" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col-md-9">
                            <form class="form-horizontal" action="" method="post">
                                <fieldset>
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Name</label>
                                        <div class="col-md-9">
                                            <input id="name" name="name" type="text" placeholder="Your name" value="<?php echo $name; ?>" class="form-control" readonly="readonly">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Quantity available:</label>
                                        <div class="col-md-9">
											<?php
												$sql7 = "select * from tblproduct where productcategoryid=$id";
												$query7 = mysqli_query($connection, $sql7);
											?>
                                            <table class="table table-bordered">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                <tr>
													<?php
														if (($num = mysqli_num_rows($query7)) < 1) {
															echo "NOT AVAILABLE";
														}
														while ($row7 = mysqli_fetch_array($query7)) {
															//echo $row7['measurementid'].",";
															$mid = $row7['measurementid'];
															$sql8 = "select * from tblmeasurement where id=$mid";
															$query8 = mysqli_query($connection, $sql8);
							
															while ($row8 = mysqli_fetch_array($query8)) {
																?>
                                                                <td>
																	<?php
																		$type = $row8['type'];
																		if (empty($type)) {
																			echo 'NOT AVAILABLE';
																		} else {
																			echo $type;
																		}
																	?>
                                                                </td>
																<?php
															}
															?>
							
															<?php
							
														}
													?>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <!-- Email input-->
                                    

                                    <!-- Message body -->


                                    <!-- Form actions -->
                                    <!--                                    <div class="form-group">
                                                                            <div class="col-md-12 widget-right">
                                                                                <button type="submit" class="btn btn-default btn-md pull-right">Submit</button>
                                                                            </div>
                                                                        </div>-->
                                </fieldset>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>	<!--/.main-->


        <script src="js/jquery-1.11.1.min.js"></script>
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