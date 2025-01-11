<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_Woo_Products extends Widget_Base
{

    public function get_name()
    {
        return 'custom-woocommerce-products';
    }

    public function get_title()
    {
        return __('Woo Products', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-form-horizontal';
    }

	public function get_keywords() {
		return [ 'woo', 'product', 'woocommerce' ];
	}

    public function get_categories()
    {
        return ['angel'];
    }

    /**
     * A list of scripts that the widgets is depended in
     * @since 1.3.0
     **/

    public function get_product_category()
    {
        $cat = array();
        $terms = get_terms(array(
            'post_type' => 'product',
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
            'fields' => 'id=>name'
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
                'label' => __('Product Settings', 'angel'),
            ]
        );

        $this->add_control(
            'product_category',
            [
                'label' => __('Product Category', 'angel'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_product_category(),
                'default' => array_keys($this->get_product_category())[0]
            ]
        );

        $this->add_control(
            'product_limit',
            [
                'label' => __('Product Limit', 'angel'),
                'type' => Controls_Manager::TEXT,
                'default' => 3,
                'placeholder' => __('How many products you want to show', 'angel'),
            ]
        );

        $this->end_controls_section();



    }

    protected function render()
    {
        $settings = $this->get_settings();
        ?>
        <div class="clearfix">
        <?php
        $loop = new WP_Query(
            array(
                'post_type' => 'product',
                'posts_per_page' => $settings['product_limit'],
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $settings['product_category'],
                    ),
                ),
            )
        );
        if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post(); ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="produtSingle">
              <div class="produtImage">
                <?php the_post_thumbnail(array(600, 600)); ?>
                <div class="productMask">
                    <?php woocommerce_template_loop_add_to_cart($loop->post, $product); ?>
                </div>
              </div>
              <div class="productCaption">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <h3 class="price"><?php global $product;
                                    echo $product->get_price_html(); ?></h3>

              </div>
            </div>
        </div>
        
        <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
        </div>
        <?php

    }

    protected function content_template()
    {
    }
}