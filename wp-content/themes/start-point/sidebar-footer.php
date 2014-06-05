<!-- *** Footer Starts *** -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-first footer-columns">
                    <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
                        <?php dynamic_sidebar('first-footer-widget-area'); ?>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-second footer-columns">
                    <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
                        <?php dynamic_sidebar('second-footer-widget-area'); ?>
                    <?php else : ?> 
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-third footer-columns">
                    <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
                        <?php dynamic_sidebar('third-footer-widget-area'); ?>
                    <?php else : ?>
                    <?php endif; ?>					
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-fourth footer-columns">
                    <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
                        <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- *** Footer Ends *** -->