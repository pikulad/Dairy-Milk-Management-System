<?php
session_start();
require './connection.php';
$passerr = '';
$validCaptcha=$_SESSION['captcha'];
//echo $validCaptcha;
if ($_POST['btn_submit']) {
    $flag = 0;
    $fname = $_POST['txtfname'];
    $lname = $_POST['txtlname'];
    $address = $_POST['txtaddress'];
    $landmark = $_POST['txtlandmark'];
    $gender = $_POST['txtgender'];
    $contactno = $_POST['txtcontact'];
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    $datetime = date("Y-m-d h:i:s");
    $captcha=$_POST['txtcaptch'];
    if(empty($captcha)){
        $flag++;
        $captchaerr='<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please Enter CAPTCHA.</span></div>';
    }
    else if (!$captcha==$validCaptcha){
        $flag++;
        $captchaerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Invalid CAPTCHA</span></div>';
    }
    else {

        $captchaerr='<div class="sc_infobox_style_success sc_infobox"><span for="sc_form_104_1">CAPTCHA Matched.</span></div>';

    }
	if (empty($address)) {
		$flag++;
		$addresserr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please Enter Address.</span></div>';
	}
	if (empty($landmark)) {
		$flag++;
		$landmarkerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please Select your Landmark.</span></div>';
	}
	
	if (empty($fname)) {
        $flag++;
        $fnameerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please Enter First Name.</span></div>';
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $flag++;
            $fnameerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Only letters and white space allowed.</span></div>';
        }
    }
    if (empty($lname)) {
        $flag++;
        $lnameerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please Enter Last Name.</span></div>';
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
            $flag++;
            $lnameerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Only letters and white space allowed.</span></div>';
        }
    }
    if (empty($gender)) {
		$flag++;
		$gendererr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please select your gender.</span></div>';
	}
    if (empty($contactno)) {
        $flag++;
        $contacterr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please Enter Contact No.</span></div>';
    } else {
        if (strlen($contactno) < 10) {
            $flag++;
            $contacterr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Contact Number should be 10 digits only.</span></div>';
        }
    }
    if (empty($email)) {
        $flag++;
        $emailerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please Enter Email Address.</span></div>';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $flag++;
            $emailerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Invalid Email Address.</span></div>';
        }
    }
    if (empty($password)) {
        $flag++;

        $passerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Please Enter Password.</span></div>';
    } else {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 4) {
            // tell the user something went wrong


            $flag++;

            $passerr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Password Must be a minimum of 4 characters. It\'s Must contain at least 1 number,1 uppercase character,1 lowercase character</span></div>';
        }
    }
    if ($_POST["txtpassword"] === $_POST["txtcpassword"]) {
        $password = md5($password);
    } else {


        $flag++;
        $cpasserr = '<div class="sc_infobox_style_error sc_infobox"><span for="sc_form_104_1">Password not Matched!</span></div>';
    }
    if ($flag == 0) {

        $sql = "insert into tblcustomer(fname,lname,address,landmarkid,gender,contactno,emailid,password,updatedatetime)values('$fname','$lname','$address',$landmark,'$gender',$contactno,'$email','$password','$datetime')";
        //echo $sql;
        $query = mysqli_query($con, $sql);
        if ($query) {
            //echo "<script>alert('Registration Successful.');</script>";
            $_SESSION['msg']="Registation Successful";
            header("location:login.php");
        } else {
            $_SESSION['msg']="Registation Denied!";
            //echo "<script>alert('Registration Denied!');</script>";
        }
    }

}
?>
<!DOCTYPE html>
<head>
    <title>Login &#8211; Dudhwala.com</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Average|Droid+Serif:400,700|Libre+Baskerville:400,400i,700|Open+Sans:300,400,600,700,800|Oswald:300,400,700|Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext' type='text/css' media='all' />
    <link rel='stylesheet' href='css/layout.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/fontello/css/fontello.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.animation.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/theme.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/woo/plugin.woocommerce.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/custom.css' type='text/css' media='all' /> 
    <link rel='stylesheet' href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/comp/comp.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.messages.css' type='text/css' media='all' />
    <script src="js/jquery.js"></script>
    <style>
        .label_size{
            font-size: 30px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#password_info").hide();
            $("#p").click(function () {
                $("#password_info").toggle();
            });

            $("#p").mouseenter(function(){
                $("#password_info").show();
                //alert("hello");
            });
            $("#p").mouseleave(function () {
                $("#password_info").hide();
            });
        });
    </script>
