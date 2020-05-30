<?php
session_start();
$rid=$_SESSION['rid'];
$connection=mysqli_connect("localhost","root","mysql","dudhwala");
if(!isset($_SESSION['retailer_username'])){
    header("location:../login.php");
}else {
    if(isset($_POST['Submit'])){
        $liter=$_POST['liter'];
        $price=$_POST['price'];
        $date=$_POST['date'];
        
        $sql="insert into tblRetailerorder (retailerid, litre, price, date) values ($rid,$liter,$price,'$date')";
        mysqli_query($connection,$sql);
        $msg="Order successfully send.";
    }
	?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dudhwala.com</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
              rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand"
                   href="#"><span>Duduwala.com</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Retailer</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="../image/footer-logo.png" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"><?php echo $_SESSION['retailer_username'];?></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!--/.sidebar-->

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
                <h1 class="page-header">Retailer Dashboard</h1>
            </div>
        </div><!--/.row-->


        <div class="col-lg-6 row" style="margin: 0%;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order Form
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <label style="color: red"><?php echo $msg; $msg='';?></label>
                    <form class="form-horizontal" action="#" method="post">
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                
                                <label class="col-md-3 control-label" for="name">Liter</label>
                                <div class="col-md-9">
                                    <input id="liter" name="liter" type="text" placeholder="Enter liter"
                                           class="form-control" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="4">
                                </div>
                            </div>

                            <!-- Email input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Price</label>
                                <div class="col-md-9">
                                    <input id="price" name="price" type="text" placeholder="Enter price"
                                           class="form-control" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="5">
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Date</label>
                                <div class="col-md-9">
                                    <input id="date" name="date" type="date" placeholder="Enter Date" min="<?php echo date('Y-m-d')?>"
                                           class="form-control" value="<?php echo date('Y-m-d')?>">
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 widget-right">
                                    <input type="submit" class="btn btn-default btn-md pull-right" value="Submit" name="Submit">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 row" style="margin: 0%;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order History
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    
                    
                        
                            <!-- Name input-->
                            <div class="form-group">
                                <div class="col-md-9" style="margin: auto;">
                                    <table class="table table-responsive" style="margin: auto; margin-left: 17%; ">
                                        <thead>
                                        <th>Order No.</th>
                                        <th>Liter</th>
                                        <th>Price</th>
                                        <th>Order Date</th>
                                        </thead>
                                    <?php
                                        $order_history=mysqli_query($connection,"select * from tblRetailerorder where retailerid=$rid");
                                        while ($row=mysqli_fetch_array($order_history))
                                        {
                                            echo "<tr>
                                                    <td>".$row['no']."</td>
                                                    <td>".$row['litre']."</td>
                                                    <td>".$row['price']."</td>
                                                    <td>".$row['date']."</td>
                                                    </tr>";
                                        }
                                    ?>
                                        <tfoot>
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
        <!--/.row-->
    </div><!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>

    </body>
    </html>
	<?php
	
}?>