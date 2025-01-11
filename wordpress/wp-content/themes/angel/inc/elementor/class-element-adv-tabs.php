<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;
use elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use elementor\Repeater;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_angel_adv_tabs extends Widget_Base
{
    public function get_name()
    {
        return 'angel_adv_tabs';
    }

    public function get_title()
    {
        return __('Angel Adv. Tab', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-tabs';
    }

    public function get_keywords() {
		return [ 'Nav', 'Nav Tab', 'Tabs', 'adv tab'];
	}

    public function get_categories()
    {
        return ['angel'];
    }


    protected function register_controls()
    {

        // $this->start_controls_section(
        //     'section_tab_top',
        //     [
        //         'label' => __('Top Tab Label', 'angel'),
        //     ]
        // );

        // $top_tab_repeater = new Repeater();

        // $top_tab_repeater->add_control(
		// 	'top_tab_label',
		// 	[
		// 		'label' => esc_html__( 'Top Tab Label', 'angel' ),
		// 		'type' => Controls_Manager::TEXT,
		// 		'label_block' => true,
        //         'default' => esc_html__( 'Tab Label', 'angel' ),
        //         'separator' => 'after',
		// 	]
        // );

        // $top_tab_repeater->add_control(
        //     'top_tab_icon',
        //     [
        //         'label'   => esc_html__('Icon For Top Tab', 'angel'),
        //         'type'    => Controls_Manager::ICONS,
        //         'default' => [
        //             'value'   => 'fab fa-suse',
        //             'library' => 'fa-solid'
        //         ],
        //     ]
        // );
        // $top_tab_repeater->add_control(
        //     'top_tab_id',
        //     [
        //         'label'       => esc_html__('Control Name', 'exclusive-addons-elementor'),
        //         'type'        => Controls_Manager::TEXT,
        //         'label_block' => true,
        //         'description' => __( '<b>Comma separated controls. Example: Design, Branding</b>', 'angel' )
        //     ],
        // );

        // $this->add_control(
		// 	'top_tab_repeater',
		// 	[
		// 		'label' => esc_html__( 'Tab Reapeater', 'angel' ),
		// 		'type' => Controls_Manager::REPEATER,
		// 		'fields' => $top_tab_repeater->get_controls(),
		// 		'title_field' => '{{{ top_tab_label }}}',
		// 		'default' => [
		// 				[
		// 					'top_tab_label' => __( 'Top Tab Label #1', 'angel' ),
		// 				],
		// 				[
		// 					'top_tab_label' => __( 'Top Tab Label #2', 'angel' ),
		// 				],
		// 				[
		// 					'top_tab_label' => __( 'Top Tab Label #3', 'angel' ),
		// 				],
		// 		]	
		// 	]
        // );
        
        // $this->end_controls_section();


        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Tab Items', 'angel'),
            ]
        );    
       
        $tab_repeater = new Repeater();
       
        $tab_repeater->add_control(
			'single_tab_label',
			[
				'label' => esc_html__( 'Tab Label', 'angel' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
                'default' => esc_html__( 'Tab Label', 'angel' ),
                'separator' => 'after',
			]
        );

        $tab_repeater->add_control(
			'single_tab_price_label',
			[
				'label' => esc_html__( 'Tab Price', 'angel' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
                'default' => esc_html__( '$99', 'angel' ),
                'separator' => 'after',
			]
        );


        $tab_repeater->add_control(
			'single_tab_image',
			[
				'label' => __( 'Image', 'angel' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

        $tab_repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'condition' => [
					'single_tab_image[url]!' => '',
                ],	
                'separator' => 'after',
			]
        );

        $tab_repeater->add_control(
			'single_tab_title',
			[
				'label' => esc_html__( 'Title', 'angel' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Title', 'angel' ),
			]
        );

        $tab_repeater->add_control(
			'single_tab_text_editor',
			[
				'label' => '',
				'type' => Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
			]
        );
        
        $tab_repeater->add_control(
			'single_tab_btn_text',
			[
				'label' => esc_html__( 'Text', 'angel' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Read More', 'angel' ),
				
			]
        );
        
        $tab_repeater->add_control(
			'single_tab_btn_link',
			[
				'label' => esc_html__( 'Link', 'angel' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => '#',
        			'is_external' => '',
     			],
				'show_external' => true,
		
			]
        );

        $this->add_control(
			'tab_repeater',
			[
				'label' => esc_html__( 'Tab Reapeater', 'angel' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $tab_repeater->get_controls(),
				'title_field' => '{{{ single_tab_label }}}',
				'default' => [
						[
							'single_tab_label' => __( 'Tab Label #1', 'angel' ),
							'single_tab_text_editor' => __( 'Add Tab Description details here', 'angel' ),
						],
						[
							'single_tab_label' => __( 'Tab Label #2', 'angel' ),
							'single_tab_text_editor' => __( 'Add Tab Description details here', 'angel' ),
						],
						[
							'single_tab_label' => __( 'Tab Label #3', 'angel' ),
							'single_tab_text_editor' => __( 'Add Tab Description details here', 'angel' ),
						],
						[
							'single_tab_label' => __( 'Tab Label #4', 'angel' ),
							'single_tab_text_editor' => __( 'Add Tab Description details here', 'angel' ),
						],
				]	
			]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $tab_repeater = $this->get_settings('tab_repeater');
        // $top_tab_repeater = $this->get_settings('top_tab_repeater');
        
        ?>

<!-- Top Tab Start-->


<!-- Top Tab End-->

    <div class="">
        <div class="tabbable tabTop angel-tab">
            <div class="container-fluid"> 
                <div class="tabbable tabs-left row align-items-center">

                            <ul class="nav nav-tabs col-sm-4 col-xs-12">
                                <?php $counter = 1; foreach ($tab_repeater  as $item) : ?>
                                
                                    <li class="<?php if ($counter===1): echo 'active'; endif;?>">
                                        <a href="#tab-<?php echo esc_attr($item['_id']);?><?php echo '-' .$counter; ?>" role="tab" data-toggle="tab">
                                            <?php echo $item['single_tab_label'] ?>
                                            <span><?php echo $item['single_tab_price_label'] ?></span>
                                        </a>
                                    </li> 
                                <?php $counter++; endforeach; ?>
                            </ul>
                       
                        <div class="col-sm-8 col-xs-12">
                            <div class="tab-content">
                                <?php $counter = 1; foreach ($tab_repeater  as $item) : 
                                    
                                    // Text Editor
                                    $editor_content = $item['single_tab_text_editor'] ;

                                    $editor_content = $this->parse_text_editor( $editor_content );
                                    //image 
                                    $single_tab_image = $item['single_tab_image'];
                                    $single_tab_image_url = Group_Control_Image_Size::get_attachment_image_src( $single_tab_image['id'], 'thumbnail', $item );


                                    if( empty( $single_tab_image_url ) ) : $single_tab_image_url = $single_tab_image['url']; else: $single_tab_image_url = $single_tab_image_url; endif;
                                                    
                                    ?>

                                    <div class="tab-pane <?php if ($counter===1): echo 'active'; endif;?>" id="tab-<?php echo esc_attr($item['_id']);?><?php echo '-' .$counter; ?>" role="tabpanel">

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="single_tab__img">
                                                    <?php if ($item['single_tab_price_label']): ?>
                                                        <div class="angel-tab-image-content"><span><?php echo esc_html( $item['single_tab_price_label'] ); ?></span></div>
                                                    <?php endif ?>
                                                    <img src="<?php echo esc_url($single_tab_image_url); ?>" alt="<?php echo esc_attr( $item['single_tab_title'] ); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="tab-content_left">
                                                    <h3><?php echo esc_html( $item['single_tab_title'] ); ?></h3>
                                                    <div class="single_tab__content">
                                                        <?php echo $editor_content; ?>
                                                    </div>
                                                    <?php if ($item['single_tab_btn_text']): ?>
                                                        <a href="<?php echo $item['single_tab_btn_link']['url'] ?>" <?php if ( ! empty( $item['single_tab_btn_link']['is_external'] ) ) { ?> target="_blank" <?php } ?> class="btn btn-primary first-btn btn-tab angel_btn">
                                                            <?php echo $item['single_tab_btn_text'] ?><span></span></a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $counter++; endforeach; ?>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
        <?php

    }

}
