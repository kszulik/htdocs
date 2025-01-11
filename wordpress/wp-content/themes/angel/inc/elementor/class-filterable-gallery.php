<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Control_Media;
use Elementor\Icons_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;

if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


class Widget_filterble_Gallery extends Widget_Base
{
    public function get_name(){
        return 'angel-filterable-gallery';
    }

    public function get_title(){
        return esc_html__('Filterable Gallery', 'angel');
    }

    public function get_icon(){
        return 'angel-element-icon eicon-gallery-grid';
    }

    public function get_categories(){
        return ['angel'];
    }

    public function get_keywords() {
        return [ 'gallery', 'filter', 'masonry', 'portfolio', 'filterable', 'grid' ];
    }

    protected function register_controls() {
        $angel_primary_color  = '#ec5598';
        $angel_secondary_color = '#f458ae';
        
        /**
         * Filter Gallery Grid Settings
         */
        $this->start_controls_section(
            'angel_section_fg_grid_settings',
            [
                'label' => esc_html__('Items', 'angel')
            ]
        );

        $this->add_control(
            'angel_fg_gallery_items',
            [
                'type'      => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    ['angel_fg_gallery_control_name' => 'Design, Branding'],
                    ['angel_fg_gallery_control_name' => 'Interior'],
                    ['angel_fg_gallery_control_name' => 'Development'],
                    ['angel_fg_gallery_control_name' => 'Design, Interior'],
                    ['angel_fg_gallery_control_name' => 'Branding, Development'],
                    ['angel_fg_gallery_control_name' => 'Design, Development']
                ],
                'fields' => [
                    [
                        'name'        => 'angel_fg_gallery_item_title',
                        'label'       => esc_html__('Title', 'angel'),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__('Gallery item title', 'angel')
                    ],
                    [
                        'name'        => 'angel_fg_gallery_item_content',
                        'label'       => esc_html__('Details', 'angel'),
                        'type'        => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default'     => esc_html__('Lorem ipsum dolor sit amet.', 'angel')
                    ],
                    [
                        'name'        => 'angel_fg_gallery_control_name',
                        'label'       => esc_html__('Control Name', 'angel'),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'description' => __( '<b>Comma separated gallery controls. Example: Design, Branding</b>', 'angel' )
                    ],
                    [
                        'name'        => 'angel_fg_gallery_img',
                        'label'       => esc_html__('Image', 'angel'),
                        'type'        => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'     => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name'        => 'angel_fg_gallery_img_link',
                        'type'        => Controls_Manager::URL,
                        'label_block' => true,
                        'default'     => [
                            'url'     => '#'
                        ]
                    ]
                ],
                'title_field' => '{{angel_fg_gallery_item_title}}'
            ]
        );

        $this->end_controls_section();

        /**
         * Filter Gallery Settings
         */
        $this->start_controls_section(
            'angel_section_fg_settings',
            [
                'label' => esc_html__('Settings', 'angel')
            ]
        );

