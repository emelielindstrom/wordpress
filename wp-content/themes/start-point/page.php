<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 */
get_header();
?>
<!-- *** Single Post Starts *** -->

<!-- ***breadcrum Starts*** -->
<?php startpoint_breadcrum_block() ?>
<!-- ***breadcrum ends*** -->

<div class="blogpost-wrapper">
    <div class="container">
        <div class="row">
            <div class="blogpost-content">
                <div class="col-md-9">
                    <!-- *** Post loop starts *** -->

                    <!-- *** Post1 Starts *** -->
                    <?php if (have_posts()) while (have_posts()) : the_post(); ?> 
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="post-page">
                                    <h1 class="post-page-head"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <div class="clearfix"></div>

                    <!-- *** Post1 Starts Ends *** -->
                    <!-- *** Post loop ends*** -->
                    <div class="clearfix"></div>
                    <!-- ***Comment Template *** -->
                    <?php comments_template(); ?>
                    <!-- ***Comment Template *** -->
                </div>
                <div class="col-md-3">
                    <!-- *** Sidebar Starts *** -->
                    <?php get_sidebar(); ?>
                    <!-- *** Sidebar Ends *** -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>