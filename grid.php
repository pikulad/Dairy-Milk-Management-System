<?php
	session_start();
	require_once "connection.php";?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<?php
    if (isset($_COOKIE["username"]))
        {
        $uname=$_COOKIE["username"];
        $welcome="<a href='logout.php'><span>$uname, Logout</span></a>";
        
    } else {
        $welcome="<a href='login.php'><span>Hello,Sign in</span></a>";
    }
    ?> 
<head>
    <title>Gallery Grid &#8211; Dairy Farm</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel='stylesheet' href='js/vendor/esg/settings.css' type='text/css' media='all' />
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
    <link rel='stylesheet' href='js/vendor/esg/lightbox.css' type='text/css' media='all' />

</head>

<body class="page gridpg body_style_wide body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">

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
                                            <li class="menu-item"><a href="about-2.php"><span>About us</span></a>
                                                
                                            </li>
                                            <li class="menu-item"><a href="farm.php"><span>Farm</span></a></li>
                                            
                                            <li class="menu-item"><a href="shop.php"><span>Products</span></a></li>
                                            <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children"><a href="grid.php"><span>Gallery</span></a></li>
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

                <div class="panel_bottom">
                </div>
            </div>
            <div class="mask"></div>
        </div>
        <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
            <div  class="bg_cust_1 top_panel_title_inner top_panel_inner_style_1  title_present_inner breadcrumbs_present_inner">
                <div class="content_wrap">
                    <h1 class="page_title">Gallery Grid</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Gallery Grid</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="page_content_wrap page_paddings_no">
            <div class="content_wrap">
                <div class="content">
                    <article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                        <section class="post_content">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="sc_section margin_bottom_huge">
                                                <div class="sc_section_inner">
                                                    <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">Our Portfolio<span></span></h2>
                                                    <div class="sc_section_content_wrap">
                                                        <article class="myportfolio-container minimal-light" id="esg-grid-1-1-wrap">
                                                            <div id="esg-grid-1-1" class="esg-grid">
                                                                <ul>
                                                                    <li id="eg-1-post-id-286" class="filterall filter-farm-life-habitants filter-milk filter-natural eg-dairyfarm-wrapper eg-post-id-286" data-date="1464432764">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-2.jpg" alt="" width="2400" height="1326"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-286 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-286 esgbox" href="images/post-2.jpg" lgtitle="Innovative Farming: Regular Cow Foot-Bath">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-286 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-286"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li id="eg-1-post-id-284" class="filterall filter-dairy-herd-management filter-cheese filter-organic eg-dairyfarm-wrapper eg-post-id-284" data-date="1464951101">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-4.jpg" alt="" width="2400" height="1738"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-284 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-284 esgbox" href="images/post-11.jpg" lgtitle="Beauty in Small Farming Things">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-284 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-284"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li id="eg-1-post-id-282" class="filterall filter-world-dairy-markets filter-milk filter-natural eg-dairyfarm-wrapper eg-post-id-282" data-date="1465728616">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-12.jpg" alt="" width="2400" height="1600"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-282 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-282 esgbox" href="images/post-12.jpg" lgtitle="Safe Environment for Farm Cows">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-282 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-282"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li id="eg-1-post-id-280" class="filterall filter-unhealthy-myths filter-cheese filter-organic eg-dairyfarm-wrapper eg-post-id-280" data-date="1466505989">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-10.jpg" alt="" width="2400" height="2327"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-280 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-280 esgbox" href="images/post-10.jpg" lgtitle="Why Our Cream is so Lightweight">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-280 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-280"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li id="eg-1-post-id-278" class="filterall filter-the-industrys-input filter-milk filter-natural eg-dairyfarm-wrapper eg-post-id-278" data-date="1467974146">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-3.jpg" alt="" width="2400" height="1600"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-278 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-278 esgbox" href="images/post-3.jpg" lgtitle="Organic Cheese Curds and Gravy">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-278 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-278"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li id="eg-1-post-id-274" class="filterall filter-farm-life-habitants filter-milk filter-natural eg-dairyfarm-wrapper eg-post-id-274" data-date="1468835306">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-8.jpg" alt="" width="2400" height="1689"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-274 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-274 esgbox" href="images/post-8.jpg" lgtitle="Grass Management Tips for Late Summer">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-274 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-274"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li id="eg-1-post-id-276" class="filterall filter-the-industrys-input filter-cheese filter-organic eg-dairyfarm-wrapper eg-post-id-276" data-date="1469615154">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-9.jpg" alt="" width="2400" height="1979"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-276 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-276 esgbox" href="images/post-9.jpg" lgtitle="Whole Truth about Raw Milk">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-276 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-276"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li id="eg-1-post-id-271" class="filterall filter-dairy-herd-management filter-cheese filter-organic eg-dairyfarm-wrapper eg-post-id-271" data-date="1470390367">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-4.jpg" alt="" width="2400" height="1883"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-271 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-271 esgbox" href="images/post-4.jpg" lgtitle="Butter of a Dream">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-271 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-271"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li id="eg-1-post-id-227" class="filterall filter-dairy-herd-management filter-cheese filter-organic eg-dairyfarm-wrapper eg-post-id-227" data-date="1475052294">
                                                                        <div class="esg-media-cover-wrapper">
                                                                            <div class="esg-entry-media esg-pressback" data-delay="0">
                                                                                <img src="images/post-1.jpg" alt="" width="2400" height="1760"></div>
                                                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                                <div class="esg-overlay esg-fade eg-dairyfarm-container" data-delay="0"></div>
                                                                                <div class="esg-center eg-post-227 eg-dairyfarm-element-0-a esg-zoomfront" data-delay="0.3">
                                                                                    <a class="eg-dairyfarm-element-0 eg-post-227 esgbox" href="images/post-1.jpg" lgtitle="Dairy Nutrition and Profitability Optimization">
                                                                                        <i class="eg-icon-search"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-post-227 eg-dairyfarm-element-1-a esg-zoomfront" data-delay="0.1">
                                                                                    <a class="eg-dairyfarm-element-1 eg-post-227"  target="_self">
                                                                                        <i class="eg-icon-link"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="esg-center eg-dairyfarm-element-5 esg-none esg-clear"></div>
                                                                                <div class="esg-center eg-dairyfarm-element-6 esg-none esg-clear"></div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </article>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>
                    <section class="related_wrap related_wrap_empty"></section>
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
<script type='text/javascript' src='js/vendor/esg/lightbox.js'></script>
<script type='text/javascript' src='js/vendor/esg/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='js/vendor/modernizr.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/jquery.blockUI.min.js'></script>
<script type='text/javascript' src='js/vendor/jquery/js.cookie.min.js'></script>
<script type='text/javascript' src='js/vendor/superfish.js'></script>
<script type='text/javascript' src='js/custom/core.utils.js'></script>
<script type='text/javascript' src='js/custom/core.init.js'></script>
<script type='text/javascript' src='js/custom/init.js'></script>
<script type='text/javascript' src='js/custom/core.debug.js'></script>
<script type='text/javascript' src='js/custom/embed.min.js'></script>
<script type='text/javascript' src='js/custom/shortcodes.js'></script>
<script type='text/javascript' src='js/vendor/comp/comp_front.min.js'></script>
<script type='text/javascript' src='js/vendor/esg/jquery.themepunch.essential.min.js'></script>

</body>

</html>
