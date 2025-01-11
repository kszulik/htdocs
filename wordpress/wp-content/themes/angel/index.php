<?php
/**
 * 
 * @package angel
 */

get_header(); 

$col_class = is_active_sidebar( 'blog_sidebar' ) ? 'col-md-8' : 'col-md-12';
?>
	
	<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<section class="pageTitleArea" 
			style="background-image:url(<?php 
				$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
    			echo $featured_image = $img[0]; ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="pageTitle">
								<h1><?php echo single_post_title(); ?></h1>
							</div>
						</div>
					</div>
				</div>
			</section>


		<section class="container-fluid clearfix padding blog blog-fullwidth">
		  <div class="container">
		    	<div class="row">
		    		<div class="<?php echo $col_class; ?>">
		            	<?php /* Start the Loop */ ?>
		                    <?php while ( have_posts() ) : the_post(); ?>
		                        <?php get_template_part( 'content', get_post_format() );
		                            ?>
							<?php endwhile; ?>
							<!-- pagination here -->
							<div class="post-nav">
								<?php echo paginate_links( array (
									'prev_text'          => __('←', 'angel'),
									'next_text'          => __('→', 'angel'),
								)) ;?>
							</div>
						
		                <?php else : ?>
		                        <?php get_template_part( 'content', 'none' ); ?>
		                <?php endif; ?>
		            </div>
					<?php get_sidebar(); ?>
		    	</div>
			</div>
		</section><!-- #main -->
		
		
<?php get_footer(); ?>
