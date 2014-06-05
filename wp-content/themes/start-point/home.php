<?php
get_header();
?>
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
                    <nav id="nav-single"> 
                        <span class="nav-previous">
                            <?php
                            next_posts_link(__('&larr; Older posts', 'startpoint'));
                            ?>
                        </span> 
                        <span class="nav-next">
                            <?php
                            previous_posts_link(__('Newer posts &rarr;', 'startpoint'));
                            ?>
                        </span> 
                    </nav>
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