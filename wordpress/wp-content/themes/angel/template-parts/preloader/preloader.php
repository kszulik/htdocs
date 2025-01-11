
<?php
/**
 * Template part for displaying Preloader.
 *
 * @package angel
 */

?>
<?php
$preloader = get_theme_mod( 'enable_site_preloader_for_home_page' );
 if ( 'all' === $preloader ) { ?> 
    <div id="preloader" class="smooth-loader-wrapper">
      <div class="loader">
        <img src="<?php echo esc_url( get_theme_mod( 'angel_preloader_image_setting', get_template_directory_uri() . '/assets/images/angel-default-preloader.gif' ) ) ; ?>" data-no-lazy="1" alt="<?php echo 'Loading...' ?>">
      </div>
    </div>

  <?php } else{ ?>
    <?php if ( is_front_page() ) :?>
    <div id="preloader" class="smooth-loader-wrapper">
      <div class="loader">
        <img src="<?php echo esc_url( get_theme_mod( 'angel_preloader_image_setting', get_template_directory_uri() . '/assets/images/angel-default-preloader.gif' ) ) ; ?>" data-no-lazy="1" alt="<?php echo 'Loading...' ?>">
      </div>
    </div>
    <?php endif; 
   } ;?>
