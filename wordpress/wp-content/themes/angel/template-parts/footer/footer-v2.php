<?php
/**
 * Template part for displaying Footer Version.
 *
 * @package angel
 */

?>

<div class="footer-top-shape">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M4.4408921e-15,8.16369858 C2.13175456,3.16793204 4.70743815,0.670048765 7.72705078,0.670048765 C18.4671021,0.670048765 22.2784424,43.4806415 34.4662476,43.4806415 C47.1838379,43.4806415 47.9907032,25.7087262 58.7713972,25.7087262 C72.0083967,25.7087262 77.9150391,94.4423992 100,94.4423992 L100,100.670049 L0,100.670049 L4.4408921e-15,8.16369858 Z" fill="rgba(117, 49, 161, 1)" opacity="1"></path><path d="M4.4408921e-15,8.16369858 C2.13175456,3.16793204 4.70743815,0.670048765 7.72705078,0.670048765 C18.4671021,0.670048765 22.2784424,43.4806415 34.4662476,43.4806415 C47.1838379,43.4806415 47.9907032,22.2514492 58.7713972,22.2514492 C72.0083967,22.2514492 77.9150391,87.7804472 100,87.7804472 L100,100.670049 L0,100.670049 L4.4408921e-15,8.16369858 Z" fill="rgba(117, 49, 161, 0.3)" opacity="0.3"></path><path d="M4.4408921e-15,8.16369858 C2.13175456,3.16793204 4.70743815,0.670048765 7.72705078,0.670048765 C18.4671021,0.670048765 22.2784424,40.9095743 34.4662476,40.9095743 C47.1838379,40.9095743 47.9907032,18.4662671 58.7713972,18.4662671 C72.0083967,18.4662671 77.9150391,79.1277087 100,79.1277087 L100,100.670049 L0,100.670049 L4.4408921e-15,8.16369858 Z" fill="rgba(117, 49, 161, 0.3)" opacity="0.3"></path></svg>
    </div>
    <!-- FOOTER -->
    <footer class="footer footer_style-2" style="<?php if (!get_theme_mod('footer_background_color_setting')): ?> background-image: url('<?php echo get_theme_mod('footer_background'); ?>'); <?php endif?> ">
      
      <!-- FOOTER INFO -->
      <div class="clearfix footerInfo footer_bg_color">
        <div class="container">
          <div class="row newsletter-content">
            <div class="col-md-10">
                <div class="news-letter">
                  <?php echo do_shortcode( '[contact-form-7 id="754" title="Newsletter"]' ); ?>
                </div>
            </div>
          </div>

          <div class="row widgets-area">
        
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
        <!-- BACK TO TOP BUTTON -->
        <div class="page-to-top">
          <a href="#pageTop" class="backToTop"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        </div>
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