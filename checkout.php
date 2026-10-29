<?php
	require_once __DIR__ . '/app_security.php';
	app_start_session();
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
	
	
	if (isset($_SESSION["customer_id"])) {
		//validation();
		$uname = $_SESSION["username"];
		$uid=$_SESSION["customer_id"];
		$welcome = "<a href='logout.php'><span>$uname, Logout</span></a>";
	} else {
		header("location:login.php");
		exit;
	}
	
	
	//product data fetch
?>
<?php
	$custid=(int)$_SESSION['customer_id'];
	$date=date('Y-m-d');
	if(isset($_POST['btnUpdate'])){
		if (!app_csrf_is_valid(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null)) {
			http_response_code(400);
			exit('Invalid request token.');
		}

		$lid=isset($_POST['lid']) ? (int)$_POST['lid'] : 0;
		$address=isset($_POST['address']) ? trim($_POST['address']) : '';
		$updateStatement=mysqli_prepare($con, "UPDATE tblcustomer SET landmarkid = ?, address = ? WHERE id = ? AND EXISTS (SELECT 1 FROM tbllandmark WHERE id = ?)");
		if ($lid > 0 && $address !== '' && strlen($address) <= 200 && $updateStatement) {
			mysqli_stmt_bind_param($updateStatement, 'isii', $lid, $address, $custid, $lid);
			$query=mysqli_stmt_execute($updateStatement);
		} else {
			$query=false;
		}
		if ($updateStatement) {
			mysqli_stmt_close($updateStatement);
		}
		if ($query){
			$_SESSION['msg']="Data Updated!";
		}
		else{
			$_SESSION['msg']="Error!";
		}
	}
	if(isset($_POST['btnOrder']))
	{
		if (!app_csrf_is_valid(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null)) {
			http_response_code(400);
			exit('Invalid request token.');
		}

		mysqli_begin_transaction($con);
		$cartStatement=mysqli_prepare($con, "SELECT C.productid, C.qty, P.price FROM tblcart C INNER JOIN tblproduct P ON P.id = C.productid WHERE C.customerid = ? AND P.status = 1 FOR UPDATE");
		if (!$cartStatement) {
			mysqli_rollback($con);
			error_log('Unable to prepare checkout cart query.');
			http_response_code(500);
			exit('Unable to place order.');
		}
		mysqli_stmt_bind_param($cartStatement, 'i', $custid);
		mysqli_stmt_execute($cartStatement);
		mysqli_stmt_bind_result($cartStatement, $productId, $quantity, $unitPrice);
		$items = array();
		$calculatedTotal = 0;
		while (mysqli_stmt_fetch($cartStatement)) {
			$productId = (int)$productId;
			$quantity = (int)$quantity;
			$unitPrice = (float)$unitPrice;
			if ($productId <= 0 || $quantity <= 0 || $quantity > 5 || !is_finite($unitPrice) || $unitPrice < 0) {
				$items = array();
				break;
			}
			$items[] = array('productid' => $productId, 'qty' => $quantity);
			$calculatedTotal += $unitPrice * $quantity;
		}
		mysqli_stmt_close($cartStatement);
		if (count($items) === 0 || !is_finite($calculatedTotal) || $calculatedTotal < 0 || $calculatedTotal > 2147483647) {
			mysqli_rollback($con);
			$_SESSION['msg'] = 'Your cart is empty or contains unavailable items.';
			header("location:checkout.php");
			exit;
		}
		$total_amount = (int)round($calculatedTotal);
		$billStatement=mysqli_prepare($con, "INSERT INTO tblbill (customerid, date, total_amount) VALUES (?, ?, ?)");
		if (!$billStatement) {
			mysqli_rollback($con);
			error_log('Unable to prepare checkout bill insert.');
			http_response_code(500);
			exit('Unable to place order.');
		}
		mysqli_stmt_bind_param($billStatement, 'isi', $custid, $date, $total_amount);
		if (!mysqli_stmt_execute($billStatement)) {
			mysqli_stmt_close($billStatement);
			mysqli_rollback($con);
			error_log('Unable to insert checkout bill.');
			http_response_code(500);
			exit('Unable to place order.');
		}
		$billno=mysqli_insert_id($con);
		mysqli_stmt_close($billStatement);
		$orderStatement=mysqli_prepare($con, "INSERT INTO tblcustomerorder (billno, productid, qty) VALUES (?, ?, ?)");
		if (!$orderStatement) {
			mysqli_rollback($con);
			error_log('Unable to prepare checkout item insert.');
			http_response_code(500);
			exit('Unable to place order.');
		}
		foreach ($items as $item) {
			mysqli_stmt_bind_param($orderStatement, 'iii', $billno, $item['productid'], $item['qty']);
			if (!mysqli_stmt_execute($orderStatement)) {
				mysqli_stmt_close($orderStatement);
				mysqli_rollback($con);
				error_log('Unable to insert checkout item.');
				http_response_code(500);
				exit('Unable to place order.');
			}
		}
		mysqli_stmt_close($orderStatement);
		$deleteStatement=mysqli_prepare($con, "DELETE FROM tblcart WHERE customerid = ?");
		if (!$deleteStatement) {
			mysqli_rollback($con);
			error_log('Unable to prepare checkout cart cleanup.');
			http_response_code(500);
			exit('Unable to place order.');
		}
		mysqli_stmt_bind_param($deleteStatement, 'i', $custid);
		if (!mysqli_stmt_execute($deleteStatement)) {
			mysqli_stmt_close($deleteStatement);
			mysqli_rollback($con);
			error_log('Unable to clear cart after checkout.');
			http_response_code(500);
			exit('Unable to place order.');
		}
		mysqli_stmt_close($deleteStatement);
		mysqli_commit($con);
		$_SESSION['billno']=$billno;
		header("location:remark.php");
		exit;
	}
