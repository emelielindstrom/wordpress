<?php
/**
  /**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 *
 */
get_header();
?>
<!-- *** Archive Post Starts *** -->

<!-- ***breadcrum Starts*** -->
<?php startpoint_breadcrum_block() ?>
<!-- ***breadcrum ends*** -->

<div class="blogpost-wrapper">
    <div class="container">
        <div class="row">
            <div class="blogpost-content">
                <div class="col-md-9">
                    <!-- *** Archives loop starts *** -->

                    <?php if (have_posts()): ?>

                        <?php
                        /* Since we called the_post() above, we need to
                         * rewind the loop back to the beginning that way
                         * we can run the loop properly, in full.
                         */
                        rewind_posts();
                        /* Run the loop for the archives page to output the posts.
                         * If you want to overload this in a child theme then include a file
                         * called loop-archives.php and that will be used instead.
                         */
                        get_template_part('loop',
                                'archive');
                        ?>
                        <div class="clearfix"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php next_posts_link(OLDER_POSTS); ?>
                            </span> <span class="nav-next">
                        <?php previous_posts_link(NEWER_POSTS); ?>
                            </span> </nav>
<?php endif; ?>
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