<?php
/**
* @package angel
*/
?>
<div class="blogPost" <?php post_class(); ?> id="post-<?php the_ID(); ?>" >
	<div class="blog-img">
		<a href="<?php the_permalink(); ?> "><?php echo  the_post_thumbnail();  ?></a>
	</div>
	<h2><a href="  <?php the_permalink(); ?> "><?php the_title(); ?></a></h2>
	<p><?php echo substr(get_the_excerpt(), 0,250); ?></p>
	<ul class="list-inline">
		<li><a href=" <?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a></li>
		<!-- <li><a href="<?php the_permalink();?>"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number( 'no responses', '1 comment', '% responses' ); ?></a></li> -->
		<li> 	<?php
					if ( comments_open() ) :
						echo '<i class="fa fa-comments-o" aria-hidden="true"></i>';
						comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');
					endif;
				?>
		</li>		
	</ul>
</div>