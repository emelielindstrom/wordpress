<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
                    <?php
                    get_template_part('loop', 'index');
                    ?> 

                    <!-- *** Post loop ends*** -->
                    <div class="clearfix"></div>
                    <nav id="nav-single"> <span class="nav-previous">
                            <?php
                            next_posts_link(__('&larr; Older posts', 'startpoint'));
                            ?>
                        </span> <span class="nav-next">
                            <?php
                            previous_posts_link(__('Newer posts &rarr;', 'startpoint'));
                            ?>
                        </span> </nav>
                    <div class="clearfix"></div>
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