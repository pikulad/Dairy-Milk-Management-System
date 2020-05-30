<?php session_start();
require './connection.php';?>
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
        <title>Contacts &#8211; Dairy Farm</title>
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

    <body class="page contactspg body_style_wide body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">

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

                                        <li class="menu-item"><a href="shop.php"><span>Products</span></a></li>
                                        <li class="menu-item"><a href="grid.php"><span>Gallery</span></a></li>
                                        <li class="menu-item current-menu-ancestor current-menu-parent"><a href="contacts.php"><span>Contacts</span></a></li>
                                        <li class="menu-item menu-item-has-children"><?php echo $welcome ?>
                                            <ul>
                                                
                                                <li><a href="cart.php">Cart</a></li>
                                            </ul>
                                        </li>                                    </ul>
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
                                    <li class="menu-item "><a href="about-2.php"><span>About us</span></a>

                                    </li>
                                    <li class="menu-item"><a href="farm.php"><span>Farm</span></a></li>

                                    <li class="menu-item"><a href="shop.php"><span>Products</span></a></li>
                                    <li class="menu-item"><a href="grid.php"><span>Gallery</span></a></li>
                                    <li class="menu-item current-menu-ancestor current-menu-parent"><a href="contacts.php"><span>Contacts</span></a></li>
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
                    <div  class="bg_cust_1 top_panel_title_inner top_panel_inner_style_1 title_present_inner breadcrumbs_present_inner">
                        <div class="content_wrap">
                            <h1 class="page_title">Contacts</h1>
                            <div class="breadcrumbs">
                                <a class="breadcrumbs_item home" href="index.php">Home</a>
                                <span class="breadcrumbs_delimiter"></span>
                                <span class="breadcrumbs_item current">Contacts</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page_content_wrap page_paddings_no">
                    <div class="content_wrap">
                        <div class="content">
                            <article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                                <section class="post_content">
                                    <div class="vc_row-full-width"></div>
                                    <div id="sc_form_282_wrap" class="sc_form_wrap vc_col-sm-pull-4">
                                        <div id="sc_form_282" class="sc_form sc_form_style_form_1">
                                            <h2 class="sc_form_title sc_item_title sc_item_title_without_descr">Contact Us</h2>
                                            <form id="sc_form_282_form" class="sc_input_hover_default" data-formtype="form_1" method="post" action="includes/sendmail.php">
                                                <div class="sc_form_info">
                                                    <div class="sc_form_item sc_form_field label_over">
                                                        <input id="sc_form_username" type="text" name="username" placeholder="Name *" aria-required="true">
                                                    </div>
                                                    <div class="sc_form_item sc_form_field label_over">
                                                        <input id="sc_form_email" type="text" name="email" placeholder="E-mail *" aria-required="true">
                                                    </div>
                                                </div>
                                                <div class="sc_form_item sc_form_message">
                                                    <textarea id="sc_form_message" name="message" placeholder="Message" aria-required="true"></textarea>
                                                </div>
                                                <div class="sc_form_item sc_form_button">
                                                    <button>Send Message</button>
                                                </div>
                                                <div class="result sc_infobox"></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="vc_row-full-width"></div>
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_3 margin_top_huge margin_bottom_huge">
                                                        <div class="column-1_3 sc_column_item sc_column_item_1 odd first centext">
                                                            <div class="sc_section section_style_bordered_section">
                                                                <div class="sc_section_inner">
                                                                    <div class="sc_section_content_wrap">
                                                                        <h4 class="sc_title sc_title_regular sc_align_center">Address</h4>
                                                                        <span class="sc_highlight">7,Shaktinath Soc. ,&nbsp; Zadeshwar, &nbsp; Bharuch - 392011 </span>
                                                                        <div class="vc_empty_space h_42e">
                                                                            <span class="vc_empty_space_inner"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item sc_column_item_2 even centext">
                                                            <div class="sc_section section_style_bordered_section">
                                                                <div class="sc_section_inner">
                                                                    <div class="sc_section_content_wrap">
                                                                        <h4 class="sc_title sc_title_regular sc_align_center">Phone</h4>
                                                                        <span class="sc_highlight">+91 9924209820</span>
                                                                        <div class="vc_empty_space h_42e">
                                                                            <span class="vc_empty_space_inner"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item sc_column_item_3 odd centext">
                                                            <div class="sc_section section_style_bordered_section">
                                                                <div class="sc_section_inner">
                                                                    <div class="sc_section_content_wrap">
                                                                        <h4 class="sc_title sc_title_regular sc_align_center">Email</h4>
                                                                        <span class="sc_highlight">info@dudhwala.com</span>
                                                                        <div class="vc_empty_space h_42e">
                                                                            <span class="vc_empty_space_inner"></span>
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
        <script type='text/javascript' src='http://maps.google.com/maps/api/js'></script>
        <script type='text/javascript' src='js/vendor/core.googlemap.js'></script>
        <script type='text/javascript' src='js/custom/core.messages.js'></script>

    </body>

</html>
