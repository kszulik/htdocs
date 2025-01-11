<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_Home_Slider extends Widget_Base
{

    public function get_name()
    {
        return 'slider';
    }

    public function get_title()
    {
        return __('Slider', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-slideshow';
    }

    public function get_keywords() {
		return [ 'Slider', 'Banner', 'Hero Section' ];
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
                'label' => __('Slider', 'angel'),
            ]
        );

        $this->add_control(
            'sliderbox',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'slider_background',
                        'label' => __('Slider Background Image', 'angel'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'slider_title',
                        'label' => __('Slider Heading', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('luxury spa resort', 'angel'),
                        'placeholder' => __('Slider Heading', 'angel'),
                    ],
                    [
                        'name' => 'slider_desc',
                        'label' => __('Slider Heading', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, sapiente.', 'angel'),
                        'placeholder' => __('Slider Description', 'angel'),
                    ],
                    [
                        'name' => 'button_text',
                        'label' => __('Button Text', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('luxury spa resort', 'angel'),
                        'placeholder' => __('Slider Heading', 'angel'),
                    ],
                    [
                        'label' => __( 'Button URL', 'angel' ),
                        'name' => 'button_url',
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => 'http://',
                            'is_external' => '',
                        ],
                        'show_external' => false, // Show the 'open in new tab' button.
                    ],

                    [
                        'name' => 'slider_align',
                        'label' => __( 'Slider Content Alignment', 'angel' ),
                        'type' => Controls_Manager::CHOOSE,
                        'options' => [
                            'slide-inner2'    => [
                                'title' => __( 'Left', 'angel' ),
                                'icon' => 'fa fa-align-left',
                            ],
                            'slide-inner3' => [
                                'title' => __( 'Right', 'angel' ),
                                'icon' => 'fa fa-align-right',
                            ],
                        ],
                    ],
                ],
                'title_field' => '{{{ slider_title }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'heading_style',
            [
                'label' => __( 'Heading Style', 'angel' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Heading Color', 'angel' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .common-inner .h1'=> 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => __( 'Heading Typography', 'angel' ),
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .common-inner .h1',
            ]
        );
        
        $this->end_controls_section();
        $this->start_controls_section(
            'content_settings',
            [
                'label' => __( 'Content Style', 'angel' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __( 'Content Color', 'angel' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .common-inner .h4'=> 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => __( 'Content Typography', 'angel' ),
                'name' => 'paragraph_typography',
                'selector' => '{{WRAPPER}} .common-inner .h4',
            ]
        );
        $this->end_controls_section();
        


    }

    protected function render()
    {
        $sliders = $this->get_settings('sliderbox');
        // $align = $slide['slider_align'];
        ?>
        
        <section class="main-slider" data-autoplay="true" data-interval="7000">
            <div class="inner" style="text-align:<?php echo $align ?>">
                <?php foreach ($sliders as $slide) : ?>
                    <div class="slide slideResize slide1" style="background-image: url('<?php echo esc_attr($slide['slider_background']['url']); ?>');">
                        <div class="container">
                            <div class="<?php if ($slide['slider_align'] ) : echo $slide['slider_align']  ?>
                                <?php else: echo 'slide-inner2' ; endif; ?> common-inner">
                                <h1 class="h1 from-bottom"><?php echo $slide['slider_title'] ?></h1>
                                <h4 class="h4 from-bottom"><?php echo $slide['slider_desc'] ?></h4>
                                <?php if (!empty($slide['button_text'])) : ?>
                                    <a href="<?php echo $slide['button_url']['url'] ?>" <?php if (!empty($slide['button_url']['is_external'])) { ?> target="_blank" <?php } ?> class="btn <?php echo ($slide['button_text']) ? 'btn-primary' : 'btn-none'; ?> first-btn waves-effect waves-light scale-up angel_btn">
                                        <?php echo $slide['button_text']; ?>
                                        <span></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </section>

        <?php
    }

    protected function content_template(){}
}