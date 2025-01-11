<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;

if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


class Widget_Button extends Widget_Base
{
    public function get_name()
    {
        return 'angel-button';
    }

    public function get_title()
    {
        return __('Angel Button', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-button';
    }

    public function get_keywords() {
		return [ 'button', 'btn', 'Adv btn' ];
	}

    public function get_categories()
    {
        return [ 'angel' ];
    }

    /**
     * A list of scripts that the widgets is depended in
     * @since 1.3.0
     **/


    protected function register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Content', 'angel'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => __('Button Text', 'angel'),
                'type'        => Controls_Manager::TEXT,
                'default'     =>    'Button'
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label'       => __('Button URL', 'angel'),
                'type'        => Controls_Manager::URL,
                 'default' => [
                    'url' => 'http://',
                    'is_external' => '',
                 ],
                 'show_external' => false,
            ]
        );
        // $this->add_responsive_control(
        //     'button_align',
        //     [
        //         'label' => __('Button Alignment', 'angel'),
        //         'type' => Controls_Manager::CHOOSE,
        //         'options' => [
        //             'left'    => [
        //                 'title' => __('Left', 'angel'),
        //                 'icon' => 'fa fa-align-left',
        //             ],
        //             'center' => [
        //                 'title' => __('Center', 'angel'),
        //                 'icon' => 'fa fa-align-center',
        //             ],
        //             'right' => [
        //                 'title' => __('Right', 'angel'),
        //                 'icon' => 'fa fa-align-right',
        //             ],
        //             'selectors' => [
        //                 '{{WRAPPER}} .angel_btn_wrapper' => 'text-align: {{VALUE}};',
        //             ],
        //         ],
        //     ]
        // );
        $this->add_responsive_control(
			'angel_btn_align',
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
				'selectors' => [
					'{{WRAPPER}} .angel_btn_wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);


        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Button Style', 'angel'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->start_controls_tabs('tabs_button_style');
        
        $this->add_control(
            'button_color',
            [
                'label' => __('Button Color', 'angel'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary' => 'background-color: {{VALUE}}',

                ],
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'angel'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => __('Typography', 'angel'),
                'global' => [
                    'default' => Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} a.btn-primary',
            ]
        );

        $this->end_controls_tab();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        // $align = $this->get_settings('button_align'); ?>
        <div class="angel_btn_wrapper">
            <a href="<?php echo $settings['button_link']['url'] ?>" <?php if ( ! empty( $settings['button_link']['is_external'] ) ) { ?> target="_blank" <?php } ?> class="btn btn-primary angel_btn"><?php echo $settings['button_text'] ?><span></span></a>
        </div>
    <?php
    }
}
