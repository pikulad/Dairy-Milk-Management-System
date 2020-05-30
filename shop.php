<?php

session_start();
    require_once "connection.php";
if (isset($_COOKIE["username"]))
{
    $uname=$_COOKIE["username"];
    $welcome="<a href='logout.php'><span>$uname, Logout</span></a>";

} else {
    $welcome="<a href='login.php'><span>Hello,Sign in</span></a>";
}
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
    <title>Products &#8211; Dairy Farm</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Average|Droid+Serif:400,700|Libre+Baskerville:400,400i,700|Open+Sans:300,400,600,700,800|Oswald:300,400,700|Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext' type='text/css' media='all' />
    <link rel='stylesheet' href='css/layout.css' type='text/css' media='all' />
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

<body class="archive shoppg post-type-archive post-type-archive-product woocommerce woocommerce-page body_style_wide body_filled article_style_stretch layout_excerpt template_excerpt scheme_original top_panel_show top_panel_above sidebar_show sidebar_left sidebar_outer_hide vc_responsive">

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
                                            <li class="menu-item menu-item-has-children"><a href="about-2.php"><span>About us</span></a>
                                                
                                            </li>
                                            <li class="menu-item"><a href="farm.php"><span>Farm</span></a></li>
                                            
                                            <li class="menu-item current-menu-ancestor current-menu-parent"><a href="shop.php"><span>Products</span></a></li>
                                            <li class="menu-item"><a href="grid.php"><span>Gallery</span></a></li>
                                            <li class="menu-item"><a href="contacts.php"><span>Contacts</span></a></li>
                                 <li class="menu-item menu-item-has-children"><?php echo $welcome ?>
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
                                    <li class="menu-item menu-item-has-children"><a href="about-2.php"><span>About us</span></a>

                                    </li>
                                    <li class="menu-item"><a href="farm.php"><span>Farm</span></a></li>

                                    <li class="menu-item"><a href="shop.php"><span>Products</span></a></li>
                                    <li class="menu-item"><a href="grid.php"><span>Gallery</span></a></li>
                                    <li class="menu-item"><a href="contacts.php"><span>Contacts</span></a></li>
                           <li class="menu-item menu-item-has-children"><?php echo $welcome ?>
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
                    <h1 class="page_title">Shop</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Shop</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="page_content_wrap page_paddings_yes">
            <div class="content_wrap">
                <div class="content">
                    <div class="list_products shop_mode_thumbs">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">Home</a>&nbsp;&#47;&nbsp;Shop
                        </nav>
                        <header class="woocommerce-products-header"></header>
                        <div class="mode_buttons">
                            <form action="#" method="post">
                                <a href="shop.php" class="woocommerce_thumbs icon-th" title="Show products as thumbs"></a>
                                <a href="shop-list.php" class="woocommerce_list icon-th-list" title="Show products as list"></a>
                            </form>
                        </div>
                        <p class="woocommerce-result-count">
                            Showing all 9 results</p>
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby">
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date" selected='selected'>Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                            <input type="hidden" name="q" value="shop.php" />
                        </form>
                        <ul class="products">
                            <?php
                            $sql="select * from tblproductcategory";
                            $query=mysqli_query($con,$sql);
                            while ($result=mysqli_fetch_assoc($query))
                            {
                                ?>


                            <li class="product has-post-thumbnail column-1_3 instock purchasable">
                                <div class="post_item_wrap">
                                    <div class="post_featured">
                                        <div class="post_thumb">
                                            <a class="hover_icon hover_icon_link" href="single-product.php?id=<?php echo $result['id'];?>">
                                                <img src=<?php echo $result['imagepath'];?> class="attachment-shop_catalog size-shop_catalog" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post_content">
                                        <h2 class="woocommerce-loop-product__title">
                                            <a href="single-product.php?id=<?php echo $result['id'];?>">
                                                <?php //echo $result['name'];
                                                $id=$result['id'];?></a>
                                        </h2>
                                        <span class="price">
                                        <?php/*
                                        $sql2="select * from tblproduct where productcategoryid=$id";
                                        //echo $sql2;
                                        $query2=mysqli_query($con,$sql2);
                                        $Total_product=mysqli_num_rows($query2);
                                            if($Total_product>0) {
	
	
												$i = 0;
												while ($result2 = mysqli_fetch_array($query2)) {
													if ($i >= 1) {
														echo " - ";
													}
													?>


                                                    <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#8377;</span>
                                                        <?php
															echo $result2['price'];
															$i++;
														?>
                                                    </span>
		
		
													<?php
												}
											}
                                            else{?>
                                                  <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">Product Not Available</span>
                                                  
                                                  </span><?php
                                            }*/
                                        ?>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"><?php echo $result['name']?></span>
                                                  
                                                  </span>
                                        </span>
                                        <a rel="nofollow" href="single-product.php?id=<?php echo $result['id'];?>"  class="button add_to_cart_button">Select options</a>
                                    </div>
                                </div>
                            </li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <div class="sidebar widget_area scheme_light" role="complementary">
                    <div class="sidebar_inner widget_area_inner">
                        <!--<aside id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
                            <h4 class="widget_title">Your Cart</h4>
                            <div class="widget_shopping_cart_content">
                                <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                            </div>
                        </aside>
                        <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
                            <h4 class="widget_title">Price Filter</h4>
                            <form method="get" action="shop.php">
                                <div class="price_slider_wrapper">
                                    <div class="price_slider"></div>
                                    <div class="price_slider_amount">
                                        <input type="text" id="min_price" name="min_price" value="" data-min="4" placeholder="Min price" />
                                        <input type="text" id="max_price" name="max_price" value="" data-max="136" placeholder="Max price" />
                                        <button type="submit" class="button">Filter</button>
                                        <div class="price_label">Price:
                                            <span class="from"></span> &mdash;
                                            <span class="to"></span>
                                        </div>
                                        <input type="hidden" name="q" value="shop.php" />
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </form>
                        </aside>-->
                        <aside class="widget woocommerce widget_product_categories">
                            <h4 class="widget_title">Categories</h4>
                            <ul class="product-categories">
                                <li class="cat-item"><a href="#">Butter</a></li>
                                <li class="cat-item"><a href="#">Cheese</a></li>
                                <li class="cat-item"><a href="#">Ice Cream</a></li>
                                <li class="cat-item"><a href="#">Milk</a></li>
                                <li class="cat-item"><a href="#">Yoghurt</a></li>
                            </ul>
                        </aside>
                        <aside class="widget woocommerce widget_product_tag_cloud">
                            <h4 class="widget_title">Tags</h4>
                            <div class="tagcloud">
                                <a href="#" aria-label="buttery (3 products)">buttery</a>
                                <a href="#" aria-label="cheese (3 products)">cheese</a>
                                <a href="#" aria-label="cream (7 products)">cream</a>
                                <a href="#" aria-label="italian (7 products)">italian</a>
                                <a href="#" aria-label="organic (3 products)">organic</a>
                                <a href="#" aria-label="taste (3 products)">taste</a>
                            </div>
                        </aside>
                    </div>
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
<script type='text/javascript' src='js/vendor/ui/jquery.blockUI.min.js'></script>
<script type='text/javascript' src='js/vendor/jquery/js.cookie.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/woocommerce.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/cart-fragments.min.js'></script>
<script type='text/javascript' src='js/vendor/superfish.js'></script>
<script type='text/javascript' src='js/custom/core.utils.js'></script>
<script type='text/javascript' src='js/custom/core.init.js'></script>
<script type='text/javascript' src='js/custom/init.js'></script>
<script type='text/javascript' src='js/custom/core.debug.js'></script>
<script type='text/javascript' src='js/custom/embed.min.js'></script>
<script type='text/javascript' src='js/custom/shortcodes.js'></script>
<script type='text/javascript' src='js/vendor/ui/core.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/widget.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/mouse.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/slider.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/jquery-ui-touch-punch.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/accounting.min.js'></script>
<script type='text/javascript' src='js/vendor/woo/price-slider.min.js'></script>

</body>

</html>
