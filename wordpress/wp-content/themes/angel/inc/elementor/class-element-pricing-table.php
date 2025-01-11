<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_Pricing_Table extends Widget_Base
{

    public function get_name()
    {
        return 'pricing_table';
    }

    public function get_title()
    {
        return __('Pricing Table', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-price-table';
    }

    public function get_keywords() {
		return [ 'Pricing Plan', 'Pricing', 'Plan' ];
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
                'label' => __('Header', 'angel'),
            ]
        );

        $this->add_control(
			'style_option',
			[
				'label'   => esc_html__( 'Select Style', 'angel' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style_option_1',
				'options' => [
					'style_option_1' => esc_html__( 'Style 1', 'angel' ),
					'style_option_2'   => esc_html__( 'Style 2', 'angel' ),
				],
			]
		);

        $this->add_control(
            'pricing_table_header',
            [
                'label' => __('Heading', 'angel'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Pricing Heading'
            ]
        );
        $this->add_control(
            'pricing_table_background',
            [
                'label' => __('Pricing Background', 'angel'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'pricing_table_price_Starting',
            [
                'label' => __('Starting', 'angel'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Starting from',
                'condition' => [
                    'style_option' => 'style_option_2'
                ],
            ]
        );

        $this->add_control(
            'pricing_table_price',
            [
                'label' => __('Price', 'angel'),
                'type' => Controls_Manager::TEXT,
                'default' => '$99',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_features',
            [
                'label' => __('Feature Item', 'angel'),
            ]
        );
        $this->add_control(
            'pricing_table',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'pricing_item',
                        'label' => 'Item',
                        'label' => __('Item Name', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Pricing Item', 'angel'),
                    ],
                    [
                        'name' => 'pricing_item_price',
                        'label' => 'Item price',
                        'label' => __('Item Price', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('$99', 'angel'),
                    ],

                ],
                'title_field' => '{{{ pricing_item }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_pricing_footer',
            [
                'label' => __('Footer', 'angel'),
            ]
        );
        $this->add_control(
            'pricing_table_button_text',
            [
                'label' => __('Button Text', 'angel'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
            ]
        );
        $this->add_control(
            'pricing_table_button_link',
            [
                'label' => __('Button Link', 'angel'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'default' => [
                    'url' => '#',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings(); ?>
        <?php if ('style_option_1' == $settings['style_option']) {?>
    <div class="priceTableWrapper">

        <div class="priceImage" style="background-image: url('<?php echo esc_attr($settings['pricing_table_background']['url']) ?>');">
            <div class="maskImage">
                <h3><?php echo $settings['pricing_table_header'] ?></h3>
            </div>
            <?php if ($settings['pricing_table_price']) : ?>
            <div class="priceTag">
                <h4><?php echo $settings['pricing_table_price'] ?></h4>
            </div>
            <?php endif ?>
        </div>
        <div class="priceInfo">
            <ul class="list-unstyled">
                <?php if ($settings['pricing_table']) : ?>
                <?php 
                foreach ($settings['pricing_table'] as $item) { ?>
                <li><?php echo $item['pricing_item']; ?></li>
                <?php 
            }
        endif; ?>
            </ul>
            <?php if ($settings['pricing_table_button_text']) : ?>
            <a href="<?php echo $settings['pricing_table_button_link']['url'] ?>" <?php if ( ! empty( $settings['pricing_table_button_link']['is_external'] ) ) { ?> target="_blank" <?php } ?> class="btn btn-primary first-btn angel_btn"><?php echo $settings['pricing_table_button_text'] ?><span></span></a>
            <?php endif ?>
        </div>
    </div>
            <?php } else {;?>
                <div class="priceTableWrapper style-2">

                    <div class="priceImage" style="background-image: url('<?php echo esc_attr($settings['pricing_table_background']['url']) ?>');">
                        <div class="pricing_title">
                            <div class="">
                                <h3><?php echo $settings['pricing_table_header'] ?></h3>
                            </div>
                            <?php if ($settings['pricing_table_price']) : ?>
                            <div class="">
                                <h4><?php echo $settings['pricing_table_price_Starting'];?></h4>
                                <h4 class="price_style"><?php echo $settings['pricing_table_price'] ?></h4>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="priceInfo">
                        <ul class="list-unstyled angel-both-side-list">
                            <?php if ($settings['pricing_table']) : ?>
                            <?php 
                            foreach ($settings['pricing_table'] as $item) { ?>
                            <li><?php echo $item['pricing_item']; ?><span><?php echo $item['pricing_item_price']; ?></span></li>
                            <?php 
                        }
                    endif; ?>
                        </ul>
                        <?php if ($settings['pricing_table_button_text']) : ?>
                        <a href="<?php echo $settings['pricing_table_button_link']['url'] ?>" class="btn btn-primary first-btn angel_btn"><?php echo $settings['pricing_table_button_text'] ?><span></span></a>
                        <?php endif ?>
                    </div>
                    </div>
            <?php } ;?>
<?php

}

protected function content_template()
{ ?>

<# if ( 'style_option_1' == settings.style_option) { #>
    <div class="priceTableWrapper">
        <div class="priceImage" style="background-image: url('{{ settings.pricing_table_background.url }}')">

            <div class="maskImage">
                <h3>{{ settings.pricing_table_header }}</h3>
            </div>
            <# if (settings.pricing_table_price) { #>
                <div class="priceTag">

                    <h4>{{settings.pricing_table_price}}</h4>
                </div>
                <# } #>
        </div>
        <div class="priceInfo">
            <ul class="list-unstyled">
                <# _.each( settings.pricing_table, function( item ) { #>
                    <li>{{ item.pricing_item }}</li>
                    <# } ); #>
            </ul>
            <# if (settings.pricing_table_button_text) { #>
                <a href="{{settings.pricing_table_button_link}}" class="btn btn-primary first-btn angel_btn">{{ settings.pricing_table_button_text }}<span></span></a>
                <# } #>
        </div>
    </div>
<# } else { #>
    <div class="priceTableWrapper">
        <div class="priceImage" style="background-image: url('{{ settings.pricing_table_background.url }}')">
        <div class="pricing_title">
            <div class="">
                <h3>{{ settings.pricing_table_header }}</h3>
            </div>
            <# if (settings.pricing_table_price) { #>
                <div class="">
                    <h4>{{settings.pricing_table_price_Starting}}</h4>
                    <h4 class="price_style">{{settings.pricing_table_price}}</h4>
                </div>
                <# } #>
            </div>
        </div>
        <div class="priceInfo">
            <ul class="list-unstyled angel-both-side-list">
                <# _.each( settings.pricing_table, function( item ) { #>
                    <li>{{ item.pricing_item }}<span>{{ item.pricing_item_price}}</span></li>
                    <# } ); #>
            </ul>
            <# if (settings.pricing_table_button_text) { #>
                <a href="{{settings.pricing_table_button_link}}" class="btn btn-primary first-btn angel_btn">{{ settings.pricing_table_button_text }}<span></span></a>
                <# } #>
        </div>
    </div>

<# } #>
<?php

}
}
