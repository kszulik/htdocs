<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;

if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


class Widget_Blog_grid extends Widget_Base
{
    public function get_name()
    {
        return 'angel-blog';
    }

    public function get_title()
    {
        return __('Blog Grid', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-gallery-grid';
    }

    public function get_keywords() {
		return [ 'blog', 'post', 'News Feed' ];
	}

    public function get_categories()
    {
        return [ 'angel' ];
    }

    /**
     * A list of scripts that the widgets is depended in
     * @since 1.3.0
     **/

    public function get_post_category()
    {
        $cat = array();
        $terms = get_terms(array(
            'post_type' => 'post',
        ));
        foreach ($terms as $key => $value) {
            $cat[$key] = $value;
        }
        return $cat;
    }


    protected function register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Post Settings', 'angel'),
            ]
        );

        // $this->add_control(
        //     'post_limit',
        //     [
        //         'label' => __('Post Limit', 'angel'),
        //         'type' => Controls_Manager::NUMBER,
        //         'default' => 3,
        //     ]
        // );

        // $this->add_control(
		// 	'excerpt_lenght',
		// 	[
		// 		'label'       => __( 'Excerpt length', 'angel' ),
		// 		'description' => __( 'The excerpt length', 'angel' ),
		// 		'type'        => Controls_Manager::NUMBER,
		// 		'default'     => '20'
		// 	]
		// );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings  = $this->get_settings();
        $loop = new WP_Query(
            array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
            )
        );
        ?>
        <div class="clearfix">
            <div class="row justify-content-center">
                <?php if ( $loop->have_posts() ): 
                while ($loop->have_posts() ) : $loop->the_post() ;?>

                <div class="col-sm-4 col-md-4">
                    <div class="single_post__box">

                        <div class="post_image">
                            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-grid-size'); ?></a>
                            <div class="meta-items">
                                <div class="author_meta">
                                    <span class="avater"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></span>
                                    <span class="name"><?php angel_posted_by() ;?></span>
                                </div>
                                <div><time><p class="posted_time"><?php  echo get_the_date('j') ;?><strong><?php  echo get_the_date('M') ;?></strong></p></time></div>
                            </div>
                        </div>

                        <div class="post-content">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo wp_trim_words( get_the_content(), 20 , '&hellip;' ); ?></p>
                        </div>
                        <div class="article-footer">                                         
                            <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html('Read more', 'angel') ;?><span class="icon-align-right">
                            <i aria-hidden="true" class="fa-fw fas fa-angle-double-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php    
                endwhile;
                endif ;?>
            </div>
        </div>
        <?php
    }
}