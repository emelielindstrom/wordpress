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

                    <!-- *** Post1 Starts *** -->
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="post-page">
                                    <h1 class="post-page-head"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                    <ul class="meta">
                                        <li>Posted on:<?php
                                            $archive_year = get_the_time('Y');
                                            $archive_month = get_the_time('m');
                                            $archive_day = get_the_time('d');
                                            ?>
                                            <a href="<?php
                                            echo get_day_link($archive_year,
                                                    $archive_month,
                                                    $archive_day);
                                            ?>"><?php echo get_the_time('m, d, Y') ?></a> </li>
                                        <li>By :&nbsp;<?php the_author_posts_link(); ?>&nbsp;</li>
                                        <li>Categories :&nbsp;<?php the_category(', '); ?>&nbsp;</li>
                                        <li class="comments"><?php comments_popup_link('No Comments.',
                                               'Comment : 1',
                                               'Comments : %'); ?></li>
                                    </ul>
                            <?php the_content(); ?>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <div>
                            <p>
                        <?php _e('Sorry no post matched your criteria',
                                'startpoint'); ?>
                            </p>
                        </div>
<?php endif; ?>
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