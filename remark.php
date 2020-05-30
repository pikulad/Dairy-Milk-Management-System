<?php
	session_start();
	$url=$_SERVER['REQUEST_URI'];
	$_SESSION['url']=$url;
	require_once "function.php";
	/**
	 * Created by PhpStorm.
	 * User: priyanklad
	 * Date: 2019-03-25
	 * Time: 10:44
	 */
	require_once "connection.php";
	
	
	if (isset($_SESSION["username"])) {
		//validation();
		$uname = $_SESSION["username"];
		$uid=$_SESSION["uid"];
		$welcome = "<a href='logout.php'><span>$uname, Logout</span></a>";
	} else {
		header("location:login.php");
		$welcome = "<a href='login.php'><span>Hello,Sign in</span></a>";
	}
	?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
	<title>Cart &#8211; Dudhwala.com</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Average|Droid+Serif:400,700|Libre+Baskerville:400,400i,700|Open+Sans:300,400,600,700,800|Oswald:300,400,700|Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext' type='text/css' media='all' />
	<link rel='stylesheet' href='css/layout.css' type='text/css' media='all' />
	<link rel='stylesheet' href='js/vendor/ui/default-skin.css' type='text/css' media='all' />
	<link rel='stylesheet' href='js/vendor/prettyPhoto/ver/prettyPhoto.css' type='text/css' media='all' />
	<link rel='stylesheet' href='js/vendor/woo/woocommerce-layout.css' type='text/css' media='all' />
	<link rel='stylesheet' href='js/vendor/woo/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
	<link rel='stylesheet' href='js/vendor/woo/woocommerce.css' type='text/css' media='all' />
	<link rel='stylesheet' href='css/fontello/css/fontello.css' type='text/css' media='all' />
	<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
	<link rel='stylesheet' href='css/core.animation.css' type='text/css' media='all' />
	<link rel='stylesheet' href='css/shortcodes.css' type='text/css' media='all' />
	<link rel='stylesheet' href='css/theme.css' type='text/css' media='all' />
	<link rel='stylesheet' href='js/vendor/woo/plugin.woocommerce.css' type='text/css' media='all' />
	<link rel='stylesheet' href='css/custom.css' type='text/css' media='all' />
	<link rel='stylesheet' href='css/responsive.css' type='text/css' media='all' />

</head>

<body class="product-template-default single single-product woocommerce woocommerce-page body_style_wide body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">

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
							<ul id="menu_user" class="menu_user_nav">
							</ul>
						</div>
					</div>
				</div>
				<div class="top_panel_middle">
					<div class="content_wrap">
						<div class="columns_wrap columns_fluid">
							<div class="column-4_5 contact_logo">
								<div class="logo">
									<a href="index.php"><img src="images/logo.png" class="logo_main" alt="" width="239" height="59"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="top_panel_bottom">
					<div class="content_wrap clearfix">
						<nav class="menu_main_nav_area menu_hover_fade">
							<ul id="menu_main" class="menu_main_nav">
								<li class="menu-item"><a href="index.php"><span>Home</span></a>
								</li>
								<li class="menu-item"><a href="about-2.php"><span>About us</span></a>
								
								</li>
								<li class="menu-item"><a href="farm.php"><span>Farm</span></a></li>
								
								<li class="menu-item"><a href="shop.php"><span>Products</span></a></li>
								<li class="menu-item"><a href="grid.php"><span>Gallery</span></a></li>
								<li class="menu-item"><a href="contacts.php"><span>Contacts</span></a></li>
								<li class="menu-item menu-item-has-children current-menu-ancestor current-menu-parent"><?php echo $welcome ?>
									<ul>
										<li><a href="cart.php">Cart</a></li>
									</ul>
								</li>
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
					<a href="index.php">
						<img src="images/logo.png" class="logo_main" alt="" width="239" height="59">
					</a>
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
							<li class="menu-item menu-item-has-children current-menu-ancestor current-menu-parent"><?php echo $welcome ?>
								<ul>
									<li><a href="cart.php">Cart</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
				<div class="panel_bottom"></div>
			</div>
			<div class="mask"></div>
		</div>
		<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
			<div  class="bg_cust_1 top_panel_title_inner top_panel_inner_style_1 title_present_inner breadcrumbs_present_inner">
				<div class="content_wrap">
					<h1 class="page_title">CART</h1>
					<div class="breadcrumbs">
						<a class="breadcrumbs_item home" href="index.php">Home</a>
						<span class="breadcrumbs_delimiter"></span>
						<span class="breadcrumbs_item current">cart</span>
					</div>
				</div>
			</div>
		</div>
		<!-- Product Data Fetch-->
		<div class="page_paddings_yes">
			<div class="content_wrap">
				<div class="content_container">
					<article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
						<section class="post_content">
							<div class=" wpb_row vc_row-fluid">
								
								
								<div class="wpb_wrapper">
									<h2 class="sc_title sc_title_regular"><b>Thank you!</b></h2>
									<div class="wpb_text_column wpb_content_element">
										<div class="wpb_wrapper">
											<div class="sc_table margin_bottom_medium">
												<h4>for Purchase our Product.</h4>
                                                <div class="row" style="margin-top: 5%;">
                                                    <b><label class="sc_form_message"><a target="_parent" style="cursor: pointer; font-size: x-large;" href="purchase_bill.php?billno=<?php echo $_SESSION['billno'];?>">Click here to DOWNLOAD/PRINT your Bill.</a></label></b>
                                                </div>
                                                <div class="column-1_6">
                                                    <?php
                                                        //echo $invoice->outputHTML(1);
                                                    ?>
                                                </div>
                                                <br><div class="column-1_1" style="margin-top: 10%"><a class="button icon-basket" href="shop.php">&nbsp;Continue Shopping</a></div>
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
<script type='text/javascript' src='js/vendor/woo/add-to-cart.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/woocommerce-add-to-cart.js'></script>
<script type='text/javascript' src='js/vendor/modernizr.min.js'></script>
<script type='text/javascript' src='js/vendor/prettyPhoto/ver/jquery.prettyPhoto.min.js'></script>
<script type='text/javascript' src='js/vendor/prettyPhoto/jquery.prettyPhoto.init.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/jquery.zoom.min.js'></script>
<script type='text/javascript' src='js/vendor/comp/jquery.flexslider-min.js'></script>
<script type='text/javascript' src='js/vendor/woo/single-product.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/jquery.blockUI.min.js'></script>
<script type='text/javascript' src='js/vendor/jquery/js.cookie.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/woocommerce.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/cart-fragments.min.js'></script>
<script type='text/javascript' src='js/vendor/superfish.js'></script>
<script type='text/javascript' src='js/custom/core.reviews.js'></script>
<script type='text/javascript' src='js/custom/core.utils.js'></script>
<script type='text/javascript' src='js/custom/core.init.js'></script>
<script type='text/javascript' src='js/custom/init.js'></script>
<script type='text/javascript' src='js/custom/comment-reply.min.js'></script>
<script type='text/javascript' src='js/custom/core.debug.js'></script>
<script type='text/javascript' src='js/custom/embed.min.js'></script>
<script type='text/javascript' src='js/custom/shortcodes.js'></script>
<script type='text/javascript' src='js/vendor/underscore.min.js'></script>
<script type='text/javascript' src='js/custom/util.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/add-to-cart-variation.min.js'></script>

</body>

</html>
