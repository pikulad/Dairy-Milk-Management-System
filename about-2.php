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
        <title>About 2 &#8211; Dairy Farm</title>
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

    </head>

    <body class="page ab2 body_style_wide body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">

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
                                        <li class="menu-item current-menu-ancestor current-menu-parent"><a href="about-2.php"><span>About us</span></a>

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
                <div class="top_panel_title top_panel_style_1  title_present breadcrumbs_present scheme_original">
                    <div  class="bg_cust_1 top_panel_title_inner top_panel_inner_style_1  title_present_inner breadcrumbs_present_inner">
                        <div class="content_wrap">
                            <h1 class="page_title">About US</h1>
                            <div class="breadcrumbs"><a class="breadcrumbs_item home" href="index.php">Home</a> <span class="breadcrumbs_delimiter"></span> <span class="breadcrumbs_item current">About Us</span></div>
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
                                                    <div class="sc_section sc_section_block margin_bottom_huge aligncenter" data-animation="animated fadeInUp normal">
                                                        <div class="sc_section_inner">
                                                            <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">About Us<span></span></h2>
                                                            <div class="sc_section_content_wrap">
                                                                <div class="sc_promo sc_promo_size_large">
                                                                    <div class="sc_promo_inner">
                                                                        <div class="sc_promo_image"></div>
                                                                        <div class="sc_promo_block sc_align_left">
                                                                            <div class="sc_promo_block_inner">
                                                                                <div class="sc_promo_content">
                                                                                    <div id="sc_tabs_215" class="sc_tabs sc_tabs_style_1" data-active="0">
                                                                                        <ul class="sc_tabs_titles">
                                                                                            <li class="sc_tabs_title">
                                                                                                <a href="#sc_tab_315_1_19" class="theme_button" id="sc_tab_315_1_19_tab">2001</a>
                                                                                            </li>
                                                                                            <li class="sc_tabs_title">
                                                                                                <a href="#sc_tab_315_2_67" class="theme_button" id="sc_tab_315_2_67_tab">2002</a>
                                                                                            </li>
                                                                                            <li class="sc_tabs_title">
                                                                                                <a href="#sc_tab_473_0" class="theme_button" id="sc_tab_473_0_tab">2007</a>
                                                                                            </li>
                                                                                            <li class="sc_tabs_title">
                                                                                                <a href="#sc_tab_649_10" class="theme_button" id="sc_tab_649_10_tab">2013</a>
                                                                                            </li>
                                                                                            <li class="sc_tabs_title">
                                                                                                <a href="#sc_tab_625_4" class="theme_button" id="sc_tab_625_4_tab">2019</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div id="sc_tab_315_1_19" class="sc_tabs_content odd first">
                                                                                            <div class="sc_section aligncenter">
                                                                                                <div class="sc_section_inner">
                                                                                                    <div class="sc_section_content_wrap">
                                                                                                        <h4 class="sc_title sc_title_regular cmrg_1">Our Story</h4>
                                                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                                                            <div class="wpb_wrapper">
                                                                                                                <p>For Better Milk we buy a one cow. Then we started increasing our milk collection.</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="sc_tab_315_2_67" class="sc_tabs_content even">
                                                                                            <div class="sc_section aligncenter">
                                                                                                <div class="sc_section_inner">
                                                                                                    <div class="sc_section_content_wrap">
                                                                                                        <h4 class="sc_title sc_title_regular cmrg_1">Starting a Farm</h4>
                                                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                                                            <div class="wpb_wrapper">
                                                                                                                <p>In 2002, We buy a new farm for dairy project.</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="sc_tab_473_0" class="sc_tabs_content odd">
                                                                                            <div class="sc_section aligncenter">
                                                                                                <div class="sc_section_inner">
                                                                                                    <div class="sc_section_content_wrap">
                                                                                                        <h4 class="sc_title sc_title_regular cmrg_1">The Best Milk in the State</h4>
                                                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                                                            <div class="wpb_wrapper">
                                                                                                                <p>We Started distributing our product.Our milk is pure so everyone reference to our milk in city.</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="sc_tab_649_10" class="sc_tabs_content even">
                                                                                            <div class="sc_section aligncenter">
                                                                                                <div class="sc_section_inner">
                                                                                                    <div class="sc_section_content_wrap">
                                                                                                        <h4 class="sc_title sc_title_regular cmrg_1">Store Opening</h4>
                                                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                                                            <div class="wpb_wrapper">
                                                                                                                <p>In 2013, We open a new shop for distributing our product.</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="sc_tab_625_4" class="sc_tabs_content odd">
                                                                                            <div class="sc_section aligncenter">
                                                                                                <div class="sc_section_inner">
                                                                                                    <div class="sc_section_content_wrap">
                                                                                                        <h4 class="sc_title sc_title_regular cmrg_1">Online Shop and Shipment</h4>
                                                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                                                            <div class="wpb_wrapper">
                                                                                                                <p>In 2018, We lunch our website and giving door to door delivery in particular area in City. </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="vc_empty_space h_11r">
                                                                                        <span class="vc_empty_space_inner"></span>
                                                                                    </div>
                                                                                    <a href="#" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">read more</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1475061036330 inverse_colors">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner vc_custom_1475062560306">
                                                <div class="wpb_wrapper">
                                                    <div class="sc_section margin_top_huge" data-animation="animated fadeInUp normal">
                                                        <div class="sc_section_inner">
                                                            <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">Team<span></span></h2>
                                                            <div class="sc_section_content_wrap">
                                                                <div id="sc_team_745_wrap" class="sc_team_wrap">
                                                                    <div id="sc_team_745" class="sc_team sc_team_style_team-3 margin_bottom_large">
                                                                        <div class="sc_columns columns_wrap">
                                                                            <div class="column-1_4 column_padding_bottom">
                                                                                <div id="sc_team_745_1" class="sc_team_item sc_team_item_1 odd first">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="Bobby Young" src="images/team-2-370x370.jpg">
                                                                                        <div class="sc_team_item_hover">
                                                                                            <div class="sc_team_item_socials">
                                                                                                <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
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
                                                                                                        <a href="#" target="_blank" class="social_icons social_linkedin">
                                                                                                            <span class="icon-linkedin"></span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="sc_team_item_info">
                                                                                        <h4 class="sc_team_item_title">
                                                                                            <a href="single-team.php">Bobby Young</a>
                                                                                        </h4>
                                                                                        <div class="sc_team_item_position">A Tractor Driver</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="column-1_4 column_padding_bottom">
                                                                                <div id="sc_team_745_2" class="sc_team_item sc_team_item_2 even">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="Jose Morrison" src="images/team-4-370x370.jpg">
                                                                                        <div class="sc_team_item_hover">
                                                                                            <div class="sc_team_item_socials">
                                                                                                <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
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
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="sc_team_item_info">
                                                                                        <h4 class="sc_team_item_title">
                                                                                            <a href="single-team.php">Jose Morrison</a>
                                                                                        </h4>
                                                                                        <div class="sc_team_item_position">A Business Owner</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="column-1_4 column_padding_bottom">
                                                                                <div id="sc_team_745_3" class="sc_team_item sc_team_item_3 odd">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="Laura Smith" src="images/team-3-370x370.jpg">
                                                                                        <div class="sc_team_item_hover">
                                                                                            <div class="sc_team_item_socials">
                                                                                                <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
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
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="sc_team_item_info">
                                                                                        <h4 class="sc_team_item_title">
                                                                                            <a href="single-team.php">Laura Smith</a>
                                                                                        </h4>
                                                                                        <div class="sc_team_item_position">A Chief Accountant</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="column-1_4 column_padding_bottom">
                                                                                <div id="sc_team_745_4" class="sc_team_item sc_team_item_4 even">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="Tyler Holland" src="images/team-1-370x370.jpg">
                                                                                        <div class="sc_team_item_hover">
                                                                                            <div class="sc_team_item_socials">
                                                                                                <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
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
                                                                                                        <a href="#" target="_blank" class="social_icons social_linkedin">
                                                                                                            <span class="icon-linkedin"></span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="sc_team_item_info">
                                                                                        <h4 class="sc_team_item_title">
                                                                                            <a href="single-team.php">Tyler Holland</a>
                                                                                        </h4>
                                                                                        <div class="sc_team_item_position">Our Only Marketer</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_row-full-width"></div>
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
        <script type='text/javascript' src='js/vendor/ui/core.min.js'></script>
        <script type='text/javascript' src='js/vendor/ui/widget.min.js'></script>
        <script type='text/javascript' src='js/vendor/ui/tabs.min.js'></script>
        <script type='text/javascript' src='js/vendor/isotope.pkgd.min.js'></script>

    </body>

</html>
