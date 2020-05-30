<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
    <?php
    if (isset($_POST["btnLogout"])) {
        setcookie("username", "", time() - 60);
        header("Location: login.php");
    }
    ?>    
    <?php
    if (isset($_COOKIE["username"])) {
        
    } else {
        header('location:login.php');
    }
    ?>
    <head>
        <title>Typography &#8211; Dairy Farm</title>
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
                                    <div class="column-1_5 contact_field contact_cart">
                                        <a href="#" class="top_panel_cart_button" data-items="0" data-summa="&#036;0.00">
                                            <span class="contact_icon icon-1"></span>
                                            <span class="contact_label contact_cart_label">cart:</span>
                                            <span class="contact_cart_totals">
                                                <span class="cart_items">0 Items</span>
                                                <span class="cart_summa">&#8377;0.00</span>
                                            </span>
                                        </a>
                                        <ul class="widget_area sidebar_cart sidebar">
                                            <li>
                                                <div class="widget woocommerce widget_shopping_cart">
                                                    <div class="hide_cart_widget_if_empty">
                                                        <div class="widget_shopping_cart_content">
                                                            <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
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
                            <h1 class="page_title">Typography</h1>
                            <div class="breadcrumbs">
                                <a class="breadcrumbs_item home" href="index.php">Home</a>
                                <span class="breadcrumbs_delimiter"></span>
                                <span class="breadcrumbs_item current">Typography</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page_content_wrap page_paddings_yes">
                    <div class="content_wrap">
                        <div class="content">
                            <article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                                <section class="post_content">
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element vc_custom_1474642897261">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                                            </p>
                                                            <p>
                                                                Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa,
                                                                quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. nemo enim ipsam voluptatem, quia voluptas sit,
                                                                aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est,
                                                                qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt,
                                                                ut labore et dolore magnam aliquam quaerat voluptatem. ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                                                nisi ut aliquid ex ea commodi consequatur? quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse,
                                                                quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h1 class="sc_title sc_title_regular">Heading 1</h1>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h2 class="sc_title sc_title_regular">Heading&nbsp;2</h2>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h3 class="sc_title sc_title_regular">Heading 3</h3>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h4 class="sc_title sc_title_regular">Heading 4</h4>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h5 class="sc_title sc_title_regular">heading 5</h5>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h6 class="sc_title sc_title_regular">heading 6</h6>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                                            </p>
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
                                                    <div class="sc_line sc_line_position_center_center sc_line_style_solid"></div>
                                                    <h2 class="sc_title sc_title_regular">Standard Inline Elements</h2>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                <strong>Bold text</strong> dolor sit amet, consectetur <span class="sc_highlight sc_highlight_style_2">accent color</span> adipisicing elit,
                                                                hovered accents sed do eiusmod tempor hovered ut labore et dolore magna aliqu quis nostrud exercitation ullamco laboris nisllum dolore eu fugiat nulla pariatur.
                                                                Excepteur sint occaecat cupidatat non proident <span class="sc_highlight sc_highlight_style_1">sunt in culpa qui</span> officia deserunt m est laborum.
                                                            </p>
                                                            <p>
                                                                <em>Italic text</em> example iste natus error sit voluptatem italic text example doloremque laudantium, totam rem aperiam,
                                                                eaque ipsa quae ab illo inventore vei&nbsp;<span class="sc_tooltip_parent"> architecto <span class="sc_tooltip">Tooltip Title</span></span> beatae explicabo.
                                                                Nemo enptatem quia oluptas sit aspernatur Tooltip Title aut odit aut fugit, sed quia consequuntur magni dolores eos quiet.
                                                            </p>
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
                                                    <div class="sc_line sc_line_position_center_center sc_line_style_solid"></div>
                                                    <h2 class="sc_title sc_title_regular">Dropcaps</h2>
                                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                        <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                                            <div class="sc_dropcaps sc_dropcaps_style_1">
                                                                <span class="sc_dropcaps_item">D</span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                                                magnal illum magna ullamcorper suscipit Ut wisi enim ad minim veniam, quis nostrud exerci ion ullamcorper suscipit lobortis nisl ut aliquip ex ea.
                                                            </div>
                                                        </div>
                                                        <div class="column-1_2 sc_column_item sc_column_item_2 even">
                                                            <div class="sc_dropcaps sc_dropcaps_style_2">
                                                                <span class="sc_dropcaps_item">D</span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                                                magnal illum magna ullamcorper suscipit Ut wisi enim ad minim veniam, quis nostrud exerci ion ullamcorper suscipit lobortis nisl ut aliquip ex ea.
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
                                                    <div class="sc_line sc_line_position_center_center sc_line_style_solid"></div>
                                                    <h2 class="sc_title sc_title_regular">Blockquote</h2>
                                                    <div class="vc_empty_space h_2-5r">
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <blockquote cite="#" class="sc_quote margin_bottom_null">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris.
                                                            Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.
                                                        </p>
                                                        <p class="sc_quote_title">
                                                            <a href="#">- mark priston</a>
                                                        </p>
                                                    </blockquote>
                                                    <div class="vc_empty_space h_3r">
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="sc_line sc_line_position_center_center sc_line_style_solid"></div>
                                                    <h2 class="sc_title sc_title_regular">Image Alignment</h2>
                                                    <div class="wpb_text_column wpb_content_element vc_custom_1474880840987">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempus congue lorem,
                                                                id commodo elit consectetur blandit. Donec laoreet convallis risus, at luctus sapien pellentesque id.
                                                                Nullam aliquet libero ut elit dapibus, sit amet fringilla sapien mollis.
                                                                Sed consequat urna vestibulum elit porttitor, ut congue eros maximus.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <figure class="sc_image  alignleft sc_image_shape_square mb2 margin_top_null">
                                                        <img src="images/layer-43.jpg" alt="" />
                                                        <figcaption><span></span> Title of Image</figcaption>
                                                    </figure>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit.
                                                            </p>
                                                            <p>
                                                                Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa,
                                                                quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. nemo enim ipsam voluptatem, quia voluptas sit, aspernatur.
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="wpb_text_column wpb_content_element vc_custom_1474880997793">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempus congue lorem, id commodo elit consectetur blandit. Donec laoreet convallis risus,
                                                                at luctus sapien pellentesque id. Nullam aliquet libero ut elit dapibus, sit amet fringilla sapien mollis. Sed consequat urna vestibulum elit porttitor, ut congue eros maximus.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <figure class="sc_image  alignright sc_image_shape_square mb2 margin_top_null">
                                                        <img src="images/layer-42.jpg" alt="" />
                                                    </figure>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit
                                                                in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatumi.
                                                            </p>
                                                            <p>
                                                                Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis
                                                                et quasi architecto beatae vitae dicta sunt, explicabo. nemo enim ipsam voluptatem, quia voluptas sit.
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempus congue lorem, id commodo elit consectetur blandit. Donec laoreet convallis risus,
                                                                at luctus sapien pellentesque id. Nullam aliquet libero ut elit dapibus, sit amet fringilla sapien mollis. Sed consequat urna vestibulum elit porttitor, ut congue eros maximus.
                                                            </p>
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
                                                    <div class="sc_line sc_line_position_center_center sc_line_style_solid"></div>
                                                    <h2 class="sc_title sc_title_regular">Lists</h2>
                                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_3 columns_lists ">
                                                        <div class="column-1_3 sc_column_item sc_column_item_1 odd first">
                                                            <ul class="sc_list sc_list_style_ul">
                                                                <li class="sc_list_item odd first" title="Ut wisi enim ad minim">Ut wisi enim ad minim</li>
                                                                <li class="sc_list_item even" title="Veniam quis nostrud">Veniam quis nostrud</li>
                                                                <li class="sc_list_item odd" title="Exerci tation ullamcorper">Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item even" title="Exerci tation ullamcorper">Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item odd" title="Exerci tation ullamcorper">Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item even" title="Duis autem vel eum">Duis autem vel eum</li>
                                                            </ul>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item sc_column_item_2 even">
                                                            <ul class="sc_list sc_list_style_iconed">
                                                                <li class="sc_list_item odd first" title="Ut wisi enim ad minim"><span class="sc_list_icon icon-ok"></span>Ut wisi enim ad minim</li>
                                                                <li class="sc_list_item even" title="Veniam quis nostrud"><span class="sc_list_icon icon-ok"></span>Veniam quis nostrud</li>
                                                                <li class="sc_list_item odd" title="Exerci tation ullamcorper"><span class="sc_list_icon icon-ok"></span>Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item even" title="Exerci tation ullamcorper"><span class="sc_list_icon icon-ok"></span>Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item odd" title="Exerci tation ullamcorper"><span class="sc_list_icon icon-ok"></span>Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item even" title="Duis autem vel eum"><span class="sc_list_icon icon-ok"></span>Duis autem vel eum</li>
                                                            </ul>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item sc_column_item_3 odd">
                                                            <ol class="sc_list sc_list_style_ol">
                                                                <li class="sc_list_item odd first" title="Ut wisi enim ad minim">Ut wisi enim ad minim</li>
                                                                <li class="sc_list_item even" title="Veniam quis nostrud">Veniam quis nostrud</li>
                                                                <li class="sc_list_item odd" title="Exerci tation ullamcorper">Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item even" title="Exerci tation ullamcorper">Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item odd" title="Exerci tation ullamcorper">Exerci tation ullamcorper</li>
                                                                <li class="sc_list_item even" title="Duis autem vel eum">Duis autem vel eum</li>
                                                            </ol>
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
                                                    <div class="sc_line sc_line_position_center_center sc_line_style_solid"></div>
                                                    <div class="sc_section">
                                                        <div class="sc_section_inner">
                                                            <div class="sc_section_content_wrap">
                                                                <h2 class="sc_title sc_title_regular">Table</h2>
                                                                <div class="sc_table margin_bottom_tiny-">
                                                                    </p>
                                                                    <table>
                                                                        <tbody>
                                                                            <tr align="center">
                                                                                <td>#</td>
                                                                                <td>Column 1</td>
                                                                                <td>Column 2</td>
                                                                                <td>Column 3</td>
                                                                                <td>Column 4</td>
                                                                            </tr>
                                                                            <tr align="center">
                                                                                <td>1</td>
                                                                                <td>Row 1 cell1</td>
                                                                                <td>Row 1 cell2</td>
                                                                                <td>Row 1 cell3</td>
                                                                                <td>Row 1 cell4</td>
                                                                            </tr>
                                                                            <tr align="center">
                                                                                <td>2</td>
                                                                                <td>Row 2 cell1</td>
                                                                                <td>Row 2 cell2</td>
                                                                                <td>Row 2 cell3</td>
                                                                                <td>Row 2 cell4</td>
                                                                            </tr>
                                                                            <tr align="center">
                                                                                <td>3</td>
                                                                                <td>Row 3 cell1</td>
                                                                                <td>Row 3 cell2</td>
                                                                                <td>Row 3 cell3</td>
                                                                                <td>Row 3 cell4</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <p>
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
                                                    <div class="sc_line sc_line_position_center_center sc_line_style_solid"></div>
                                                    <h2 class="sc_title sc_title_regular">Inputs &amp;&nbsp;Buttons</h2>
                                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                        <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                                            <div id="sc_form_104_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_104" class="sc_form sc_form_style_form_custom">
                                                                    <form id="sc_form_104_form" class="sc_input_hover_default" data-formtype="form_custom" method="post" action="#">
                                                                        <div class="sc_form_item sc_form_item_text sc_form_field label_top margin_bottom_medium">
                                                                            <label for="sc_form_104_1">Input Heading</label>
                                                                            <input type="text" id="sc_form_104_1" name="Input Heading" value="Input field example">
                                                                        </div>
                                                                        <div class="result sc_infobox"></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_2 sc_column_item sc_column_item_2 even">
                                                            <div id="sc_form_048_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_048" class="sc_form sc_form_style_form_custom">
                                                                    <form id="sc_form_048_form" class="sc_input_hover_default" data-formtype="form_custom" method="post" action="#">
                                                                        <div class="sc_form_item sc_form_item_select sc_form_field label_top margin_bottom_medium">
                                                                            <label for="sc_form_048_1">Dropdown Heading</label>
                                                                            <div class="sc_form_select_container">
                                                                                <select id="sc_form_048_1" name="Dropdown Heading">
                                                                                    <option value="option1">Dropdown input field example</option>
                                                                                    <option value="option2">option2</option>
                                                                                    <option value="option3">option3</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="result sc_infobox"></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_2 sc_column_item sc_column_item_3 odd">
                                                            <div id="sc_form_162_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_162" class="sc_form sc_form_style_form_custom">
                                                                    <form id="sc_form_162_form" class="sc_input_hover_default" data-formtype="form_custom" method="post" action="#">
                                                                        <div class="sc_form_item sc_form_item_text sc_form_field label_top hovered margin_bottom_medium">
                                                                            <label for="sc_form_162_1">Hovered Input</label>
                                                                            <input type="text" id="sc_form_162_1" name="Hovered Input" value="Hovered field example">
                                                                        </div>
                                                                        <div class="result sc_infobox"></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_2 sc_column_item sc_column_item_4 even">
                                                            <div id="sc_form_365_wrap" class="sc_form_wrap">
                                                                <div id="sc_form_365" class="sc_form sc_form_style_form_custom">
                                                                    <form id="sc_form_365_form" class="sc_input_hover_default" data-formtype="form_custom" method="post" action="#">
                                                                        <div class="sc_form_item sc_form_item_text sc_form_field label_top focuses margin_bottom_medium">
                                                                            <label for="sc_form_365_1">Focuses Input</label>
                                                                            <input type="text" id="sc_form_365_1" name="Focuses Input" value="Focuses field example">
                                                                        </div>
                                                                        <div class="result sc_infobox"></div>
                                                                    </form>
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
                                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_1">
                                                        <div class="column-1_1 sc_column_item sc_column_item_1 odd first">
                                                            <a href="#" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large margin_top_small margin_right_huge">Big Button</a>
                                                        </div>
                                                        <div class="column-1_1 sc_column_item sc_column_item_2 even">
                                                            <a href="#" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small">Small Button</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="related_wrap related_wrap_empty"></section>
                            </article>
                        </div>
                        <div class="sidebar widget_area scheme_original" role="complementary">
                            <div class="sidebar_inner widget_area_inner">
                                <aside class="widget widget_categories">
                                    <h4 class="widget_title">Categories</h4>
                                    <ul>
                                        <li class="cat-item">
                                            <a href="#">Dairy Herd Management</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="#">Farm Life &amp; Habitants</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="#">The Industry&#039;s Input</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="#">Unhealthy Myths</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="#">World Dairy Markets</a>
                                        </li>
                                    </ul>
                                </aside>
                                <aside class="widget widget_search">
                                    <h4 class="widget_title">Search</h4>
                                    <form role="search" method="get" class="search_form" action="index.php">
                                        <input type="text" class="search_field" placeholder="Keyword" value="" name="s" title="Search for:" />
                                        <button type="submit" class="search_button icon-search" href="#"></button>
                                    </form>
                                </aside>
                                <aside class="widget widget_archive">
                                    <h4 class="widget_title">Archives</h4>
                                    <ul>
                                        <li><a href='http://dairy-farm.ancorathemes.com/2016/09/'>September 2016</a></li>
                                        <li><a href='http://dairy-farm.ancorathemes.com/2016/08/'>August 2016</a></li>
                                        <li><a href='http://dairy-farm.ancorathemes.com/2016/07/'>July 2016</a></li>
                                        <li><a href='http://dairy-farm.ancorathemes.com/2016/06/'>June 2016</a></li>
                                        <li><a href='http://dairy-farm.ancorathemes.com/2016/05/'>May 2016</a></li>
                                    </ul>
                                </aside>
                                <aside class="widget widget_calendar">
                                    <h4 class="widget_title">Calendar</h4>
                                    <div id="calendar_wrap" class="calendar_wrap">
                                        <table class="wp-calendar">
                                            <thead>
                                                <tr>
                                                    <th class="month_prev">
                                                        <a href="#" data-type="post" data-year="2016" data-month="09" data-letter="1" title="View posts for September 2016"></a>
                                                    </th>
                                                    <th class="month_cur" colspan="5">October <span>2017</span></th>
                                                    <th class="month_next">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <th class="weekday" scope="col" title="Monday">M</th>
                                                    <th class="weekday" scope="col" title="Tuesday">T</th>
                                                    <th class="weekday" scope="col" title="Wednesday">W</th>
                                                    <th class="weekday" scope="col" title="Thursday">T</th>
                                                    <th class="weekday" scope="col" title="Friday">F</th>
                                                    <th class="weekday" scope="col" title="Saturday">S</th>
                                                    <th class="weekday" scope="col" title="Sunday">S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" class="pad"><span class="day_wrap">&nbsp;</span></td>
                                                    <td class="day"><span class="day_wrap">1</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="today"><span class="day_wrap">2</span></td>
                                                    <td class="day"><span class="day_wrap">3</span></td>
                                                    <td class="day"><span class="day_wrap">4</span></td>
                                                    <td class="day"><span class="day_wrap">5</span></td>
                                                    <td class="day"><span class="day_wrap">6</span></td>
                                                    <td class="day"><span class="day_wrap">7</span></td>
                                                    <td class="day"><span class="day_wrap">8</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="day"><span class="day_wrap">9</span></td>
                                                    <td class="day"><span class="day_wrap">10</span></td>
                                                    <td class="day"><span class="day_wrap">11</span></td>
                                                    <td class="day"><span class="day_wrap">12</span></td>
                                                    <td class="day"><span class="day_wrap">13</span></td>
                                                    <td class="day"><span class="day_wrap">14</span></td>
                                                    <td class="day"><span class="day_wrap">15</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="day"><span class="day_wrap">16</span></td>
                                                    <td class="day"><span class="day_wrap">17</span></td>
                                                    <td class="day"><span class="day_wrap">18</span></td>
                                                    <td class="day"><span class="day_wrap">19</span></td>
                                                    <td class="day"><span class="day_wrap">20</span></td>
                                                    <td class="day"><span class="day_wrap">21</span></td>
                                                    <td class="day"><span class="day_wrap">22</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="day"><span class="day_wrap">23</span></td>
                                                    <td class="day"><span class="day_wrap">24</span></td>
                                                    <td class="day"><span class="day_wrap">25</span></td>
                                                    <td class="day"><span class="day_wrap">26</span></td>
                                                    <td class="day"><span class="day_wrap">27</span></td>
                                                    <td class="day"><span class="day_wrap">28</span></td>
                                                    <td class="day"><span class="day_wrap">29</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="day"><span class="day_wrap">30</span></td>
                                                    <td class="day"><span class="day_wrap">31</span></td>
                                                    <td class="pad" colspan="5"><span class="day_wrap">&nbsp;</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </aside>
                                <aside class="widget widget_recent_entries">
                                    <h4 class="widget_title">Recent Posts</h4>
                                    <ul>
                                        <li>
                                            <a href="single-post.php">Dairy Nutrition and Profitability Optimization</a>
                                        </li>
                                        <li>
                                            <a href="single-post.php">Milk and Cheese Against Allergies</a>
                                        </li>
                                        <li>
                                            <a href="single-post.php">The Butter Business Growth</a>
                                        </li>
                                    </ul>
                                </aside>
                                <aside class="widget widget_tag_cloud">
                                    <h4 class="widget_title">Tags</h4>
                                    <div class="tagcloud">
                                        <a href="#" aria-label="agriculture (6 items)">agriculture</a>
                                        <a href="#" aria-label="cheese (5 items)">cheese</a>
                                        <a href="#" aria-label="dairy (6 items)">dairy</a>
                                        <a href="#" aria-label="milk (4 items)">milk</a>
                                        <a href="#" aria-label="natural (4 items)">natural</a>
                                        <a href="#" aria-label="organic (5 items)">organic</a></div>
                                </aside>
                                <aside class="widget widget_meta">
                                    <h4 class="widget_title">Meta</h4>
                                    <ul>
                                        <li><a href="#">Log in</a></li>
                                        <li><a href="#">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
                                        <li><a href="#">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="call_wrap">
                    <div class="call_wrap_inner">
                        <div class="content_wrap">
                            <h2 class="call-title">Where to Buy</h2>
                            <div class="call-text">Our Products are currently available at select retailers in Connecticut and New York..</div>
                            <a class="sc_button sc_button_size_large sc_button_style_border" href="#">Store Locator</a>
                        </div>
                    </div>
                </footer>
                <footer class="footer_wrap widget_area scheme_original">
                    <div class="footer_wrap_inner widget_area_inner">
                        <div class="content_wrap">
                            <div class="columns_wrap">
                                <aside class="column-1_4 widget widget_nav_menu">
                                    <h4 class="widget_title">On the Farm</h4>
                                    <div class="menu-footer-menu-1-container">
                                        <ul id="menu-footer-menu-1" class="menu">
                                            <li class="menu-item"><a href="farm.php">Meet Our Farmers</a></li>
                                            <li class="menu-item"><a href="recipes.php">Meet the Cows</a></li>
                                            <li class="menu-item"><a href="cobbles.php">Famous Dairy Facts</a></li>
                                            <li class="menu-item"><a href="grid.php">From the Farm to the Fridge</a></li>
                                            <li class="menu-item"><a href="contacts.php">Dairy Farm Map</a></li>
                                            <li class="menu-item"><a href="classic.php">Farm Practices</a></li>
                                        </ul>
                                    </div>
                                </aside>
                                <aside class="column-1_4 widget widget_nav_menu">
                                    <h4 class="widget_title">In the Kitchen</h4>
                                    <div class="menu-footer-menu-2-container">
                                        <ul id="menu-footer-menu-2" class="menu">
                                            <li class="menu-item"><a href="recipes.php">Recipes</a></li>
                                            <li class="menu-item"><a href="masonry-2-columns.php">Lactose Intolerance</a></li>
                                            <li class="menu-item"><a href="shop.php">Milk Imitators</a></li>
                                            <li class="menu-item"><a href="portfolio-3-columns.php">Organic Milk</a></li>
                                            <li class="menu-item"><a href="portfolio-2-columns.php">Flavored Milk</a></li>
                                            <li class="menu-item"><a href="contacts.php">Ask Our Dietitian</a></li>
                                        </ul>
                                    </div>
                                </aside>
                                <aside class="column-1_4 widget widget_nav_menu">
                                    <h4 class="widget_title">In the News</h4>
                                    <div class="menu-footer-menu-3-container">
                                        <ul id="menu-footer-menu-3" class="menu">
                                            <li class="menu-item"><a href="masonry-3-columns.php">Local Milk Blog</a></li>
                                            <li class="menu-item"><a href="classic.php">Contests/Sweepstakes</a></li>
                                            <li class="menu-item"><a href="cobbles.php">Videos</a></li>
                                            <li class="menu-item"><a href="about-1.php">News Releases</a></li>
                                            <li class="menu-item"><a href="about-2.php">Newsletters</a></li>
                                        </ul>
                                    </div>
                                </aside>
                                <aside class="column-1_4 widget widget_nav_menu">
                                    <h4 class="widget_title">About Us</h4>
                                    <div class="menu-footer-menu-4-container">
                                        <ul id="menu-footer-menu-4" class="menu">
                                            <li class="menu-item"><a href="contacts.php">FAQ</a></li>
                                            <li class="menu-item"><a href="farm.php">Our Board</a></li>
                                            <li class="menu-item"><a href="about-2.php">Our Staff</a></li>
                                            <li class="menu-item"><a href="contacts.php">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </aside>
                                <aside class="column-1_4 widget widget_socials">
                                    <div class="widget_inner">
                                        <div class="logo">
                                            <a href="index.php">
                                                <img src="images/footer-logo.png" class="logo_main" alt="" width="74" height="74">
                                            </a>
                                        </div>
                                    </div>

                                </aside>
                                <aside class="column-1_4 widget widget_text">
                                    <div class="textwidget">888 Broadway, New York, NY, 18813
                                        <br>
                                        <span class="accent1">Phone: 123-456-7890</span>
                                        <br> Fax: 123-456-7890
                                        <br> Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b6dfd8d0d9f6cfd9c3c4c5dfc2d398d5d9db">[email&#160;protected]</a>
                                    </div>
                                </aside>
                                <aside class="column-1_4 widget widget_text">
                                    <div class="textwidget"></div>
                                </aside>
                                <aside class="column-1_4 widget widget_socials">
                                    <div class="widget_inner">
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
                                            <div class="sc_socials_item">
                                                <a href="#" target="_blank" class="social_icons social_linkedin">
                                                    <span class="icon-linkedin"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </footer>
                <div class="copyright_wrap copyright_style_menu  scheme_original">
                    <div class="copyright_wrap_inner">
                        <div class="content_wrap">
                            <ul id="menu_footer" class="menu_footer_nav">
                                <li class="menu-item"><a href="farm.php"><span>FAQ</span></a></li>
                                <li class="menu-item"><a href="classic.php"><span>News</span></a></li>
                                <li class="menu-item"><a href="contacts.php"><span>Contact Us</span></a></li>
                            </ul>
                            <div class="copyright_text">
                                <p>Dudhwala.com © 2016 All Rights Reserved
                                    <a href="index.php">Terms of Use</a> and
                                    <a href="index.php">Privacy Policy</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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
