<?php

/**
 * @package angel
 */
?>

<!-- Single Blog Page -->

        <div class="blogPost singlePost">
          <?php the_post_thumbnail(); ?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
          <ul class="list-inline">
            <li><a href="#"><i class="fa fa-user"></i> <?php the_author(); ?></a></li>
            <li><i class="fa fa-comments-o"></i><?php comments_number('0 comments', '1 Comment', '% commets') ?></li>
          </ul>
        </div>