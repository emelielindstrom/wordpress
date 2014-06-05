<?php
/**
 * The template for displaying Author pages.
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
                    <div class="post-page">
                        <?php if (have_posts()) : the_post(); ?>
                            <h4><?php printf(AUTHOR_ARCHIVES,
                                "<a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a>"); ?></h4>
                            <?php
                            // If a user has filled out their description, show a bio on their entries.
                            if (get_the_author_meta('description')) :
                                ?>
        <?php echo get_avatar(get_the_author_meta('user_email'),
                apply_filters('twentyten_author_bio_avatar_size',
                        60)); ?>
                                <h5 class="auth-title"><?php printf(ABOUT_AUTHOR,
                                get_the_author()); ?></h5>
                                <p class="auth-desc"><?php the_author_meta('description'); ?></p>
                        <?php endif; ?>
                        </div>
                        <?php
                        /* Since we called the_post() above, we need to
                         * rewind the loop back to the beginning that way
                         * we can run the loop properly, in full.
                         */
                        rewind_posts();
                        /* Run the loop for the author archive page to output the authors posts
                         * If you want to overload this in a child theme then include a file
                         * called loop-author.php and that will be used instead.
                         */
                        get_template_part('loop',
                                'author');
                        ?>
                            <?php endif; ?>

                    <!-- *** Post loop ends*** -->
                    <div class="clearfix"></div>
                    <nav id="nav-single"> <span class="nav-previous">
<?php next_posts_link(OLDER_POSTS); ?>
                        </span> <span class="nav-next">
<?php previous_posts_link(NEWER_POSTS); ?>
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