</head>

<body class="page typo body_style_wide body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_show sidebar_right sidebar_outer_hide vc_responsive">

    <a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="index.php" data-separator="yes"></a>
    <a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>

    <div class="body_wrap">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <header class="top_panel_wrap top_panel_style_1 scheme_original">
                <div class="top_panel_wrap_inner top_panel_inner_style_1 top_panel_position_above">
                    <div class="top_panel_top">
                        <div class="content_wrap clearfix">
                            <div class="top_panel_top_contact_area icons icon-phone-1">+91 9924209820 </div>
                            <div class="top_panel_top_open_hours icons icon-clock-1">Mn-Fr: 8am - 8pm, St-Sn: 8am - 4pm</div>
                            <div class="top_panel_top_user_area">
                                <div class="top_panel_top_socials">
                                    <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                                        <div class="sc_socials_item">
                                            <a href="#" target="_blank" class="social_icons social_twitter">
                                                <span class="icon-twitter"></span>
                                            </a>
                                        </div>
                                        <div class="sc_socials_item">
                                            <a href="#" target="_blank" class="social_icons social_facebook">
                                                <span class="icon-facebook"></span>
                                            </a>
                                        </div>
                                        <div class="sc_socials_item">
                                            <a href="#" target="_blank" class="social_icons social_gplus-1">
                                                <span class="icon-gplus-1"></span>
                                            </a>
                                        </div>
                                        <div class="sc_socials_item">
                                            <a href="#" target="_blank" class="social_icons social_linkedin">
                                                <span class="icon-linkedin"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <ul id="menu_user" class="menu_user_nav"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="top_panel_middle">
                        <div class="content_wrap">
                            <div class="columns_wrap columns_fluid">
                                <div class="column-4_5 contact_logo">
                                    <div class="logo">
                                        <a href="index.php">
                                            <img src="images/logo.png" class="logo_main" alt="" width="239" height="59">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="top_panel_bottom">
                        <div class="content_wrap clearfix">
                            <nav class="menu_main_nav_area menu_hover_fade">
                                <ul id="menu_main" class="menu_main_nav">
                                    <li class="menu-item current current-menu-ancestor current-menu-item current-menu-parent"><a href="login.php"><span>Login</span></a></li>
                                    <li class="menu-item"><a href="index.php"><span>Home</span></a>
                                    </li>
                                    <li class="menu-item"><a href="about-2.php"><span>About us</span></a>

                                    </li>
                                    <li class="menu-item"><a href="farm.php"><span>Farm</span></a></li>

                                    <li class="menu-item"><a href="shop.php"><span>Products</span></a></li>
                                    <li class="menu-item"><a href="grid.php"><span>Gallery</span></a></li>
                                    <li class="menu-item"><a href="contacts.php"><span>Contacts</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <div class="header_mobile">
                <div class="content_wrap">
                    <div class="menu_button icon-menu"></div>
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.png" class="logo_main" alt="" width="239" height="59"></a>
                    </div>
                </div>
                <div class="side_wrap">
                    <div class="close">Close</div>
                    <div class="panel_top">
                        <nav class="menu_main_nav_area">
                            <ul id="menu_mobile" class="menu_main_nav">
                                <li class="menu-item"><a href="login.php"><span>Login</span></a></li>
                                <li class="menu-item"><a href="index.php"><span>Home</span></a></li>
                                <li class="menu-item"><a href="about-2.php"><span>About us</span></a>

                                </li>
                                <li class="menu-item"><a href="farm.php"><span>Farm</span></a></li>

                                <li class="menu-item"><a href="shop.php"><span>Products</span></a></li>
                                <li class="menu-item"><a href="grid.php"><span>Gallery</span></a></li>
                                <li class="menu-item"><a href="contacts.php"><span>Contacts</span></a></li>

                            </ul>
                        </nav>
                    </div>
                    <div class="panel_bottom">
                    </div>
                </div>
                <div class="mask"></div>
            </div>
            <div class="page_paddings_yes">
                <div class="content_wrap">
                    <div class="content_container">
                        <article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                            <section class="post_content">
                                <div class=" wpb_row vc_row-fluid">


                                    <div class="wpb_wrapper">
                                        <h2 class="sc_title sc_title_regular">Registration Details</h2>
                                        <div class="wpb_text_column wpb_content_element">
                                            <div class="wpb_wrapper">
                                                <form id="sc_form_104_form" class="sc_input_hover_iconed" data-formtype="form_custom" method="post" action="#">
                                                    <label style="color: red; font-size: 15px;" for="sc_form_104_1"><?php echo $_SESSION['msg']; $_SESSION['msg']=""; ?></label>

                                                    <!---  Form  -->

                                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                        <div class="column-2_5 sc_column_item sc_column_item_2 odd first">
                                                            <div id="sc_form_048_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_048" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_select sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text">
                                                                            <label class="label_size" for="registration_form">First Name:</label>
                                                                            <input type="text" name="txtfname" placeholder="Enter your First Name" id="Registration_form" value="<?php
                                                                            if (isset($fname)) {
                                                                                echo $fname;
                                                                            }
                                                                            ?>">
                                                                                   <?php echo $fnameerr; ?>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column-2_5 sc_column_item sc_column_item_1 even">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">
                                                                        <div class="sc_form_item_text">
                                                                            <label for="sc_form_104_1">Last Name:</label>
                                                                        </div>
                                                                        <input type="text" id="Registration_form" name="txtlname" placeholder="Enter your Last Name" value="<?php
                                                                        if (isset($lname)) {
                                                                            echo $lname;
                                                                        }
                                                                        ?>">
                                                                               <?php echo $lnameerr; ?>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-2_3 sc_column_item sc_column_item_1">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_address">
                                                                            <div class="sc_form_item_text">
                                                                                <label for="sc_form_104_1">Address:</label>
                                                                            </div>
                                                                            <div class="sc_form_address_field">
                                                                                <textarea name="txtaddress" placeholder="Enter your Address"><?php
                                                                                    if (isset($address)) {
                                                                                        echo $address;
                                                                                    }
                                                                                    ?></textarea>
                                                                                <!--<input type="text" name="txtaddress" placeholder="Enter your Address" >-->
                                                                                <?php echo $addresserr; ?>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column-2_5 sc_column_item sc_column_item_1 even">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_select">
                                                                            <div class="sc_form_label_content">
                                                                                <label for="Registration_form">Landmark:</label>
                                                                            </div>
                                                                            <div class="sc_form_select_container">
                                                                                <select name="txtlandmark" >
                                                                                    <option value="" disabled>Select your Landmark</option>
                                                                                    <?php
                                                                                    $ddlm = "select * from tbllandmark";
                                                                                    $result = $con->query($ddlm);
                                                                                    while ($row = $result->fetch_assoc()) {

                                                                                        if (isset($landmark)) {
                                                                                            if($row['id']==$landmark) {
                                                                                                echo "<option value=" . $row['id'] . " selected>" . $row['Name'] . "</option>";
                                                                                            }
                                                                                        } else {

                                                                                            echo "<option value=" . $row['id'] . ">" . $row['Name'] . "</option>";
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <?php echo $landmarkerr; ?>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column-2_5 sc_column_item sc_column_item_1 odd">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_select">
                                                                            <div class="sc_form_label_content">
                                                                                <label for="Registration_form">Gender:</label>
                                                                            </div>
                                                                            <div class="sc_form_select_container">
                                                                                <select name="txtgender">
                                                                                    <option value="" disabled selected>Select your gender</option>
                                                                                    <option value="Male"<?php
                                                                                    if (isset($gender)) {
                                                                                        if($gender=='Male'){
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                    ?>Male</option>
                                                                                    <option value="Female"<?php
                                                                                            if (isset($gender)) {
                                                                                            if($gender=='Female'){
                                                                                            echo "selected";
                                                                                    }
                                                                                    }
                                                                                    ?>>Female</option>

                                                                                </select>
                                                                                <?php echo $gendererr; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sc_infobox"></div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column-2_5 sc_column_item sc_column_item_2">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_1">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text"><label>Contact Number:</label>
                                                                        </div>
                                                                        <input type="text" name="txtcontact" placeholder="Enter your Number without +91" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="10" value="<?php
                                                                        if (isset($contactno)) {
                                                                            echo $contactno;
                                                                        }
                                                                        ?>">
                                                                               <?php echo $contacterr; ?>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column-2_5 sc_column_item sc_column_item_1 even">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text"><label>Email Address:</label>
                                                                        </div>
                                                                        <input type="email" name="txtemail" placeholder="Enter your Email Address" value="<?php
                                                                        if (isset($email)) {
                                                                            echo $email;
                                                                        }
                                                                        ?>">
                                                                               <?php echo $emailerr; ?>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column-2_5 sc_column_item sc_column_item_1 odd">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text"><label>Password:</label>
                                                                        </div>
                                                                        <input id="p" type="password" name="txtpassword" placeholder="Enter your Password." value="<?php
                                                                        if (isset($password)) {
                                                                            echo $password;
                                                                        }
                                                                        ?>">
                                                                        <div id="password_info" class="sc_infobox_style_info sc_infobox"><p>Password Must be a minimum of 4 characters. It's Must contain at least 1 number,1 uppercase character,1 lowercase character</p></div>
                                                                        <?php echo $passerr; ?>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-2_5 sc_column_item sc_column_item_1 odd">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text"><label>Confirm Password:</label>
                                                                        </div>
                                                                        <input type="password" name="txtcpassword" placeholder="Enter your Password Again" value="<?php
                                                                        if (isset($password)) {
                                                                            echo $password;
                                                                        }
                                                                        ?>">
                                                                        <?php echo $cpasserr; ?>
<!-- <div class = "sc_infobox_style_error sc_infobox"><span for = "sc_form_104_1"></span></div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-2_5 sc_column_item sc_column_item_1 odd">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text"><label>Captcha:</label>
                                                                        </div>
                                                                        <input type="text" name="txtcaptch" placeholder="Enter below captcha here">
                                                                        <?php echo $captchaerr;//echo $validCaptcha;?>

                                                                    </div>


                                                                        <script type="text/javascript">
                                                                            function reload()

                                                                            {

                                                                                img = document.getElementById("capt");

                                                                                img.src="captcha.php";

                                                                            }

                                                                    </script>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-2_5 sc_column_item sc_column_item_1">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text"><label>&nbsp;</label>
                                                                        </div>
                                                                        <img src="captcha.php" id="capt"><br><br>
                                                                        <a class="vc_btn vc_btn-orange" style= "cursor: pointer;" onclick="reload()">Refresh captcha</a>
                                                                        <!-- <div class = "sc_infobox_style_error sc_infobox"><span for = "sc_form_104_1"></span></div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>


                                        </div>
                                        <div class = "sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">
                                            <h5><a href="login.php"><label>If you already registered.&nbsp; click here!</label></a></h5><br><br>
                                            <input type = "submit" name = "btn_submit" value = "Submit">
                                        </div>
                                        <div class = "sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">
                                            <h4 readonly="readonly" style="color: #3c3c3c;"><label>By clicking on 'SUBMIT' above,<br> you confirm that you accept the <a>Terms & Conditions.</a></label></h4>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>


                            </section>
                        </article>
                    </div>
                </div>
            </div>

        <?php include_once "footer.php";?>
        <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
        <div class="custom_html_section"></div>

    </div>
    </div>

    <a href = "#" class = "scroll_to_top icon-up" title = "Scroll to top"></a>
    <div class = "custom_html_section"></div>
    <script data-cfasync = "false" src = "/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script type='text/javascript' src='js/vendor/jquery/jquery.js'></script>
    <script type='text/javascript' src='js/vendor/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/custom/custom.js'></script>
    <script type='text/javascript' src='js/vendor/modernizr.min.js'></script>
    <script type='text/javascript' src='js/vendor/jquery/js.cookie.min.js'></script>
    <script type='text/javascript' src='js/vendor/superfish.js'></script>
    <script type='text/javascript' src='js/custom/core.utils.js'></script>
    <script type='text/javascript' src='js/custom/core.init.js'></script>
    <script type='text/javascript' src='js/custom/init.js'></script>
    <script type='text/javascript' src='js/custom/core.debug.js'></script>
    <script type='text/javascript' src='js/custom/embed.min.js'></script>
    <script type='text/javascript' src='js/custom/shortcodes.js'></script>
    <script type='text/javascript' src='js/vendor/comp/comp_front.min.js'></script>
    <script type='text/javascript' src='js/custom/core.messages.js'></script>

</body>

</html>