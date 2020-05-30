<?php
session_start();
if(isset($_SESSION["retailer_username"])){
    header("location:retailer_index.php");
}
?>
<?php
	if (isset($_COOKIE["username"])) {
		header("location:index.php");
	}
	require './connection.php';
	$strerr = '';
	$strerr=$_SESSION['msg'];
	$_SESSION['msg']="";
	
	
	if (isset($_POST['btn_submit'])) {
		$username = $_POST['txtusername'];
		$username=mysqli_real_escape_string($con,$username);
		$password = $_POST['txtpassword'];
		$password=mysqli_real_escape_string($con,$password);
		$password=md5($password);
		
		if (empty($username) || empty($password)) {
			
			if (empty($username)) {
				$strerr = "*Please Enter Username";
			} elseif (empty($password)) {
				$strerr = "*Please Enter Password";
				setcookie("tmp_username", "", time() - 60);
				setcookie("tmp_username", $username);
			} elseif (empty($username && $password)) {
				$strerr = "*Both Fieds Are Required.";
			}
		} else {
			$sql = "select * from tblcustomer where (emailid='$username' or contactno='$username') and password='$password'";
			//echo "$sql";
			$result = $con->query($sql);
			if ($result->num_rows == 1) {
				$row=mysqli_fetch_array($result);
				$username=$row['fname'];
				$strerr = "login successful";
				setcookie("username", $username);
				setcookie("uid",$row['id']);
				$_SESSION['username']=$username;
				$_SESSION['uid']=$row['id'];
				$url=$_SESSION['url'];
				$previous = "javascript:history.go(-1)";
				if(isset($_SERVER['HTTP_REFERER'])) {
					$previous = $_SERVER['HTTP_REFERER'];
				}
				if(empty($url)){
					header("location:index.php");
				}
				else{
					header("location:$url");
					$_SESSION['url']='';
				}
				
			} else {
				$strerr = "*Enter Valid Username and Password.";
				setcookie("tmp_username", "", time() - 60);
				setcookie("tmp_username", $username);
				
			}
		}
	}
	if (isset($_POST['btn_retailer'])) {
		$username = $_POST['txtusername'];
		$username = mysqli_real_escape_string($con, $username);
		$password = $_POST['txtpassword'];
		$password = mysqli_real_escape_string($con, $password);
		$password = md5($password);
		
		if (empty($username) || empty($password)) {
			
			if (empty($username)) {
				$strerr = "*Please Enter Username";
			} elseif (empty($password)) {
				$strerr = "*Please Enter Password";
				setcookie("tmp_username", "", time() - 60);
				setcookie("tmp_username", $username);
			} elseif (empty($username && $password)) {
				$strerr = "*Both Fieds Are Required.";
			}
		} else {
			$sql = "select * from tblretailer where (emailid='$username' or contactno='$username') and password='$password'";
			$result = $con->query($sql);
			if ($result->num_rows == 1) {
				$row = mysqli_fetch_array($result);
				$username = $row['name'];
				$strerr = "login successful";
				$_SESSION['retailer_username'] = $username;
				$_SESSION['rid'] = $row['id'];
				header("location:retailer/index.php");
			} else {
				$strerr = "*Enter Valid Username and Password.";
				setcookie("tmp_username", "", time() - 60);
				setcookie("tmp_username", $username);
				
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
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
                                        <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children"><a href="index.php"><span>Home</span></a>
                                        </li>
                                        <li class="menu-item menu-item-has-children"><a href="about-2.php"><span>About us</span></a>

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
                        <div class="content">
                            <article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                                <section class="post_content">
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_wrapper">
                                            <h2 class="sc_title sc_title_regular">Login Details</h2>
                                            <div class="wpb_text_column wpb_content_element">
                                                <div class="wpb_wrapper column-1_1">
                                                    <div class="column-2_4">
                                                    <form id="sc_form_104_form" class="sc_input_hover_default" data-formtype="form_custom" method="post" action="#">
                                                        <label style="color: red; font-size: 15px;" for="sc_form_104_1"><?php echo "$strerr"; ?></label>
                                                        
                                                        <div class="column-1 sc_column_item sc_column_item_1 odd">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text"><label>Username:</label>
                                                                        </div>
                                                                        <input type="text" name="txtusername" placeholder="Enter your Username.">
                                                                    </div>
                                                                    <div class="result sc_infobox"></div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1 sc_column_item sc_column_item_1 odd">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">

                                                                    <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">

                                                                        <div class="sc_form_item_text"><label>Password:</label>
                                                                        </div>
                                                                        <input type="password" name="txtpassword" placeholder="Enter your Password.">
                                                                    </div>
                                                                    <div class="result sc_infobox"></div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">
                                                            <!--<a href="#"><h5 for="sc_form_104_1">Forget Password</h5></a>-->
                                                            <p><a href="registration.php"><h5>New User? Registration here.</h5></a></p>
                                                        </div>
                                                                <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">
                                                                    <input type="submit" name="btn_submit" value="Login">&nbsp;&nbsp;
                                                                    <input class="sc_form_button" type="submit" value="For, Retailer" name="btn_retailer">
                                                                </div>
                                                                </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                        </div>
                                </section>
                            </article>
                        </div>
                    </div>
                </div>


                <?php include_once "footer.php";?>
            </div>
        </div>

        <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
        <div class="custom_html_section"></div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script type='text/javascript' src='js/vendor/jquery/jquery.js'></script>
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