<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;
use elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_Image_Compare extends Widget_Base
{
    public function get_name() {
		return 'image-compare';
	}

	public function get_title() {
		return esc_html__( 'Image Compare', 'angel' );
	}

	public function get_icon() {
		return 'angel-element-icon eicon-image-before-after';
	}

	public function get_categories() {
		return [ 'angel' ];
	}

	public function get_keywords() {
		return [ 'image', 'compare', 'comparison', 'difference' ];
    }
    
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Layout', 'angel'),
            ]
        );

        $this->add_control(
			'before_image',
			[
				'label'   => esc_html__( 'Before Image', 'angel' ),
				'description' => esc_html__( 'Use same size image for before and after for better preview.', 'angel' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'after_image',
			[
				'label'   => esc_html__( 'After Image', 'angel' ),
				'description' => esc_html__( 'Use same size image for before and after for better preview.', 'angel' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
        );
        
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

		// $this->start_controls_section(
		// 	'section_content_additional_settings',
		// 	[
		// 		'label' => esc_html__( 'Additional', 'angel' ),
		// 		'tab'   => Controls_Manager::TAB_CONTENT,
		// 	]
		// );
        // $this->add_control(
		// 	'default_offset_pct',
		// 	[
		// 		'label'   => esc_html__( 'Before Image Visiblity', 'angel' ),
		// 		'type'    => Controls_Manager::SLIDER,
		// 		'default' => [
		// 			'size' => 70,
		// 		],
		// 		'range' => [
		// 			'px' => [
		// 				'max'  => 100,
		// 				'min'  => 0,
		// 			],
		// 		],
		// 	]
		// );
        // $this->end_controls_section();
    }
   
	public function render() {
        $settings = $this->get_settings_for_display();

        // if ($settings['default_offset_pct']['size'] < 1) {
		// 	$settings['default_offset_pct']['size'] = $settings['default_offset_pct']['size'] * 100;
        // }
        
        $this->add_render_attribute(
            [
                'image-compare' => [
					'id'        => 'image-compare-' . $this->get_id(),
					'class'     => [ 'image-compare' ],
                    'data-settings' => [
                        wp_json_encode(array_filter([
							'id' 					=> 'image-compare-' . $this->get_id(),
							// 'default_offset_pct'    => $settings['default_offset_pct']['size'],
							// 'orientation'           => ($settings['orientation'] == 'horizontal') ? false : true,
							// 'before_label'          => $settings['before_label'],
							// 'after_label'           => $settings['after_label'],
							// 'no_overlay'            => ('yes' == $settings['no_overlay']) ? true : false, 
							// 'on_hover'            	=> ('yes' == $settings['on_hover']) ? true : false, 
							// 'move_slider_on_hover'  => ('yes' == $settings['move_slider_on_hover']) ? true : false,
							// 'add_circle'  			=> ('yes' == $settings['add_circle']) ? true : false,
							// 'add_circle_blur'  		=> ('yes' == $settings['add_circle_blur']) ? true : false,
							// 'add_circle_shadow'  	=> ('yes' == $settings['add_circle_shadow']) ? true : false,
							// 'smoothing'  			=> ('yes' == $settings['smoothing']) ? true : false,
							// 'smoothing_amount'    	=> $settings['smoothing_amount']['size'],
							// 'bar_color'    			=> $settings['bar_color']
                            ])
                        ),
                    ],
                ],
            ]
        );
        
        	?>
		<div class="angel-image-compare bdt-position-relative">
			<div <?php echo $this->get_render_attribute_string( 'image-compare' ); ?>>
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail_size', 'before_image' ); ?>
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail_size', 'after_image' ); ?>
			</div>
		</div>

		<?php
    }

}


