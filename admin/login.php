<?php
ob_start();
require_once __DIR__ . '/../app_security.php';
app_start_session();
if (isset($_SESSION['staff_id'])) {
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
        $contact = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        if (!app_csrf_is_valid(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null)) {
            $loginerr = "Your session expired. Please try again.";
        } else {
            $statement = mysqli_prepare($connection, "SELECT id, email, contactno, password, role, fname FROM tblstaff WHERE email = ? OR CAST(contactno AS CHAR) = ? LIMIT 1");
            mysqli_stmt_bind_param($statement, 'ss', $contact, $contact);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            $row = mysqli_fetch_assoc($result);
            mysqli_stmt_close($statement);
            if ($row && app_verify_password($password, $row['password'])) {
                if (app_password_needs_upgrade($row['password'])) {
                    app_upgrade_password($connection, 'tblstaff', (int)$row['id'], $password);
                }
                session_regenerate_id(true);
                $_SESSION['username'] = $row['fname'];
                $_SESSION['uid'] = (int)$row['id'];
                $_SESSION['staff_id'] = (int)$row['id'];
                $_SESSION['staff_role'] = (int)$row['role'];
                header($row['role'] == 0 ? "location:index.php" : "location:another.php");
                exit;
            }
            $loginerr = "Invalid username or password.";
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
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(app_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
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