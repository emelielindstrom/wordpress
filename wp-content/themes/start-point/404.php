<?php
/**
 *
 *
 * The template for displaying 404 pages (Not Found)
 *
 *
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
                   
                                <div class="post-page">
                                   <div class="post-heading">
                        <h1><?php echo THIS_IS_SOMEWHAT_EMBRASSING; ?></h1>
                    </div>

                    <div class="post-content clear">
                        <p>
                            <?php echo IT_SEEMS_WE_CANT_FIND_TRY_LOOKING; ?>
                        </p>
                        <?php the_widget('WP_Widget_Recent_Posts', array('number' => 10), array('widget_id' => '404')); ?>

                        <div class="widget">
                            <h2 class="widgettitle">
                                <?php echo MOST_USED_CATEGORIES; ?>
                            </h2>
                            <ul>
                                <?php wp_list_categories(array('orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10)); ?>
                            </ul>
                        </div>
                        <?php
                        /* translators: %1$s: smilie */
                        $archive_content = '<p>' . sprintf(TRY_LOOKING_MONTHLY_ARCHIVES, convert_smilies(':)')) . '</p>';
                        the_widget('WP_Widget_Archives', array('count' => 0, 'dropdown' => 1), array('after_title' => '</h2>' . $archive_content));
                        ?>
                        <?php the_widget('WP_Widget_Tag_Cloud'); ?>

                    </div>
                                </div>
                          
                           
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