
<?php
	require_once "data/slidebar.php";
    if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    //fetch data from database

    $view = "select * from tblstaff where id='$id'";
    $result = $connection->query($view);
    $row1 = $result->fetch_array();
    $fname = $row1['fname'];
    $lname = $row1['lname'];
    $address = $row1['address'];
    $gender = $row1['gender'];
    $contactno = $row1['contactno'];
    $email = $row1['email'];

    $landmark = $row1['landmarkid'];
    $role = $row1['role'];
} else {
    header("location:staffview.php");
}
		
		?><!--/.sidebar-->

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
                    <h1 class="page-header">Update Staff</h1>
                </div>
            </div><!--/.row-->


            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $id . " , " . $fname . " " . $lname; ?></div>

                <div class="panel-body">
                    <div class="col-md-8" style="margin-left: 50px;">
                        <form role="form" action="#" method="post">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Name: &nbsp;</label>
                                    <?php
                                    // if (isset($fname)) {
                                    echo $fname . " " . $lname;
                                    //}
                                    ?>




                                </div>


                                <div class="form-group">
                                    <label>Address: &nbsp;</label>
                                    <?php echo $address; ?>
                                </div>
                                <div class="form-group">
                                    <label>Landmark:&nbsp;</label>


                                    <?php
                                    $lm = $row1['landmarkid'];
                                    $ddlm = "select * from tbllandmark where id=$lm";
                                    $result = $connection->query($ddlm);
                                    $lmd = $result->fetch_array();
                                    echo $lmd['Name'];
                                    ?>


                                </div>

                                <div class="form-group">
                                    <label>Gender:&nbsp;</label>


                                    <?php echo $gender; ?>





                                </div>
                                <div class="form-group">
                                    <label>Contact Number:&nbsp;</label>
                                    <?php
                                    if (isset($contactno)) {
                                        echo $contactno;
                                    }
                                    ?>



                                </div>
                                <div class="form-group">
                                    <label>Role:&nbsp;</label>

                                    <?php
                                    if ($role == 0) {
                                        echo "Admin";
                                    } else {
                                        echo "Staff";
                                    }
                                    ?>


                                </div>

                                <div class="form-group">
                                    <label>Email Id:&nbsp;</label>
                                    <?php
                                    if (isset($email)) {
                                        echo $email;
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-lg-4" style="margin: auto;">
                                <div class="form-group">
                                    <div class="col-lg-10">

                                        <div class="form-group">
                                            <br>
                                            <a href="staffview.php"><button class="btn btn-lg btn-primary form-control" style="height: 100%; margin-left: 40px;" type="button" value="submit" name="btnsubmit">OK</button></a>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>


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

