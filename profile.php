<?php
session_start();
$url=$_SERVER['REQUEST_URI'];
$_SESSION['url']=$url;
require_once "function.php";
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
    <title>Laura Smith &#8211; Dairy Farm</title>
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
    <link rel='stylesheet' href='js/vendor/prettyPhoto/prettyPhoto.css' type='text/css' media='all' />


</head>

<body class="team-template-default single single-team body_style_wide body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">

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
                                <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children"><a href="index.php"><span>Home</span></a>
                                </li>
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
            <div  class="bg_cust_1 top_panel_title_inner top_panel_inner_style_1 title_present_inner breadcrumbs_present_inner">
                <div class="content_wrap">
                    <h1 class="page_title">Laura Smith</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Laura Smith</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="page_content_wrap page_paddings_yes">
            <div class="content_wrap">
                <div class="content">
                    <article class="post_item post_item_single_team post_featured_right post_format_standard team type-team has-post-thumbnail hentry">
                        <section class="post_featured single_team_post_featured">
                            <div class="post_thumb" data-image="images/team-3.jpg" data-title="Laura Smith">
                                <a class="hover_icon hover_icon_view" href="images/team-3.jpg" title="Laura Smith">
                                    <img alt="" src="images/team-3-770x434.jpg">
                                </a>
                            </div>
                            <div class="socials_single_team">
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
                        </section>
                        <section class="single_team_post_description">
                            <h2 class="team_title">Laura Smith</h2>
                            <h6 class="team_position">A Chief Accountant</h6>
                            <div class="team_meta">
                                <p>E-mail: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9cf5f2faf3dce5f3e9eeeff5e8f9b2fff3f1">[email&#160;protected]</a></p>
                                <p>Date Of Birth: 01.01.1986</p>
                            </div>
                            <div class="team_brief_info">
                                <h5 class="team_brief_info_title">Brief info</h5>
                                <div class="team_brief_info_text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porta fringilla ullamcorper. Morbi felis orci, lacinia a velit et, sodales condimentum metus.
                                        Nulla non fermentum nisl. Maecenas id molestie turpis, sit amet feugiat lorem. Curabitur sed erat vel tellus hendrerit tincidunt.
                                        Sed arcu tortor, sollicitudin ac lectus sed, rhoncus iaculis lectus. Ut efficitur feugiat enim a euismod. Mauris suscipit vehicula imperdiet.
                                    </p>
                                </div>
                            </div>
                        </section>
                        <section class="post_content">
                        </section>
                    </article>
                </div>
            </div>
            <section class="related_wrap">
                <div class="content_wrap">
                    <h2 class="section_title">Related Posts</h2>
                    <div class="columns_wrap">
                        <div class="column-1_3 column_padding_bottom">
                            <article class="post_item post_item_related post_item_1">
                                <div class="post_content">
                                    <div class="post_featured">
                                        <div class="post_thumb" data-image="images/team-4.jpg" data-title="Jose Morrison">
                                            <a class="hover_icon hover_icon_link" href="single-team.php">
                                                <img alt="" src="images/team-4.jpg">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="post_content_wrap">
                                        <h5 class="post_title">
                                            <a href="single-team.php">Jose Morrison</a>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="column-1_3 column_padding_bottom">
                            <article class="post_item post_item_related post_item_2">
                                <div class="post_content">
                                    <div class="post_featured">
                                        <div class="post_thumb" data-image="images/team-2.jpg" data-title="Bobby Young">
                                            <a class="hover_icon hover_icon_link" href="single-team.php">
                                                <img alt="" src="images/team-2.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post_content_wrap">
                                        <h5 class="post_title">
                                            <a href="single-team.php">Bobby Young</a>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="column-1_3 column_padding_bottom">
                            <article class="post_item post_item_related post_item_3">
                                <div class="post_content">
                                    <div class="post_featured">
                                        <div class="post_thumb" data-image="images/team-1.jpg" data-title="Tyler Holland">
                                            <a class="hover_icon hover_icon_link" href="single-team.php">
                                                <img alt="" src="images/team-1.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post_content_wrap">
                                        <h5 class="post_title">
                                            <a href="single-team.php">Tyler Holland</a>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content_wrap">
                <div class="content">
                    <section class="comments_wrap">
                        <div class="comments_form_wrap">
                            <h2 class="section_title comments_form_title">Add Comment</h2>
                            <div class="comments_form">
                                <div id="respond" class="comment-respond">
                                    <form action="#" method="post" id="commentform" class="comment-form sc_input_hover_default">
                                        <p class="comments_notes">Your email address will not be published. Required fields are marked *</p>
                                        <div class="comments_field comments_author">
                                            <input id="author" name="author" type="text" placeholder="Name *" value="" size="30" aria-required="true" />
                                        </div>
                                        <div class="comments_field comments_email">
                                            <input id="email" name="email" type="text" placeholder="Email *" value="" size="30" aria-required="true" />
                                        </div>
                                        <div class="comments_field comments_site">
                                            <input id="url" name="url" type="text" placeholder="Website" value="" size="30" aria-required="true" />
                                        </div>
                                        <div class="comments_field comments_message">
                                            <textarea id="comment" name="comment" placeholder="Comment" aria-required="true"></textarea>
                                        </div>
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="send_comment" class="submit" value="Post Comment" />
                                            <input type='hidden' name='comment_post_ID' value='308' id='comment_post_ID' />
                                            <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
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
<script type='text/javascript' src='js/custom/core.reviews.js'></script>
<script type='text/javascript' src='js/custom/core.utils.js'></script>
<script type='text/javascript' src='js/custom/core.init.js'></script>
<script type='text/javascript' src='js/custom/init.js'></script>
<script type='text/javascript' src='js/custom/comment-reply.min.js'></script>
<script type='text/javascript' src='js/custom/core.debug.js'></script>
<script type='text/javascript' src='js/custom/embed.min.js'></script>
<script type='text/javascript' src='js/custom/shortcodes.js'></script>
<script type='text/javascript' src='js/vendor/prettyPhoto/jquery.prettyPhoto.min.js'></script>

</body>

</html>
