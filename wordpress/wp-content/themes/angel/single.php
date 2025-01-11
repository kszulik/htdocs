<?php

/**
 * The template for displaying all single posts.
 *
 * @package angel
 */



get_header();

$col_class = is_active_sidebar('blog_sidebar') ? 'col-md-8' : 'col-md-12';

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<section class="container-fluid clearfix padding blog blogSingle blog-fullwidth">
		  <div class="container">
				<div class="row">
					<div class="<?php echo $col_class; ?>">
						<?php while (have_posts()) : the_post(); ?>

							<?php get_template_part('content', 'single'); ?>
							<div class="col-md-12">
							<?php
							// If comments are open or we have at least one comment, load up the comment template
							if (comments_open() || get_comments_number()) :
								comments_template();
							endif;?>
							</div>
							
						<?php endwhile; // end of the loop. ?>
						</div>

						<?php get_sidebar(); ?>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>