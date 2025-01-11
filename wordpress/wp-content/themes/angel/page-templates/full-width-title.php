<?php
/* Template Name: Full Width Title */
get_header(); ?>

<?php if(have_posts()) :  ?>

    <section class="default-page pageTitleArea" 
			style="background-image:url(<?php 
				$img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full'); 
				echo $featured_image = $img[0]; ?>">
			<div class="pageTitle text-center">
    			<h1><?php echo the_title(); ?></h1>
			</div>
	</section>
    
    <?php while(have_posts()) : the_post();  ?>
        <?php the_content();  ?>
    <?php endwhile;  ?>
<?php endif; ?>



<?php get_footer(); ?>