        $this->add_control(
            'angel_fg_columns',
            [
                'label'   => esc_html__('Columns', 'angel'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'angel-col-3',
                'options' => [
                    'angel-col-1' => esc_html__('1', 'angel'),
                    'angel-col-2' => esc_html__('2',   'angel'),
                    'angel-col-3' => esc_html__('3', 'angel'),
                    'angel-col-4' => esc_html__('4',  'angel')
                ]
            ]
        );

        $this->add_control(
            'angel_fg_grid_hover_style',
            [
                'label'   => esc_html__('Hover Style', 'angel'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'angel-zoom-in',
                'options' => [
                    'angel-zoom-in'      => esc_html__('Zoom In', 'angel'),
                    'angel-slide-left'   => esc_html__('Slide In Left',   'angel'),
                    'angel-slide-right'  => esc_html__('Slide In Right', 'angel'),
                    'angel-slide-top'    => esc_html__('Slide In Top', 'angel'),
                    'angel-slide-bottom' => esc_html__('Slide In Bottom', 'angel')
                ]
            ]
        );

        $this->add_control(
            'angel_fg_show_icons',
            [
                'label'   => __('Show Icons', 'angel'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'both',
                'options' => [
                    'popup' => 'PopUp',
                    'link'  => 'Link',
                    'both'  => 'PopUp and Link',
                    'none'  => 'None'
                ]
            ]
        );

        $this->add_control(
            'angel_section_fg_zoom_icon',
            [
                'label'   => esc_html__('PopUp Icon', 'angel'),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-search',
                    'library' => 'fa-solid'
                ],
                'condition' => [
                    'angel_fg_show_icons' => [ 'popup', 'both']
                ]
            ]
        );

        $this->add_control(
            'angel_section_fg_link_icon',
            [
                'label'   => esc_html__('Link Icon', 'angel'),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-link',
                    'library' => 'fa-solid'
                ],
                'condition' => [
                    'angel_fg_show_icons' => [ 'link', 'both']
                ]
            ]
        );

        $this->add_control(
            'angel_fg_show_constrols',
            [
                'label'        => __('Show Controls?', 'angel'),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'angel_fg_all_items_text',
            [
                'label'     => esc_html__('Text for All Item', 'angel'),
                'type'      => Controls_Manager::TEXT,
                'default'   => __('All', 'angel'),
                'condition' => [
                    'angel_fg_show_constrols' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_show_title',
            [
                'label'        => __('Enable Title.', 'angel'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'angel' ),
                'label_off'    => __( 'Off', 'angel' ),
                'default'      => 'yes',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'angel_fg_show_details',
            [
                'label'        => __('Enable Details.', 'angel'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'angel' ),
                'label_off'    => __( 'Off', 'angel' ),
                'default'      => 'yes',
                'return_value' => 'yes'
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'    => 'angel_filter_image_size',
                'default' => 'full'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'angel_fg_item_container_style',
            [
                'label' => esc_html__('Gallery Item', 'angel'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'angel_fg_container_padding',
            [
                'label'        => esc_html__('Padding', 'angel'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', 'em', '%'],
                'default'      => [
                    'top'      => '0',
                    'right'    => '10',
                    'bottom'   => '0',
                    'left'     => '10',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .angel-gallery-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'angel_fg_container_margin',
            [
                'label'        => esc_html__('Margin', 'angel'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', 'em', '%'],
                'default'      => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '20',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .angel-gallery-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'           => 'angel_fg_container_shadow',
                'selector'       => '{{WRAPPER}} .angel-gallery-content-wrapper'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'angel_section_fg_control_style_settings',
            [
                'label' => esc_html__('Control', 'angel'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'angel_fg_control_item_container_style',
            [
                'label'     => esc_html__('Control Container', 'angel'),
                'type'      => Controls_Manager::HEADING
            ]
        );

        $this->add_responsive_control(
            'angel_fg_control_container_padding',
            [
                'label'        => esc_html__('Padding', 'angel'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', 'em', '%'],
                'default'      => [
                    'top'      => '0',
                    'right'    => '30',
                    'bottom'   => '0',
                    'left'     => '30',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .angel-gallery-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'angel_fg_control_container_margin',
            [
                'label'        => esc_html__('Margin', 'angel'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', 'em', '%'],
                'default'      => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '50',
                    'left'     => '30',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .angel-gallery-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'                   => 'angel_fg_control_shadow',
                'selector'               => '{{WRAPPER}} .angel-gallery-menu',
                'fields_options'         => [
                    'box_shadow_type'    => [ 
                        'default'        =>'yes' 
                    ],
                    'box_shadow'         => [
                        'default'        => [
                            'horizontal' => 0,
                            'vertical'   => 10,
                            'blur'       => 33,
                            'spread'     => 0,
                            'color'      => 'rgba(51, 77, 128, 0.1)'
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'angel_fg_control_item_style',
            [
                'label'     => esc_html__('Control Items', 'angel'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'angel_fg_control_item_padding',
            [
                'label'      => esc_html__('Padding', 'angel'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default'    => [
                    'top'    => 20,
                    'right'  => 20,
                    'bottom' => 20,
                    'left'   => 20,
                    'unit'   => 'px'
                ],
                'selectors'  => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'angel_fg_control_typography',
                'selector' => '{{WRAPPER}} .angel-gallery-menu .filter-item',
                'fields_options'     => [
                    'text_transform' => [
                        'default'    => 'capitalize'
                    ]
                ]
            ]
        );

        // Tabs
        $this->start_controls_tabs('angel_fg_control_tabs');

        // Normal State Tab
        $this->start_controls_tab('angel_fg_control_normal', ['label' => esc_html__('Normal', 'angel')]);

        $this->add_control(
            'angel_fg_control_normal_text_color',
            [
                'label'     => esc_html__('Text Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_control_normal_bg_color',
            [
                'label'     => esc_html__('Background Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item' => 'background: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'                 => 'angel_fg_control_normal_border',
                'fields_options'       => [
                    'border'           => [
                        'default'      => 'solid'
                    ],
                    'width'            => [
                        'default'      => [
                            'top'      => '0',
                            'right'    => '0',
                            'bottom'   => '2',
                            'left'     => '0',
                            'isLinked' => false
                        ]
                    ],
                    'color'            => [
                        'default'      => 'rgba(255,255,255,0)'
                    ]
                ],
                'selector'             => '{{WRAPPER}} .angel-gallery-menu .filter-item'
            ]
        );

        $this->add_control(
            'angel_fg_control_normal_border_radius',
            [
                'label'   => esc_html__('Border Radius', 'angel'),
                'type'    => Controls_Manager::SLIDER,
                'range'   => [
                    'px'  => [
                        'max' => 30
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item' => 'border-radius: {{SIZE}}px;'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('angel_fg_control_btn_hover', ['label' => esc_html__('Hover', 'angel')]);

        $this->add_control(
            'angel_fg_control_hover_text_color',
            [
                'label'     => esc_html__('Text Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'default'   => $angel_primary_color,
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item:hover' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_control_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item:hover'      => 'background: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'angel_fg_control_hover_border',
                'selector' => '{{WRAPPER}} .angel-gallery-menu .filter-item:hover'
            ]
        );

        $this->add_control(
            'angel_fg_control_hover_border_radius',
            [
                'label'       => esc_html__('Border Radius', 'angel'),
                'type'        => Controls_Manager::SLIDER,
                'range'       => [
                    'px'      => [
                        'max' => 30
                    ]
                ],
                'selectors'   => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item:hover' => 'border-radius: {{SIZE}}px;'
                ]
            ]
        );

        $this->end_controls_tab();

        // Active State Tab
        $this->start_controls_tab('angel_fg_control_btn_active', ['label' => esc_html__('Active', 'angel')]);

        $this->add_control(
            'angel_fg_control_active_text_color',
            [
                'label'     => esc_html__('Text Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'default'   => $angel_primary_color,
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item.current' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_control_active_bg_color',
            [
                'label'     => esc_html__('Background Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item.current' => 'background: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'                 => 'angel_fg_control_active_border',
                'fields_options'       => [
                    'border'           => [
                        'default'      => 'solid'
                    ],
                    'width'            => [
                        'default'      => [
                            'top'      => '0',
                            'right'    => '0',
                            'bottom'   => '2',
                            'left'     => '0',
                            'isLinked' => false
                        ]
                    ],
                    'color'            => [
                        'default'      => $angel_primary_color
                    ]
                ],
                'selector'             => '{{WRAPPER}} .angel-gallery-menu .filter-item.current'
            ]
        );

        $this->add_control(
            'angel_fg_control_active_border_radius',
            [
                'label'       => esc_html__('Border Radius', 'angel'),
                'type'        => Controls_Manager::SLIDER,
                'range'       => [
                    'px'      => [
                        'max' => 30
                    ]
                ],
                'selectors'   => [
                    '{{WRAPPER}} .angel-gallery-menu .filter-item.current' => 'border-radius: {{SIZE}}px;'
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Filterable Gallery Item Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'angel_section_fg_item_style_settings',
            [
                'label'     => esc_html__('Icon', 'angel'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'angel_fg_show_icons!' => 'none'
                ]
            ]
        );

        $this->add_responsive_control(
            'angel_fg_item_icon_box_size',
            [
                'label'          => esc_html__('Box Size', 'angel'),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => ['px'],
                'default'        => [
                    'size'       => 60,
                    'unit'       => 'px'
                ],
                'tablet_default' => [
                    'size'       => 50,
                    'unit'       => 'px'
                ],
                'mobile_default' => [
                    'size'       => 40,
                    'unit'       => 'px'
                ],
                'range'          => [
                    'px'         => [
                        'min'    => 0,
                        'max'    => 120
                    ]
                ],
                'selectors'      => [
                    '{{WRAPPER}} .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};'
                ] 
            ]
        );   

        $this->add_responsive_control(
            'angel_fg_item_icon_font_size',
            [
                'label'          => esc_html__('Size', 'angel'),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => ['px'],
                'range'          => [
                    'px'         => [
                        'min'    => 0,
                        'max'    => 80
                    ]
                ],
                'selectors'      => [
                    '{{WRAPPER}} .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a i' => 'font-size: {{SIZE}}{{UNIT}};'
                ] 
            ]
        );

        // Tabs
        $this->start_controls_tabs('angel_fg_item_icon_tabs');

            // Normal icon Tab
            $this->start_controls_tab('angel_fg_item_icon_normal', ['label' => esc_html__('Normal', 'angel')]);
        
                $this->add_control(
                    'angel_fg_item_icon_normal_color',
                    [
                        'label'     => esc_html__('Color', 'angel'),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#222222',
                        'selectors' => [
                            '{{WRAPPER}} .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a i' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'angel_fg_item_icon_normal_bg_color',
                    [
                        'label'     => esc_html__('Background Color', 'angel'),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a' => 'background: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

            // Hover icon Tab
            $this->start_controls_tab('angel_fg_item_icon_hover', ['label' => esc_html__('Hover', 'angel')]);
        
                $this->add_control(
                    'angel_fg_item_icon_hover_color',
                    [
                        'label'     => esc_html__('Color', 'angel'),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a:hover i' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'angel_fg_item_icon_hover_bg_color',
                    [
                        'label'     => esc_html__('Background Color', 'angel'),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#222222',
                        'selectors' => [
                            '{{WRAPPER}} .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a:hover' => 'background: {{VALUE}};'
                        ]
                    ]
                );
                
            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Filterable Gallery Item Content Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'angel_section_fg_item_content_style_settings',
            [
                'label' => esc_html__('Content', 'angel'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'angel_fg_grid_content_position',
            [
                'label'   => esc_html__('Content Position', 'angel'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'over-image',
                'options' => [
                    'over-image'  => esc_html__('Over Image(when hover)', 'angel'),
                    'below-image' => esc_html__('Below Image',   'angel')
                ]
            ]
        );

        $this->add_control(
            'angel_fg_content_area_style',
            [
                'label'     => esc_html__('Content Area', 'angel'),
                'type'      => Controls_Manager::HEADING
            ]
        );

        $this->add_control(
            'angel_fg_item_content_bg_color',
            [
                'label'     => esc_html__('Background Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-items .angel-gallery-item-content' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'angel_fg_content_padding',
            [
                'label'        => esc_html__('Padding', 'angel'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', 'em', '%'],
                'default'      => [
                    'top'      => '0',
                    'right'    => '20',
                    'bottom'   => '15',
                    'left'     => '20',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .angel-gallery-item .angel-gallery-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'angel_fg_item_content_alignment',
            [
                'label'         => esc_html__('Content Alignment', 'angel'),
                'type'          => Controls_Manager::CHOOSE,
                'toggle'        => false,
                'label_block'   => true,
                'options'       => [
                    'left'      => [
                        'title' => esc_html__('Left', 'angel'),
                        'icon'  => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title' => esc_html__('Center', 'angel'),
                        'icon'  => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title' => esc_html__('Right', 'angel'),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'selectors'     => [
                    '{{WRAPPER}} .angel-gallery-items .angel-gallery-item-content' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_item_content_title_typography_settings',
            [
                'label'     => esc_html__('Title', 'angel'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'angel_fg_show_title' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_item_content_title_color',
            [
                'label'     => esc_html__('Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'default'   => $angel_secondary_color,
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-items .angel-gallery-item-content h2' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'angel_fg_show_title' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'angel_fg_item_content_title_typography',
                'selector'  => '{{WRAPPER}} .angel-gallery-items .angel-gallery-item-content h2',
                'fields_options'   => [
                    'font_size'    => [
                        'default'  => [
                            'unit' => 'px',
                            'size' => 20
                        ]
                    ]
                ],
                'condition' => [
                    'angel_fg_show_title' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'angel_fg_item_content_title_margin',
            [
                'label'        => esc_html__('Margin', 'angel'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', 'em', '%'],
                'default'      => [
                    'top'      => '10',
                    'right'    => '0',
                    'bottom'   => '10',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .angel-gallery-items .angel-gallery-item-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'    => [
                    'angel_fg_show_title' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_item_details_text_typography_settings',
            [
                'label'     => esc_html__('Details', 'angel'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'angel_fg_show_details' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_item_details_text_color',
            [
                'label'     => esc_html__('Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'default'   => $angel_secondary_color,
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-items .angel-gallery-item-content p' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'angel_fg_show_details' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'angel_fg_item_details_text_typography',
                'selector'  => '{{WRAPPER}} .angel-gallery-items .angel-gallery-item-content p',
                'condition' => [
                    'angel_fg_show_details' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'angel_fg_item_details_title_margin',
            [
                'label'        => esc_html__('Margin', 'angel'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', 'em', '%'],
                'default'      => [
                    'top'      => '10',
                    'right'    => '0',
                    'bottom'   => '10',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .angel-gallery-items .angel-gallery-item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'    => [
                    'angel_fg_show_details' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'angel_fg_hover_overlay_style',
            [
                'label'     => esc_html__('Hover Overlay', 'angel'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'angel_fg_item_overlay_color',
            [
                'label'     => esc_html__('Overlay Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(0,0,0,0.7)',
                'selectors' => [
                    '{{WRAPPER}} .angel-gallery-element .angel-gallery-item .angel-gallery-item-overlay' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        
        $settings     = $this->get_settings_for_display();
        $show_title   = $settings['angel_fg_show_title'];
        $show_details = $settings['angel_fg_show_details'];
        $position     = $settings['angel_fg_grid_content_position'];

        do_action('angel_fg_wrapper_before');
        echo '<div id ="angel-filterable-gallery-id-'.$this->get_id().'" class="angel-gallery-items">';
            echo '<div class="angel-gallery-one angel-gallery-wrapper">';
                if( 'yes' === $settings['angel_fg_show_constrols'] ):
                    echo '<div class="angel-gallery-menu">';
                        do_action( 'angel_fg_controls_wrapper_before' );
                        if( !empty( $settings['angel_fg_all_items_text'] ) ) :
                            echo '<button data-filter="*" class="filter-item current">'.esc_html($settings['angel_fg_all_items_text']).'</button>';
                        endif;
                        $angel_gallerycontrols             = array_column( $settings['angel_fg_gallery_items'], 'angel_fg_gallery_control_name' );
                        $angel_fg_controls_comma_separated = implode( ', ', $angel_gallerycontrols );
                        $angel_fg_controls_array           = explode( ",",$angel_fg_controls_comma_separated );
                        $angel_fg_controls_lowercase       = array_map( 'strtolower', $angel_fg_controls_array );
                        $angel_fg_controls_remove_space    = array_filter( array_map( 'trim', $angel_fg_controls_lowercase ) );
                        $angel_fg_controls_items           = array_unique( $angel_fg_controls_remove_space );

                        foreach( $angel_fg_controls_items as $control ) :
                            $control_attribute = preg_replace( '#[ -]+#', '-', $control );
                            echo '<button class="filter-item" data-filter=".'.esc_attr( $control_attribute ).'">'.esc_html( $control ).'</button>';
                        endforeach;
                        do_action( 'angel_fg_controls_wrapper_after' );
                    echo '</div>';
                endif;

                echo '<div id ="filters-'.$this->get_id().'" class="angel-gallery-element">';
                    foreach( $settings['angel_fg_gallery_items'] as $index => $gallery ) :
                        $angel_controls                = $gallery['angel_fg_gallery_control_name'];
                        $angel_controls_to_array       = explode( ",",$angel_controls );
                        $angel_controls_to_lowercase   = array_map( 'strtolower', $angel_controls_to_array );
                        $angel_controls_remove_space   = array_filter( array_map( 'trim', $angel_controls_to_lowercase ) );
                        $angel_controls_space_replaced = array_map( function($val) { return str_replace( ' ', '-', $val ); }, $angel_controls_remove_space );
                        $angel_control                 = implode ( " ", $angel_controls_space_replaced );
                        $title                        = $gallery['angel_fg_gallery_item_title'];
                        $content                      = $gallery['angel_fg_gallery_item_content'];

                        do_action( 'angel_fg_item_wrapper_before' );
                        echo '<div class="angel-gallery-item '.esc_attr( $angel_control ). ' '.esc_attr( $settings['angel_fg_columns'] ).'">';
                            echo '<div class="angel-gallery-content-wrapper">';
                                echo '<div class="angel-gallery-image">';
                                    $fg_image         = $gallery['angel_fg_gallery_img'];
                                    $fg_image_src_url = Group_Control_Image_Size::get_attachment_image_src( $fg_image['id'], 'angel_filter_image_size', $settings );

                                    if( empty( $fg_image_src_url ) ) {
                                        $fg_image_url = $fg_image['url']; 
                                    } else { 
                                        $fg_image_url = $fg_image_src_url;
                                    }
                                    echo '<div class="angel-gallery-thumbnail-holder" style="background-image: url('. esc_url( $fg_image_url ) .');"></div>';
                                    echo '<div class="angel-gallery-item-overlay '.esc_attr( $settings['angel_fg_grid_hover_style'] ).'">';
                                        echo '<div class="angel-gallery-item-overlay-content">';

                                            if( 'none' !== $settings['angel_fg_show_icons'] ) :
                                                echo '<div class="angel-fg-icons">';
                                                    if( ( 'popup' || 'both' === $settings['angel_fg_show_icons'] ) && !empty( $settings['angel_section_fg_zoom_icon'] ) ) :

                                                        $link_key = 'link_' . $index;
                                                        $this->add_render_attribute( $link_key, [
                                                            'href'                              => esc_url( $gallery['angel_fg_gallery_img']['url'] ),
                                                            'data-elementor-open-lightbox'      => 'default',
                                                            'data-elementor-lightbox-slideshow' => $this->get_id(),
                                                            'data-elementor-lightbox-index'     => $index
                                                        ] );
                                                        if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
                                                            $this->add_render_attribute( $link_key, [
                                                                'class' => 'elementor-clickable'
                                                            ] );
                                                        }

                                                        echo '<a ' . $this->get_render_attribute_string( $link_key ) . '>';
                                                            Icons_Manager::render_icon( $settings['angel_section_fg_zoom_icon'], [ 'aria-hidden' => 'true' ] );
                                                        echo '</a>';
                                                    endif; 

                                                    if( ( 'link' || 'both' === $settings['angel_fg_show_icons'] )  && !empty($settings['angel_section_fg_link_icon']) ) :
                                                        $href = $target = '';
                                                        if ( $gallery['angel_fg_gallery_img_link']['url'] ) {
                                                            $href = 'href="'.esc_url($gallery['angel_fg_gallery_img_link']['url']).'"';
                                                        }
                                                        if ( 'on' === $gallery['angel_fg_gallery_img_link']['is_external'] ) {
                                                            $target = ' target= _blank';
                                                        }
                                                        if ( 'on' === $gallery['angel_fg_gallery_img_link']['nofollow'] ) {
                                                            $target .= ' rel= nofollow ';
                                                        }
                                                        echo '<a '.$href.$target.'>';
                                                            Icons_Manager::render_icon( $settings['angel_section_fg_link_icon'], [ 'aria-hidden' => 'true' ] );
                                                        echo '</a>';
                                                    endif;
                                                echo '</div>'; 
                                            endif; 

                                            if( 'over-image' === $position && ( 'yes' === $show_title || $show_details ) ) :
                                                echo $this->filterable_gallery_content( $position, $show_title, $show_details, $title, $content );
                                            endif;
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';

                                if( 'below-image' === $position && ( 'yes' === $show_title || $show_details ) ) :
                                    echo $this->filterable_gallery_content( $position, $show_title, $show_details, $title, $content );
                                endif;
                            echo '</div>';
                        echo '</div>';
                        do_action('angel_fg_item_wrapper_after');
                    endforeach;

                echo '</div>';
            echo '</div>';
        echo '</div>';
        do_action('angel_fg_wrapper_after');

        if (\Elementor\Plugin::instance()->editor->is_edit_mode()) {
            $this->render_editor_script();
        }
    }

    private function filterable_gallery_content( $position, $show_title, $show_details, $title, $content ) {
        $content_position = 'below-image' === $position ? ' below-image' : ''; 

        $output = '<div class="angel-gallery-item-content'.esc_attr( $content_position ).'">';
            $output .= do_action( 'angel_fg_content_wrapper_before' );
            if( 'yes' === $show_title && !empty( $title ) ):
                $output .= '<h2>'.esc_html( $title ).'</h2>';
            endif;
            if( 'yes' === $show_details && !empty( $content ) ):
                $output .= '<p>'.wp_kses_post( $content ).'</p>';
            endif;
            $output .= do_action('angel_fg_content_wrapper_after');
        $output .= '</div>';
        return $output;
    }

    private function render_editor_script()
        { ?>
        <script type="text/javascript">
            jQuery( document ).ready( function($) {
                if ( $.isFunction( $.fn.isotope ) ) {
                    $( '.angel-gallery-items' ).each( function() {
                        var $container  = $( this ).find( '.angel-gallery-element' );
                        var carouselNav = $container.attr( 'id' );

                        var galleryItem = '#' + $(this).attr( 'id' );
                        $container.isotope( {
                            filter: '*',
                            animationOptions: {
                                queue: true
                            }
                        } );

                        $( galleryItem + ' .angel-gallery-menu button' ).click(function(){
                            $( galleryItem + ' .angel-gallery-menu button.current' ).removeClass( 'current' );
                            $(this).addClass('current');
                     
                            var selector = $(this).attr( 'data-filter' );
                            $container.isotope( {
                                filter: selector,
                                animationOptions: {
                                    queue: true
                                }
                            } );
                            return false;
                        } );
                    } );
                }
            } );
        </script>
    <?php
    }
}