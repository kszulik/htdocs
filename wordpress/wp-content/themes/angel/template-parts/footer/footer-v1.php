<?php
/**
 * Template part for displaying Footer Version.
 *
 * @package angel
 */

?>

    <!-- FOOTER -->
    <footer class="footer" style="<?php if (!get_theme_mod('footer_background_color_setting')): ?> background-image: url('<?php echo get_theme_mod('footer_background'); ?>'); <?php endif?> ">
      <!-- BACK TO TOP BUTTON -->
      <a href="#pageTop" class="backToTop"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
      <!-- FOOTER INFO -->
      <div class="clearfix footerInfo footer_bg_color">
        <div class="container">
          <div class="row">
            <?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
              <div class="footer-widget widget-area">
                <?php dynamic_sidebar( 'footer_widgets' ); ?>
              </div><!-- #primary-sidebar -->
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- COPY RIGHT -->
      <div class="clearfix copyRight">
        <div class="container">
          <div class="row">
            <div class="col-sm-5 col-sm-push-7 col-xs-12">
              <?php theme_slug_show_social_icons();?>  
            </div>
            <div class="col-sm-7 col-sm-pull-5 col-xs-12">
              <div class="copyRightText">
                <p><?php echo get_theme_mod( 'footer_copyright_text' );?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>