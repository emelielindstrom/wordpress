<!-- *** Post1 Starts *** -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-page">
                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <?php startpoint_get_thumbnail(798,
                            398);
                    ?>
                <?php } else { ?>
                    <?php startpoint_get_image(798,
                            398);
                    ?> 
                    <?php
                }
                ?>
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
                        ?>"><?php echo get_the_time('m, d, Y') ?></a></li>
                    <li>By:&nbsp;<?php the_author_posts_link(); ?></li>
                    <li>Categories:&nbsp;<?php the_category(', '); ?></li>
                    <li class="comments"><?php comments_popup_link('No Comments.',
                                'Comment: 1',
                                'Comments: %'); ?></li>
                </ul>
        <?php the_excerpt(); ?>
                <a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/readmore-icon.png" alt="" class="rbh-readmore"></a>
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