<?php
	session_start();
	require_once "connection.php";?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">


    <?php
    if (isset($_COOKIE["username"])) {
        $uname = $_COOKIE["username"];
        $welcome = "<a href='logout.php'><span>$uname, Logout</span></a>";
    } else {
        $welcome = "<a href='login.php'><span>Hello,Sign in</span></a>";
    }
    ?> 
    <head>
        <title>Dudhwala.com</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Average|Droid+Serif:400,700|Libre+Baskerville:400,400i,700|Open+Sans:300,400,600,700,800|Oswald:300,400,700|Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext' type='text/css' media='all' />
        <link rel='stylesheet' href='css/layout.css' type='text/css' media='all' />
        <link rel='stylesheet' href='js/vendor/revslider/settings.css' type='text/css' media='all' />
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
        <link rel='stylesheet' href='js/vendor/comp/comp.min.css' type='text/css' media='all' />
        <link rel='stylesheet' href='js/vendor/swiper/swiper.css' type='text/css' media='all' />
    </head>

    <body class="index home page body_style_wide body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">

        <a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="index.php" data-separator="yes"></a>
        <a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>

        <div class="body_wrap">
            <div class="page_wrap">
                <div class="top_panel_fixed_wrap"></div>
                <header class="top_panel_wrap top_panel_style_4 scheme_original">
                    <div class="top_panel_wrap_inner top_panel_inner_style_4 top_panel_position_above">
                        <div class="top_panel_middle">
                            <div class="content_wrap">
                                <div class="contact_logo">
                                    <div class="logo">
                                        <a href="index.php">
                                            <img src="images/logo.png" class="logo_main" alt="" width="239" height="59">
                                            <img src="images/logo.png" class="logo_fixed" alt="" width="239" height="59">
                                        </a>
                                    </div>
                                </div>
								<!--<?php
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
                                </div>-->
                                <div class="menu_main_wrap">
                                    <nav class="menu_main_nav_area menu_hover_fade">
                                        <ul id="menu_main" class="menu_main_nav">
                                            <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children"><a href="#"><span>Home</span></a>
                                            </li>
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
                <section class="slider_wrap slider_fullwide slider_engine_revo slider_alias_slider-1">
                    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
                        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" data-version="5.2.6">
                            <ul>
                                <li data-index="rs-1" data-transition="cube" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="images/home-1-slide-1-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <img src="images/home-1-slide-1.jpg" alt="" title="home-1-slide-1" width="1903" height="873" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                    <div class="tp-caption BigWhiteText tp-resizeme" id="slide-1-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="-60" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;s:1000;e:Back.easeOut;" data-transform_out="opacity:0;s:300;" data-start="730" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.1">Milk and More! </div>
                                    <div class="tp-caption SmallWhiteText tp-resizeme" id="slide-1-layer-2" data-x="center" data-hoffset="" data-y="center" data-voffset="35" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="3030" data-splitin="none" data-splitout="none" data-responsive_offset="on">Fresh. Local. Delivered </div>
                                    <div class="tp-caption ButtonText rev-btn" id="slide-1-layer-3" data-x="center" data-hoffset="" data-y="center" data-voffset="151" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;" data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(255, 255, 255, 0);bc:rgba(255, 255, 255, 1.00);" data-transform_in="y:bottom;rZ:90deg;sX:2;sY:2;s:800;e:Quad.easeIn;" data-transform_out="opacity:0;s:300;" data-start="4090" data-splitin="none" data-splitout="none" data-actions='[{"event":"click","action":"simplelink","target":"_blank","url":".\/shop.php","delay":""}]' data-responsive_offset="on" data-responsive="off">View our products </div>
                                </li>
                                <li data-index="rs-2" data-transition="cube-horizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="images/home-1-slide-2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <img src="images/home-1-slide-2.jpg" alt="" title="home-1-slide-2" width="1903" height="873" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                    <div class="tp-caption BigWhiteText tp-resizeme" id="slide-2-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="-60" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;s:1000;e:Back.easeOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.1">Milk Products </div>
                                    <div class="tp-caption SmallWhiteText tp-resizeme" id="slide-2-layer-2" data-x="center" data-hoffset="" data-y="center" data-voffset="35" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="2890" data-splitin="none" data-splitout="none" data-responsive_offset="on">Fresh. Local. Delivered </div>
                                    <div class="tp-caption ButtonText rev-btn" id="slide-2-layer-3" data-x="center" data-hoffset="" data-y="center" data-voffset="151" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;" data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(255, 255, 255, 0);bc:rgba(255, 255, 255, 1.00);" data-transform_in="y:bottom;rZ:90deg;sX:2;sY:2;s:800;e:Quad.easeIn;" data-transform_out="opacity:0;s:300;" data-start="3970" data-splitin="none" data-splitout="none" data-actions='[{"event":"click","action":"simplelink","target":"_blank","url":".\/shop.php","delay":""}]' data-responsive_offset="on" data-responsive="off">View our products </div>
                                </li>
                                <li data-index="rs-3" data-transition="incube" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="images/home-1-slide-3-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <img src="images/home-1-slide-3.jpg" alt="" title="home-1-slide-3" width="1903" height="873" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                    <div class="tp-caption BigWhiteText tp-resizeme" id="slide-3-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="-60" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;s:1000;e:Back.easeOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.1">Sweet Ice Cream </div>
                                    <div class="tp-caption SmallWhiteText tp-resizeme" id="slide-3-layer-2" data-x="center" data-hoffset="" data-y="center" data-voffset="35" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="2890" data-splitin="none" data-splitout="none" data-responsive_offset="on">Fresh. Local. Delivered </div>
                                    <div class="tp-caption ButtonText rev-btn" id="slide-3-layer-3" data-x="center" data-hoffset="" data-y="center" data-voffset="151" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;" data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(255, 255, 255, 0);bc:rgba(255, 255, 255, 1.00);" data-transform_in="y:bottom;rZ:90deg;sX:2;sY:2;s:800;e:Quad.easeIn;" data-transform_out="opacity:0;s:300;" data-start="3970" data-splitin="none" data-splitout="none" data-actions='[{"event":"click","action":"simplelink","target":"_blank","url":".\/shop.php","delay":""}]' data-responsive_offset="on" data-responsive="off">View our products </div>
                                </li>
                            </ul>
                            <div class="tp-bannertimer tp-bottom"></div>
                        </div>
                    </div>
                </section>
                <div class="page_content_wrap page_paddings_no">
                    <div class="content_wrap">
                        <div class="content">
                            <article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                                <section class="post_counters">
                                    <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1475063547001">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="sc_section margin_bottom_small section_style_dark_text" data-animation="animated fadeInUp normal">
                                                        <div class="sc_section_inner">
                                                            <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">Welcome To Our Farm!<span></span></h2>
                                                            <div class="sc_section_content_wrap">
                                                                <div class="sc_section sc_section_block margin_bottom_large aligncenter mw800">
                                                                    <div class="sc_section_inner">
                                                                        <div class="sc_section_content_wrap">
                                                                            <span class="sc_highlight fst_1">Here you will find a wide range of healthy and fresh dairy products that were proudly produced at our farm by our farmers and cows. Welcome to dudhwala.com !</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vc_empty_space h_6r">
                                                                    <span class="vc_empty_space_inner"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_row-full-width"></div>
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="sc_section aligncenter" data-animation="animated fadeInUp normal">
                                                        <div class="sc_section_inner">
                                                            <div class="sc_section_content_wrap">
                                                                <figure class="sc_image sc_image_shape_square margin_top_huge-">
                                                                    <img src="images/big-cow.png" alt="" />
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner vc_custom_1475066123130">
                                                <div class="wpb_wrapper">
                                                    <div id="sc_services_918_wrap" class="sc_services_wrap">
                                                        <div id="sc_services_918" class="sc_services sc_services_style_services-1 sc_services_type_images  margin_top_large margin_bottom_large fwidth" data-animation="animated fadeInUp normal">
                                                            <div class="sc_columns columns_wrap">
                                                                <div class="column-1_3 column_padding_bottom">
                                                                    <div id="sc_services_918_1" class="sc_services_item sc_services_item_1 odd first">
                                                                        <div class="sc_services_item_featured post_featured">
                                                                            <div class="post_thumb" data-image="" data-title="Our Dairy Farm">
                                                                                <a class="hover_icon hover_icon_link" href="about-2.php">
                                                                                    <img alt="" src="images/service3-370x300.jpg">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc_services_item_content">
                                                                            <h4 class="sc_services_item_title">
                                                                                <a href="about-2.php">Our Dairy Farm</a>
                                                                            </h4>
                                                                            <div class="sc_services_item_description">
                                                                                <div class="wpb_text_column wpb_content_element ">
                                                                                    <div class="wpb_wrapper">
                                                                                        <p>We built our own process that can’t be compared; an automated hygienic herringbone milking parlor system. The milk is cooled and then monitored for freshness and bacteria immediately after leaving the cow. We are particular and work to provide you with the best in high-quality raw milk.</p>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="about-2.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">discover history</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="column-1_3 column_padding_bottom">
                                                                    <div id="sc_services_918_2" class="sc_services_item sc_services_item_2 even">
                                                                        <div class="sc_services_item_featured post_featured">
                                                                            <div class="post_thumb" data-image="" data-title="Meet Our Cows">
                                                                                <a class="hover_icon hover_icon_link" href="farm.php">
                                                                                    <img alt="" src="images/service2-370x300.jpg">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc_services_item_content">
                                                                            <h4 class="sc_services_item_title">
                                                                                <a href="farm.php">Meet Our Cows</a>
                                                                            </h4>
                                                                            <div class="sc_services_item_description">
                                                                                <div class="wpb_text_column wpb_content_element ">
                                                                                    <div class="wpb_wrapper">
                                                                                        <p> Using wireless sensing technology, we monitor each cow’s health 24/7. Trained workers and veterinarians continuously analyze the computer data for proactive intervention to keep the cows healthy. Our cows are milked using an automated hygienic herringbone milking parlor system while music is played in the background to relax them. At no time in the process is the milk ever touched by humans.</p>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="farm.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">view cows</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="column-1_3 column_padding_bottom">
                                                                    <div id="sc_services_918_3" class="sc_services_item sc_services_item_3 odd">
                                                                        <div class="sc_services_item_featured post_featured">
                                                                            <div class="post_thumb" data-image="" data-title="Our Organic Food">
                                                                                <a class="hover_icon hover_icon_link" href="shop.php">
                                                                                    <img alt="" src="images/service1-370x300.jpg">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc_services_item_content">
                                                                            <h4 class="sc_services_item_title">
                                                                                <a href="shop.php">Our Organic Food</a>
                                                                            </h4>
                                                                            <div class="sc_services_item_description">
                                                                                <div class="wpb_text_column wpb_content_element ">
                                                                                    <div class="wpb_wrapper">
                                                                                        <p>Our entire process is mechanized and untouched by human hands. Our Dairy combines new and innovative farming methods with centuries-old dairy traditions to provide the highest standard of unpasteurized milk, ready for delivery and to make ghee.</p>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="shop.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">shop now</a>
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
                                    <div class="vc_row wpb_row vc_row-fluid vc_custom_1475148381788 inverse_colors">
                                        <div class="wpb_column vc_column_container vc_col-sm-6">
                                            <div class="vc_column-inner vc_custom_1475235191339">
                                                <div class="wpb_wrapper">
                                                    <div class="sc_section sc_section_block " data-animation="animated fadeInLeft normal">
                                                        <div class="sc_section_inner">
                                                            <div class="sc_section_content_wrap">
                                                                <div class="sc_section margin_bottom_tiny- alignleft" style="width:100%;width:100%;">
                                                                    <div class="sc_section_inner">
                                                                        <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">What's Fresh<span></span></h2>
                                                                        <div class="sc_section_content_wrap"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="sc_section margin_bottom_huge section_style_call_section">
                                                                    <div class="sc_section_inner">
                                                                        <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">From Our Family<br />
                                                                            to Yours</h2>
                                                                        <div class="sc_section_descr sc_item_descr">Although any mammal can produce milk, commercial dairy farms are typically one-species enterprises. In developed countries, dairy farms typically consist of high producing dairy cows. Other species used in commercial dairy farming include goats, sheep, and camels. Donkeys in Italy.</div>
                                                                        <div class="sc_section_content_wrap">
                                                                            <a href="farm.php" class="sc_button sc_button_square sc_button_style_border sc_button_size_small">read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-5">
                                            <div class="vc_column-inner vc_custom_1475235352066">
                                                <div class="wpb_wrapper">
                                                    <figure class="sc_image  sc_image_shape_square margin_top_huge" data-animation="animated fadeInRight normal"><img src="images/girl.png" alt="" /></figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-1">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="sc_section sc_section_block margin_top_huge margin_bottom_null aligncenter" data-animation="animated fadeInUp normal">
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
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="sc_section sc_section_block margin_top_huge margin_bottom_huge aligncenter" data-animation="animated fadeInUp normal">
                                                        <div class="sc_section_inner">
                                                            <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">Products<span></span></h2>
                                                            <div class="sc_section_content_wrap">
                                                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_4">
                                                                    <div class="column-1_4 sc_column_item sc_column_item_1 odd first">
                                                                        <figure class="sc_image  sc_image_shape_round">
                                                                            <img src="images/img_milk.jpg" alt="" />
                                                                        </figure>
                                                                        <h4 class="sc_title sc_title_regular cmrg_2">
                                                                            <a href="#">Milk</a>
                                                                        </h4>
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <p>Dairy farming&#8217;s been part of agriculture for thousands of years.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="column-1_4 sc_column_item sc_column_item_2 even">
                                                                        <figure class="sc_image  sc_image_shape_round">
                                                                            <img src="images/img_butter.jpg" alt="" />
                                                                        </figure>
                                                                        <h4 class="sc_title sc_title_regular cmrg_2">
                                                                            <a href="#">Butter</a>
                                                                        </h4>
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <p>Dairy farming&#8217;s been part of agriculture for thousands of years.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="column-1_4 sc_column_item sc_column_item_3 odd">
                                                                        <figure class="sc_image  sc_image_shape_round">
                                                                            <img src="images/ghee.jpg" alt="" />
                                                                        </figure>
                                                                        <h4 class="sc_title sc_title_regular cmrg_2">
                                                                            <a href="#">Ghee</a>
                                                                        </h4>
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <p>Dairy farming&#8217;s been part of agriculture for thousands of years.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="column-1_4 sc_column_item sc_column_item_4 even">
                                                                        <figure class="sc_image  sc_image_shape_round">
                                                                            <img src="images/product-4-300x300.jpg" alt="" />
                                                                        </figure>
                                                                        <h4 class="sc_title sc_title_regular cmrg_2">
                                                                            <a href="#">Panner</a>
                                                                        </h4>
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <p>Dairy farming&#8217;s been part of agriculture for thousands of years.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sc_section_button sc_item_button">
                                                                <a href="shop.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large">view all products</a>
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
                                                                <div id="sc_team_973_wrap" class="sc_team_wrap">
                                                                    <div id="sc_team_973" class="sc_team sc_team_style_team-3 margin_bottom_large">
                                                                        <div class="sc_columns columns_wrap">
                                                                            <div class="column-1_4 column_padding_bottom">
                                                                                <div id="sc_team_973_1" class="sc_team_item sc_team_item_1 odd first">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="" src="images/team-2-370x370.jpg">
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
                                                                                <div id="sc_team_973_1" class="sc_team_item sc_team_item_1 odd first">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="" src="images/team-4-370x370.jpg">
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
                                                                                            <a href="single-team.php">Jose Morrison</a>
                                                                                        </h4>
                                                                                        <div class="sc_team_item_position">A Business Owner</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--<div class="column-1_4 column_padding_bottom">
                                                                                <div id="sc_team_973_2" class="sc_team_item sc_team_item_2 even">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="" src="images/team-4-370x370.jpg">
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
                                                                                        </div>-
                                                                                    </div>
                                                                                    <div class="sc_team_item_info">
                                                                                        <h4 class="sc_team_item_title">
                                                                                            <a href="single-team.php">Jose Morrison</a>
                                                                                        </h4>
                                                                                        <div class="sc_team_item_position">A Business Owner</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>-->
                                                                            <div class="column-1_4 column_padding_bottom">
                                                                                <div id="sc_team_973_3" class="sc_team_item sc_team_item_3 odd">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="" src="images/team-3-370x370.jpg">
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
                                                                                <div id="sc_team_973_4" class="sc_team_item sc_team_item_4 even">
                                                                                    <div class="sc_team_item_avatar">
                                                                                        <img alt="" src="images/team-1-370x370.jpg">
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
        <script type='text/javascript' src='js/vendor/esg/jquery.themepunch.tools.min.js'></script>
        <script type='text/javascript' src='js/vendor/revslider/jquery.themepunch.revolution.min.js'></script>
        <script type='text/javascript' src='js/vendor/revslider/extensions/revolution.extension.actions.min.js'></script>
        <script type='text/javascript' src='js/vendor/revslider/extensions/revolution.extension.layeranimation.min.js'></script>
        <script type='text/javascript' src='js/vendor/revslider/extensions/revolution.extension.navigation.min.js'></script>
        <script type='text/javascript' src='js/vendor/revslider/extensions/revolution.extension.slideanims.min.js'></script>
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
        <script type='text/javascript' src='js/vendor/swiper/swiper.js'></script>

    </body>

</html>
