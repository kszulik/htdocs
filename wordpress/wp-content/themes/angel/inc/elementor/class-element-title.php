<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Widget_Title extends Widget_Base {

    public function get_name() {
        return 'angel-title';
    }

    public function get_title() {
        return __( 'Section Title', 'angel' );
    }

    public function get_icon() {
        return 'angel-element-icon eicon-t-letter';
    }

	public function get_keywords() {
		return [ 'Title', 'Section Title', 'Heading' ];
	}

    public function get_categories() {
        return [ 'angel' ];
    }

    /**
     * A list of scripts that the widgets is depended in
     * @since 1.3.0
     **/


    protected function register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __( 'Content', 'angel' ),
            ]
        );

        $this->add_control(
            'section_heading',
            [
                'label'       => __( 'Heading', 'angel' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Section Heading', 'angel' ),
            ]
        );

        $this->add_control(
		    'section_desc',
		    [
			    'label'       => __( 'Description', 'angel' ),
			    'type'        => Controls_Manager::TEXTAREA,
			    'default'     => __( 'Section Subtitle', 'angel' ),
			]
	    );

        $this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'angel' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'angel' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'angel' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'angel' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'angel' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .secotionTitle h2' => 'text-align: {{VALUE}};',
                ],
                'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
                'label' => __( 'Padding', 'angel' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .secotionTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typography',
				'label'     => esc_html__( 'Typography', 'angel' ),
				'selector'  => '{{WRAPPER}} .secotionTitle h2 span',
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typography_second',
				'label'     => esc_html__( 'Typography', 'angel' ),
				'selector'  => '{{WRAPPER}} .secotionTitle h2',
			]
		);

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings();
        ?>
       <div class="secotionTitle">
          <h2><span><?php echo $settings['section_heading']  ?></span><?php echo $settings['section_desc']  ?></h2>
        </div>

    <?php
    }

    protected function content_template() { ?>

        <div class="secotionTitle">
            <h2><span>{{ settings.section_heading }}</span>{{ settings.section_desc }}</h2>
            
        </div>

    <?php }
}
