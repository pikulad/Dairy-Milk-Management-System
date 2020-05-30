	<?php require_once "data/slidebar.php"; ?><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Manage Staff</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Staff</h1>
                </div>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                  <div class="col-xs-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h3>All Staff Details</h3>
                            <div class="col-md-12 col-xs-12" style="padding: 5%">
								<?php include "table.php";?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <?php
            $viewstaff = "select * from tblstaff";
            $result = $connection->query($viewstaff);
            while ($row = $result->fetch_array()) {
                $id = $row['id'];
                $name = $row['fname'] . " " . $row['lname'];

                $email = $row['email'];
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
                                                <li><a href="updatestaff.php?id=<?php echo $row['id']; ?>">
                                                        <em class="fa fa-cog"></em> Update
                                                    </a></li>
                                                <li class="divider"></li>
                                                <li><a href="staffdetails.php?id=<?php echo $row['id']; ?>">
                                                        <em class="fa fa-cog"></em> View
                                                    </a></li>


                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="post">
                                <fieldset>
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Name</label>
                                        <div class="col-md-9">
                                            <input id="name" name="name" type="text" placeholder="Your name" value="<?php echo $name; ?>" class="form-control" readonly="readonly">
                                        </div>
                                    </div>

                                    <!-- Email input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="email">Staff E-mail</label>
                                        <div class="col-md-9">
                                            <input id="email" name="email" type="text" placeholder="Your email" class="form-control" readonly="readonly" value="<?php echo $email; ?>">
                                        </div>
                                    </div>

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
                <?php
            }
            ?>

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