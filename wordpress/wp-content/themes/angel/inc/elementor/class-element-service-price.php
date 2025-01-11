<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_Service_Price extends Widget_Base
{

    public function get_name()
    {
        return 'price-section';
    }

    public function get_title()
    {
        return __('Service Price', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-price-list';
    }

    public function get_keywords() {
		return [ 'pricing Plan', 'Price', 'Plan' ];
	}

    public function get_categories()
    {
        return ['angel'];
    }



    protected function register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Short Price', 'angel'),
            ]
        );

        $this->add_control(
            'short_price',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'price_title',
                        'label' => __('Price Name', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Price Title', 'angel'),
                        'placeholder' => __('Add Price Title', 'angel'),
                    ],
                    [
                        'name' => 'button_url',
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => 'http://',
                            'is_external' => '',
                        ],
                        'show_external' => false,
                    ],
                    [
                        'name' => 'price_number',
                        'label' => __('Price', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('$25', 'angel')

                    ],
                    [
                        'name' => 'price_image',
                        'label' => __('Add Image', 'angel'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'title_field' => '{{{ price_title }}}',
            ]
        );


        $this->end_controls_section();

    }

    protected function render()
    {
        $short_price = $this->get_settings('short_price'); ?>
        <div class="offersSection">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($short_price as $price) : ?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="offerContent">
                            <img src="<?php echo esc_attr($price['price_image']['url']); ?>" >
                            <div class="offerMasking">
                                <div class="offerTitle"><h4><a href="<?php echo $price['button_url']['url'] ?>"><?php echo $price['price_title']; ?></a></h4></div>
                            </div>
                            <div class="offerPrice <?php echo (empty($price['price_number'])) ? 'd-none' : ''; ?>">
                                <h5><?php echo $price['price_number'] ?></h5>
                            </div>
                            </div>
                        </div>
                                
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php

    }

    protected function content_template()
    { ?>
        <div class="offersSection">
            <div class="row">
                <# _.each( settings.short_price, function( price ) { #>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="offerContent">
                            <img src="{{price.price_image.url}}">
                            <div class="offerMasking">
                                <div class="offerTitle"><h4><a href="">{{price.price_title}}</a></h4></div>
                            </div>
                            <div class="offerPrice"><h5>{{ price.price_number }}</h5></div>
                        </div>
                    </div>
                <# } ); #>
            </div>
        </div>

    <?php 
}
}