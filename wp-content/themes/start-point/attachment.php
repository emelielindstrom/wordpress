<?php
/*
 *The template for displaying attachments.
 */

get_header();
?>


<!-- *** Single Post Starts *** -->

<!-- ***breadcrum Starts*** -->
<div class="breadcrum-wrapper" <?php if (startpoint_get_option('startpoint_headbg') != '') { ?>
 style="background: url(<?php echo startpoint_get_option('startpoint_headbg'); ?>) no-repeat center;"
 <?php } else {} ?>>
	<div class="container">
		<div class="row">
			<div class="breadcrum-inner">
				<div class="col-md-12">
					<div class="breadcrum clearfix">
						<h4><a href="<?php echo esc_url( home_url( '/' ) ) ?>"><?php echo HOME ?></a> &#187; Attachment &#187; <?php the_title(); ?></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ***breadcrum ends*** -->
<div class="blogpost-wrapper">
	<div class="container">
		<div class="row">
			<div class="blogpost-content">
				<div class="col-md-9">
				<!-- *** Post loop starts *** -->

                <div class="post-page">
					<h1 class="post-page-head"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php if (have_posts())
        while (have_posts()) : the_post(); ?>
  <p class="att-back-to-image"><a href="<?php echo get_permalink($post->post_parent); ?>" title="<?php esc_attr(printf(RETURN_TO_PREVIOUS, get_the_title($post->post_parent))); ?>" rel="gallery">
    <?php
                    /* translators: %s - title of parent post */
                    printf(__('<span>&larr;</span> %s', 'startpoint'), get_the_title($post->post_parent));
                    ?>
    </a></p>
  <p class="att-meta"><?php
            printf(BY_AUTHOR, 'meta-prep meta-prep-author', sprintf('<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url(get_the_author_meta('ID')), sprintf(VIEW_ALL_POSTS_BY_AUTHOR, get_the_author()), get_the_author()
                    )
            );
            ?>
  <span>|</span>
  <?php
            printf(PUBLISHED_BY, 'meta-prep meta-prep-entry-date', sprintf('<abbr title="%1$s">%2$s</abbr>', esc_attr(get_the_time()), get_the_date()
                    )
            );
            if (wp_attachment_is_image()) {
                echo ' | ';
                $metadata = wp_get_attachment_metadata();
                printf(FULL_SIZE_IS, sprintf('<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>', wp_get_attachment_url(), (LINK_TO_FULL_SIZE), $metadata['width'], $metadata['height']
                        )
                );
            }
            ?>
  <?php edit_post_link(EDIT, '', ''); ?>
  <!-- .entry-meta -->
  </p>
  <?php
            if (wp_attachment_is_image()) :
                $attachments = array_values(get_children(array('post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID')));
                foreach ($attachments as $k => $attachment) {
                    if ($attachment->ID == $post->ID)
                        break;
                }
                $k++;
                // If there is more than 1 image attachment in a gallery
                if (count($attachments) > 1) {
                    if (isset($attachments[$k]))
                    // get the URL of the next image attachment
                        $next_attachment_url = get_attachment_link($attachments[$k]->ID);
                    else
                    // or get the URL of the first image attachment
                        $next_attachment_url = get_attachment_link($attachments[0]->ID);
                } else {
                    // or, if there's only 1 image attachment, get the URL of the image
                    $next_attachment_url = wp_get_attachment_url();
                }
                ?>
  <p class="att-img"><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment">
    <?php
                        $attachment_size = apply_filters('twentyten_attachment_size', 900);
                        echo wp_get_attachment_image($post->ID, array($attachment_size, 9999)); // filterable image width with, essentially, no limit for image height.
                        ?>
    </a></p>
  <?php previous_image_link(false); ?>
  <?php next_image_link(false); ?>
  <?php else : ?>
  <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment"><?php echo basename(get_permalink()); ?></a>
  <?php endif; ?>
  <?php if (!empty($post->post_excerpt))
                the_excerpt(); ?>
  <?php the_content(CONTINUE_READING); ?>
  <?php wp_link_pages(array('before' => '' . PAGES_COLON, 'after' => '')); ?>
  <?php startpoint_posted_in(); ?>
  <?php edit_post_link(EDIT, ' ', ''); ?>
  
				</div>

                <!-- *** Post loop ends*** -->
				<div class="clearfix"></div>
				<?php comments_template(); ?>
				<?php endwhile; ?>
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