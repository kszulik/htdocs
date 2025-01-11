<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package angel
 */

if ( ! is_active_sidebar( 'blog_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="blogSidebar widget-area col-md-4" role="complementary">
	<?php dynamic_sidebar( 'blog_sidebar' ); ?>
</aside><!-- #secondary -->