?>

<?php
	
	$cartStatement=mysqli_prepare($con, "SELECT C.id, PC.imagepath, PC.name, P.id, M.type, P.price, C.qty, P.price*C.qty AS total FROM tblCart C INNER JOIN tblproduct P ON C.productid=P.id INNER JOIN tblproductcategory PC ON P.productcategoryid=PC.id INNER JOIN tblmeasurement M ON P.measurementid=M.id WHERE C.customerid=?");
	mysqli_stmt_bind_param($cartStatement, 'i', $uid);
	mysqli_stmt_execute($cartStatement);
	$cartRES=mysqli_stmt_get_result($cartStatement);
	$total_amt=0;
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
	<title>Check Out &#8211; Dudhwala.com</title>
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
							
							<?php
								$uid=$_SESSION['uid'];
								$showcart="select count(*) as c from tblcart where customerid='$uid'";
								$cartres=$con->query($showcart);
								$cartrow=$cartres->fetch_array();
							?>
							<div class="column-1_5 contact_field contact_cart">
								<a href="cart.php">
									<span class="contact_icon icon-1"></span>
									<span class="contact_label contact_cart_label">cart:</span>
									<span class="cart_summa"><?php echo $cartrow['c']; ?>&nbsp;items</span>
								</a>
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
										<li><a href="profile.php">Profile</a></li>
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
									<li><a href="profile.php">Profile</a></li>
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
					<h1 class="page_title">Check Out</h1>
					<div class="breadcrumbs">
						<a class="breadcrumbs_item home" href="index.php">Home</a>
						<span class="breadcrumbs_delimiter"></span>
						<span class="breadcrumbs_item current">Check-Out</span>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Fetch Customer Data -->
		<?php
			
			$customerStatement=mysqli_prepare($con, "SELECT * FROM tblcustomer WHERE id = ?");
			mysqli_stmt_bind_param($customerStatement, 'i', $custid);
			mysqli_stmt_execute($customerStatement);
			$query=mysqli_stmt_get_result($customerStatement);
			
			$lidSQL="select * from tbllandmark;";
			$lidQuery=$con->query($lidSQL);
			
		?>
		
		<div class="page_paddings_yes">
			<div class="content_wrap">
				<div class="content_container">
					<article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
						<section class="post_content">
							<div class=" wpb_row vc_row-fluid">
								
								
								<div class="wpb_wrapper">
									<h2 class="sc_title sc_title_regular">Cart Details</h2>
									<div class="wpb_text_column wpb_content_element">
										<div class="wpb_wrapper">
											<div class="sc_table margin_bottom_medium row">
												
												<div class="column-2_6">
													<form class="sc_form" action="#" method="post">
													<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(app_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
													
													<?php $msg= $_SESSION['msg']; echo "<label style='color: red'>$msg</label>"; $_SESSION['msg']="";?>
														<table class="sc_table">
															<tr><td colspan="2"><label><b>Shipping address</b></label></td></tr>
															<?php
															while ($custData=mysqli_fetch_array($query)) {
																echo "<tr><td><b><label>Name:</label></b></td><td><label>$custData[1] $custData[2]</label></td></tr>";
																echo "<tr><td><label><b>Address:</b></label></td><td><input type='text' class='sc_form_select_container' name='address' value='$custData[3]'></td></tr>";
																echo "<tr><td><label><b>Landmark:</b></label></td><td><select name='lid' class='sc_form_select_container'>" ;
																while ($row=mysqli_fetch_array($lidQuery)){
																	if($row[0]==$custData[4]){
																		echo "<option value='$row[0]' selected>$row[1]</option>";
																	}
																	else{
																		echo "<option value='$row[0]'>$row[1]</option>";
																	}
																}
																echo "</select></td></tr>";
																echo "<tr><td><label><b>Payment Type:</b></label></td><td>Pay on delivery (Cash/Card) </td></tr>";
																echo "<tr><td colspan='2' align='right'><input type='submit' class='sc_button' name='btnUpdate' value='Update Address'></td></tr>";
															}
												?>
														</table>
													
												</form>
												</div>
												<div class="column-2_3">
													<form class="sc_form" action="#" method="post">
													<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(app_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
														<table class="sc_table">
															
															<thead>
															<th colspan="6"><label><b>Items List</b></label></th>
															</thead>
															
															<tr>
																<td><label><b>Sr.No.</b></label></td>
																<td><label><b>Image</b></label></td>
																<td><label><b>Product Name</b></label></td>
																<td><label><b>Product Type</b></label></td>
																<td><label><b>Qty</b></label></td>
																<td><label><b>Total</b></label></td>
															</tr>
															
															<?php
																$count=1;
																
																while ($row=$cartRES->fetch_array()){
																	?>
																	
																	<tr align="center">
																		<td><?php echo $count;?></td>
																		<td><img src="<?php echo $row['imagepath']?>" width="54" height="54" style="border-radius: 50%"></td>
																		<td><label><?php echo $row['name']; //echo $row['id'];?></label></td>
																		<td><label><?php echo $row['type'];?></label></td>
																		<td><label><?php echo $row['qty'];?></label></td>
																		<td><label>₹<?php echo $row['total']; $total_amt=$total_amt+$row['total'];?>.00</label></td>
																	</tr>
																	
																	<?php
																	$count++;
																}
																?>
															<tr>
																<td colspan="5" align="right">Shipping Charge:</td>
																<td align="center">₹0.00</td>
															</tr>
															
															<tr>
																<td colspan="5" align="right">Total Amount:</td>
																<td align="center">₹<?php echo $total_amt; ?>.00</td>
																
															</tr>
															<tr>
																<td colspan="6" align="right">
																	<input type="submit" value="Place Your Order" name="btnOrder">
																</td>
															</tr>
															<tr>
																<td colspan="6">
																<label style="text-align: right;"><b>*By clicking on the <a>'Place Your Order'</a> button, you agree to Dudhwala.com's <a>privacy notice</a> and <a>conditions of use</a>.</b></label>
																</td>
															</tr>
														</table>
              
													</form>
												</div>
												
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
