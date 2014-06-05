<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
if ('posts' == get_option('show_on_front') && startpoint_get_option('re_nm') !== 'on') {
    get_template_part('home');
} elseif ('page' == get_option('show_on_front') && startpoint_get_option('re_nm') !== 'on') {
    $template = get_post_meta(get_option('page_on_front'), '_wp_page_template', true);
    $template = ( $template == 'default' ) ? 'index.php' : $template;
    locate_template($template, true);
}else {
?>
<?php get_header(); ?>
<!-- *** Slider Starts *** -->
<div id="page">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <?php if (startpoint_get_option('startpoint_slidevideo1') != '') { ?>
                    <div class="videoWrapper">
                        <?php echo startpoint_get_option('startpoint_slidevideo1'); ?>
                    </div>
                <?php } else { ?>
                    <?php if (startpoint_get_option('startpoint_slideimage1') != '') { ?>
                        <img src="<?php echo startpoint_get_option('startpoint_slideimage1'); ?>" alt="" title="" />
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/slider1.jpg" alt="" title="" />
                        <?php
                    }
                }
                ?>

                <div class="flex-caption"><!-- Slide 1 Text Start -->
                    <div class="container">
                        <div class="text-container">
                            <?php if (startpoint_get_option('startpoint_sliderheading1') != '') { ?>
                                <h3><?php echo startpoint_get_option('startpoint_sliderheading1'); ?></h3>
                            <?php } else { ?>
                                <h3><?php _e('ELEGANT & STYLISH', 'startpoint'); ?></h3>
                            <?php } ?>
                            <div class="clearfix"></div>
                            <?php if (startpoint_get_option('startpoint_sliderdes1') != '') { ?>
                                <h1><?php echo startpoint_get_option('startpoint_sliderdes1'); ?></h1>
                            <?php } else { ?>
                                <h1><?php _e('Showcase an Image In FullWidth.', 'startpoint'); ?></h1>
                            <?php } ?>
                            <?php if (startpoint_get_option('startpoint_Slider_butotntext1') != '') { ?>
                                <p><a href="<?php echo startpoint_get_option('startpoint_Slider_buttonlink1'); ?>"><?php echo startpoint_get_option('startpoint_Slider_butotntext1'); ?></a></p>
                            <?php } else { ?>
                                <p><a href="http://inkthemes.com"><?php _e('Watch Demo', 'startpoint'); ?></a></p>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- ***Slide 1 Text end *** --></div>
            </li>
        </ul>
    </div>
    <!--*** Slider Ends ***-->
    <div class="clearfix"></div>

    <!--*** Three Column Feature Starts ***-->
    <div class="three-column-wrapper" id="section2">
        <div class="container">
            <div class="row">
                <div class="three-column-container">
                    <div class="col-md-4 box1 animated left-to-right">
                        <!-- *** Three column Box 1 *** -->
                        <div class="three-column-box">

                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_font1') != '') { ?>
                                <p><i class="<?php echo startpoint_get_option('startpoint_threecolumn_fet_font1'); ?>"></i></p>
                            <?php } else { ?>
                                <p><i class="fa fa-thumbs-up fa-5x"></i></p>
                            <?php } ?>

                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_title1') != '') { ?>
                                <h1>
                                    <?php if (startpoint_get_option('startpoint_services_title_link1') != '') { ?>
                                        <a href="<?php echo startpoint_get_option('startpoint_services_title_link1'); ?>">
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                        <?php echo startpoint_get_option('startpoint_threecolumn_fet_title1'); ?>
                                        <?php if (startpoint_get_option('startpoint_services_title_link1') != '') { ?>
                                        </a>
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>

                                </h1>
                            <?php } else { ?>
                                <h1><?php _e('Showcase Your Business ', 'startpoint'); ?></h1>
                            <?php } ?>

                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_desc1') != '') { ?>
                                <p><?php echo startpoint_get_option('startpoint_threecolumn_fet_desc1'); ?></p>
                            <?php } else { ?>
                                <p><?php _e('You can showcase your business services to users form 3 Column Feature Area. Go to Theme Option Panel for making the changes.', 'startpoint'); ?></p>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-md-4 box2 animated bottom-to-top">
                        <!-- *** Three column Box 2 *** -->
                        <div class="three-column-box">
                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_font2') != '') { ?>
                                <p><i class="<?php echo startpoint_get_option('startpoint_threecolumn_fet_font2'); ?>"></i></p>
                            <?php } else { ?>
                                <p><i class="fa fa-smile-o fa-5x"></i></p>
                            <?php } ?>

                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_title2') != '') { ?>
                                <h1>
                                    <?php if (startpoint_get_option('startpoint_services_title_link2') != '') { ?>
                                        <a href="<?php echo startpoint_get_option('startpoint_services_title_link2'); ?>">
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                        <?php echo startpoint_get_option('startpoint_threecolumn_fet_title2'); ?>
                                        <?php if (startpoint_get_option('startpoint_services_title_link2') != '') { ?>
                                        </a>
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>

                                </h1>
                            <?php } else { ?>
                                <h1><?php _e('Use Font Awesome Icons', 'startpoint'); ?></h1>
                            <?php } ?>

                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_desc2') != '') { ?>
                                <p><?php echo startpoint_get_option('startpoint_threecolumn_fet_desc2'); ?></p>
                            <?php } else { ?>
                                <p><a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><?php _e('Go to Font Awesome', 'startpoint'); ?></a><?php _e(' and pick the icon of your choice. Copy the class of icon and paste it in Theme Option Panel.', 'startpoint'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4 box3 animated right-to-left">
                        <!-- *** Three column Box 3 *** -->
                        <div class="three-column-box">
                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_font3') != '') { ?>
                                <p><i class="<?php echo startpoint_get_option('startpoint_threecolumn_fet_font3'); ?>"></i></p>
                            <?php } else { ?>
                                <p><i class="fa fa-eye fa-5x"></i></p>
                            <?php } ?>

                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_title3') != '') { ?>
                                <h1>
                                    <?php if (startpoint_get_option('startpoint_services_title_link3') != '') { ?>
                                        <a href="<?php echo startpoint_get_option('startpoint_services_title_link3'); ?>">
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                        <?php echo startpoint_get_option('startpoint_threecolumn_fet_title3'); ?>
                                        <?php if (startpoint_get_option('startpoint_services_title_link3') != '') { ?>
                                        </a>
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>

                                </h1>
                            <?php } else { ?>
                                <h1><?php _e('Elegant One Page Theme', 'startpoint'); ?></h1>
                            <?php } ?>

                            <?php if (startpoint_get_option('startpoint_threecolumn_fet_desc3') != '') { ?>
                                <p><?php echo startpoint_get_option('startpoint_threecolumn_fet_desc3'); ?></p>
                            <?php } else { ?>
                                <p><?php _e('A perfect theme for your business. Aesthetic layout, easy to create website, handy to customize style. Reinvent your website.', 'startpoint'); ?> </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *** Three Column Feature Ends *** -->
    <div class="clearfix"></div>

    <!-- *** Recent Blogs Starts *** -->
    <div class="blog-wrapper" id="section3">
        <div class="container">
            <div class="blog-container">
                <div class="row">
                    <div class="recent-blog-header">
                        <p class="saperator"><img src="<?php echo get_template_directory_uri(); ?>/images/recent-blog-seperator-icon.png"></p>
                        <?php if (startpoint_get_option('startpoint_home_blog_heading') != '') { ?>
                            <h1 class="rbh"><?php echo startpoint_get_option('startpoint_home_blog_heading'); ?></h1>
                        <?php } else { ?>
                            <h1 class="rbh"><?php _e('Latest posts', 'startpoint'); ?></h1>
                        <?php } ?>
                        <?php if (startpoint_get_option('startpoint_home_blog_desc') != '') { ?>
                            <p class="rbh"><?php echo startpoint_get_option('startpoint_home_blog_desc'); ?></p>
                            <?php
                        } else {
                            
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <!-- *** Blog *** -->
                    <?php
                    $limit = get_option('posts_per_page');
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $wp_query->query('showposts=' . $limit . '&paged=' . $paged);
                    $wp_query->is_archive = true;
                    $wp_query->is_home = false;
                    ?>
                    <?php
                    query_posts('showposts=' . $limit . '');
                    if (have_posts()) : while (have_posts()) : the_post();
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="recent-posts-container">
                                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <div class="animated left-to-right">
                                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                                <?php
                                                startpoint_get_thumbnail(326, 279);
                                                ?>
                                            <?php } else { ?>
                                                <?php
                                                startpoint_get_image(326, 279);
                                                ?> 
                                                <?php
                                            }
                                            ?></div>
                                        <h3 class="animated bottom-to-top"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                                        <?php the_excerpt(); ?>
                                        <span>
                                            <p class="rbh-post-meta"><?php
                                                $archive_year = get_the_time('Y');
                                                $archive_month = get_the_time('m');
                                                $archive_day = get_the_time('d');
                                                ?>
                                                <a href="<?php
                                                echo get_day_link($archive_year, $archive_month, $archive_day);
                                                ?>">Posted on : <?php echo get_the_time('m. d. Y') ?></a></p>
                                            <a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/readmore-icon.png" alt="" class="rbh-readmore"></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <div>
                            <p>
                                <?php _e('Sorry no post matched your criteria', 'startpoint'); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <!-- *** Recent Blog loop Ends *** -->

                </div>
            </div>
        </div>
    </div>
    <!-- *** Recent Blogs Ends *** -->
    <div class="clearfix"></div>

    <!-- *** Gallery starts *** -->
    <!-- *** Gallery Available in Pro Version. Download at inkthemes.com -->
    <!-- *** Gallery Ends *** -->

    <!-- *** Testimonial Slider Starts *** -->
    <div class="testimonial-wrapper" id="section5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-inner animated bottom-to-top">
                        <?php if (startpoint_get_option('startpoint_home_testimonial_heading') != '') { ?>
                            <h1 class="testimonial-header"><?php echo startpoint_get_option('startpoint_home_testimonial_heading'); ?></h1>
                        <?php } else { ?>
                            <h1 class="testimonial-header"><?php _e('Show Multiple Testimonials.', 'startpoint'); ?></h1>
                        <?php } ?>
                        <ul class="testmnl">
                            <!-- *Testimonial Starts* -->
                            <?php if (startpoint_get_option('startpoint_testimonial_text1') != '') { ?>
                                <li>
                                    <div class="tstmnl-img">
                                        <img src="<?php if (startpoint_get_option('startpoint_testimonial_image1') != '') { ?><?php
                                            echo startpoint_get_option('startpoint_testimonial_image1');
                                        } else {
                                            echo get_template_directory_uri();
                                            ?>/images/testimonial-image.png<?php } ?>" >
                                    </div>
                                    <div class="tst-caption">
                                        <span>
                                            <a class="arrow"></a>
                                            <?php echo startpoint_get_option('startpoint_testimonial_text1'); ?>
                                            <p>
                                                <?php if (startpoint_get_option('startpoint_testimonial_name1') != '') { ?>
                                                    <a class="testimonial"><?php echo startpoint_get_option('startpoint_testimonial_name1'); ?></a>
                                                <?php } else { ?>
                                                    <a class="testimonial"><?php _e('Inkthemes', 'startpoint'); ?></a>
                                                <?php } ?>
                                            </p>
                                        </span>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <div class="tstmnl-img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-image.png">
                                    </div>
                                    <div class="tst-caption"><span><a class="arrow"></a><?php _e('StartPoint comes with amazing business features. It is perfect for a business website with required features.', 'startpoint'); ?><p><a class="testimonial"><?php _e('Inkthemes', 'startpoint'); ?></a></p></span></div></li>
                            <?php } ?>
                            <!-- *Testimonial Ends* -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *** Testimonial Slider Ends *** -->

    <!-- *** Contact us Section Starts *** -->
    <div class="contact-wrapper" id="section6">
        <!-- Saperator Starts -->
        <div class="recent-blog-header">
            <p class="saperator"><img src="<?php echo get_template_directory_uri(); ?>/images/recent-blog-seperator-icon.png"></p>
        </div>
        <!-- Saperator ends -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-header clearfix">
                        <?php if (startpoint_get_option('startpoint_home_contact_heading') != '') { ?>
                            <h1><?php echo startpoint_get_option('startpoint_home_contact_heading'); ?></h1>
                        <?php } else { ?>
                            <h1><?php _e('CONTACT US', 'startpoint'); ?></h1>
                        <?php } ?>

                        <?php if (startpoint_get_option('startpoint_home_contact_desc') != '') { ?>
                            <p class="chp"><?php echo startpoint_get_option('startpoint_home_contact_desc'); ?></p>
                            <?php
                        } else {
                            
                        }
                        ?>
                    </div>
                    <div class="contact-container clearfix">
                        <?php get_template_part('home-contact'); ?>
                        <!-- social icons starts -->
                        <div class="saperator animated bottom-to-top">

                        </div>
                        <!-- social icons starts Ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <p id="back-top" style="display: block;">
        <a href="#top"><span><i class="fa fa-arrow-up"></i></span></a>
    </p>
</div>
<!-- *** Contact us Section Ends *** -->
<?php get_footer(); } ?>