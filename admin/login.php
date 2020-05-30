<?php
ob_start();
session_start();
if (isset($_SESSION['username'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dudhwala.com - Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php
    require './connection.php';
    $loginerr = "";
    if (isset($_POST['btnsubmit'])) {
        $contact = $_POST['email'];
        $name = $_POST['email'];
        $password = $_POST['password'];
        $loginquery = "select * FROM tblstaff WHERE (email='$name' or contactno='$contact') and password='$password'";
        $result = $connection->query($loginquery);
        $row = $result->fetch_array();
        $email1 = $row['email'];
        $contact1 = $row['contactno'];
        $password1 = $row['password'];
        $role1 = $row['role'];
        $firstname = $row['fname'];
        if (($name == $email1 || $contact == $contact1) && $password == $password1) {
            
            if ($role1 == 0) {
                $_SESSION['username'] = $firstname;
				$_SESSION['uid']=$row['id'];
                header("location:index.php");
            }
            if ($role1 == 1) {
              $_SESSION['username'] = $firstname;
              $_SESSION['uid']=$row['id'];
                header("location:another.php");
            }
        } else {
            $loginerr = "pls try again later";
        }
    }
    ?>
    <body style="background-image: url('./image/bg.jpg');background-repeat: no-repeat;">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4"><h1 class="bg-green" style=" border-radius:10px; text-align: center; font-size: large; padding: 8%; background: linear-gradient(30deg,rgb(0,110,200),rgb(0,132,210)); ">Dudhwala.com | Admin Panel</h1><br><br><br><br></div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">Log in</div>
                    <div class="panel-body">
                        <form role="form" action="#" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus="" required="Please Enter Your Email.">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="Please Enter Your Passwod.">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                    <?php echo $loginerr ?>
                                <input class="form-control" style="background-color: #0088cc;color: #ffffff" value="SUBMIT" name="btnsubmit" type="submit"</fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->	


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php
ob_end_flush();
?>