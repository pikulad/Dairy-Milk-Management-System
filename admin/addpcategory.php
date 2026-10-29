<?php
ob_start();
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/connection.php';
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
                    <li class="active">Manage Product</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Product Category</h1>
                </div>
            </div><!--/.row-->

            <?php
            if (isset($_POST['submit'])) {
                if (!app_csrf_is_valid(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null)) {
                    http_response_code(400);
                    exit('Invalid request token.');
                }
                $pname = trim(isset($_POST['cname']) ? $_POST['cname'] : '');
                $description = trim(isset($_POST['description']) ? $_POST['description'] : '');
                $file = isset($_FILES['cimage']) ? $_FILES['cimage'] : null;
                $allowedTypes = array('image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp');
                $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = $file && $fileInfo && isset($file['tmp_name']) && is_uploaded_file($file['tmp_name'])
                    ? finfo_file($fileInfo, $file['tmp_name'])
                    : '';
                if ($fileInfo) {
                    finfo_close($fileInfo);
                }
                if ($pname === '' || strlen($pname) > 50 || strlen($description) > 500 ||
                    !$file || $file['error'] !== UPLOAD_ERR_OK || $file['size'] > 5242880 ||
                    !isset($allowedTypes[$mime])) {
                    $_SESSION['msg'] = 'Enter valid category details and select an image up to 5 MB.';
                } else {
                    $filename = bin2hex(random_bytes(16)) . '.' . $allowedTypes[$mime];
                    $target = 'admin/image/' . $filename;
                    $imagePath = __DIR__ . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . $filename;
                    $statement = mysqli_prepare($connection, "INSERT INTO tblproductcategory (name,imagepath,description) VALUES (?,?,?)");
                    mysqli_stmt_bind_param($statement, 'sss', $pname, $target, $description);
                    if (move_uploaded_file($file['tmp_name'], $imagePath) && mysqli_stmt_execute($statement)) {
                        mysqli_stmt_close($statement);
                        header("location:addproduct.php");
                        exit;
                    }
                    mysqli_stmt_close($statement);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    error_log('Unable to save product category.');
                    $_SESSION['msg'] = 'Unable to save category.';
                }
            }
            ?>

            <div class="col-md-5 panel panel-default">
                <div class="panel-heading">Add Product Category Form</div>

                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="#" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(app_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input class="form-control" type="text" name="cname" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category Image:</label>
                                    <input class="form-control-static" type="file" name="cimage" title="select Product Category Image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <input class="form-control" type="text" name="description" title="Enter product Description">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input class="btn btn-primary" type="submit" name="submit" value="SUBMIT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="btn btn-toolbar" type="reset" name="reset" value="RESET">
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