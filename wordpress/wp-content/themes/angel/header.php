<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package angel
 */
?>
  <!DOCTYPE html>
  <html <?php language_attributes(); ?>>
    <head>
      <!-- Google Webmaster Tool -->
      <meta name="google-site-verification" content="B4QFWpUw8F6hGAc84cqdtbLwMoxtbOAiJ5FDtFj-Sag" />
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff|Montserrat:400,700|Open+Sans:300,400,600,700|Raleway:100,300,400,600,700" rel="stylesheet">
      <?php wp_head(); ?>
    </head>
    <?php if (get_theme_mod('angel_header_sticky_settings')) : ?>
      <body <?php body_class( "body-wrapper" );?> >
    <?php else: ?>
      <body <?php body_class();?> >
    <?php endif ?>

    <!-- ============= Preloader Setting  ================== -->
    <?php if ( true == get_theme_mod( 'enable_site_preloader', true ) ) :
        get_template_part( 'template-parts/preloader/preloader');
   endif; ?>

       <?php 
               $header_variations = get_theme_mod('header_select', 'header_v1');
              if( $header_variations == 'header_v1') :
                get_template_part( 'template-parts/header/header', 'v1' ); 
              else : 
                get_template_part( 'template-parts/header/header', 'v2' );
             endif; 
         ?> 
      <section class="wrapper">