<?php
ob_start();
session_start();
if (!$_SESSION['username']) {
    header("location:login.php");
}
require './connection.php';
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
        <script type="text/javascript">
            $("#exdate").datetimepicker({format: 'dd-mm-yyyy'});
        </script> 
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
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
                                <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box"><a href="profile.php" class="pull-left">
                                            <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                        </a>
                                        <div class="message-body"><small class="pull-right">3 mins ago</small>
                                            <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                            <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box"><a href="profile.php" class="pull-left">
                                            <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                        </a>
                                        <div class="message-body"><small class="pull-right">1 hour ago</small>
                                            <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                            <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="all-button"><a href="#">
                                            <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                        </a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <em class="fa fa-bell"></em><span class="label label-info">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li><a href="#">
                                        <div><em class="fa fa-envelope"></em> 1 New Message
                                            <span class="pull-right text-muted small">3 mins ago</span></div>
                                    </a></li>
                                <li class="divider"></li>
                                <li><a href="#">
                                        <div><em class="fa fa-heart"></em> 12 New Likes
                                            <span class="pull-right text-muted small">4 mins ago</span></div>
                                    </a></li>
                                <li class="divider"></li>
                                <li><a href="#">
                                        <div><em class="fa fa-user"></em> 5 New Followers
                                            <span class="pull-right text-muted small">4 mins ago</span></div>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
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
                    <h1 class="page-header">Add Product</h1>
                </div>
            </div><!--/.row-->

            <?php
                if(isset($_POST['btnsubmit']))
                {
                    $category=$_POST['ddlpcn'];
                    $measurement=$_POST['ddm'];
                    $price=$_POST['price'];
                    $md=$_POST['mfdate'];
                    $ed=$_POST['exdate'];
                    $datetime1 = date("Y-m-d h:i:s");
                    $status=1;
                    $addproduct="insert into tblproduct (productcategoryid,measurementid,price,manufacture_date,expire_date,update_datetime,status) values ('$category','$measurement','$price','$md','$ed','$datetime1','$status')";
                    if(mysqli_query($connection, $addproduct))
                    {
                        header("location:index.php");
                    }
                    else
                    {
                        header("location:addproduct.php");
                    }
                }
            ?>

            <div class="panel panel-default">
                <div class="panel-heading">Add Product Form</div>
                <div class="panel-body">
                    <form role="form" action="#" method="post">
                        <div class="col-md-10">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Category:</label>
                                    <select class="form-control" name="ddlpcn">
                                        <option selected="selected">select Product</option>
                                        <?php
                                            $addproduct="select * from tblproductcategory";
                                            $result1=$connection->query($addproduct);
                                            while ($row3=$result1->fetch_array())
                                            {
                                                
                                                echo "<option value=".$row3['id'].">".$row3['name']."</option>";
                                            }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Measurement:</label>
                                    <select class="form-control" name="ddm">
                                        <option selected="selected">select measurement for Product</option>
                                        <?php
                                            $measure="select * from tblmeasurement";
                                            $result4=$connection->query($measure);
                                            while ($row4=$result4->fetch_array())
                                            {
                                                echo "<option value=".$row4['id'].">".$row4['type']."</option>";
                                            }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Price:</label>
                                    <input class="form-control" type="text" name="price" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Menufacture Date:</label>
                                    <input class="form-control fa fa-calendar-check-o" type="date" name="mfdate">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Expire Date:</label>
                                    <input class="form-control fa fa-calendar-times-o" type="date" id="exdate" name="exdate">

                                </div>
                            </div>
                            <div class="col-lg-3">

                                <div class="form-group">
                                    <label></label>
                                    <input class="btn btn-lg btn-primary form-control" type="submit" value="submit" name="btnsubmit">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label></label>
                                    <input class="form-control btn btn-lg btn-default"  type="reset" value="reset">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <i class="fa fa-5x fa-times-circle-o blockquote-reverse" style="margin: 50%; margin-right: 40%"></i> 
                        </div>

                    </form>
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