<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package angel
 */

get_header(); ?>


<!-- Banner Background Image -->
<?php if ( have_posts() ) : ?>
	
<?php endif ;?>

	<section id="primary" class="wrapper">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
			<section class="default-page pageTitleArea" style="background-image:url(<?php 
				$img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full'); 
				echo $featured_image = $img[0]; ?>" >
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="pageTitle">
								<h1>
								<?php printf( esc_html__( 'Search Results for: %s', 'angel' ), '<span>' . get_search_query() . '</span>' ); ?>
								</h1>
							</div>
						</div>
					</div>
				</div>
			</section>
		
		<?php endif ;?>

		<section class="container-fluid clearfix padding blog blog-fullwidth search-page">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-md-12 col-sm-12 order-lg-0 order-0">
							<?php
								if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>
						</div>
	
						
							<?php get_sidebar(); ?>
						

					</div><!-- #row -->
				</div><!-- #container -->
			</section>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();


		