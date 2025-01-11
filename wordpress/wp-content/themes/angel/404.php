<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package angel
 */

get_header(); ?>

	<div class="page-404-wrapper">
		<div class="default-page pageTitleArea">
			<div class="">
				<div class="pageTitle page-not-f text-center">
					<h1>404 <small>NOT FOUND!</small></h1>
					<!-- <p>The page you are looking for was moved, removed, renamed or <br />might never existed.</p> -->
					<a href="<?php echo esc_url( home_url() ) ?>" class="btn btn-main"><i class="fa fa-angle-double-left"></i>Go Home</a>
				</div>
				
			</div>
		</div>
	</div>

<?php
get_footer();
