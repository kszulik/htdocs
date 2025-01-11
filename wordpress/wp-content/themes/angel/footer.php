<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package angel
 */

?>



</section>
    <!--End Wrapper-->
    <?php 
          $header_variations = get_theme_mod('footer_select', 'header_v1');
        if( $header_variations == 'footer_v1') :
          get_template_part( 'template-parts/footer/footer', 'v1' );
        elseif( $header_variations == 'footer_v2') :
          get_template_part( 'template-parts/footer/footer', 'v2' ); 
        else : 
          get_template_part( 'template-parts/footer/footer', 'v1' );
        endif; 
    ?> 
   
	<?php wp_footer(); ?>
</body>
</html>