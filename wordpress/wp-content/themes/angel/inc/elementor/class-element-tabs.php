<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_angel_tabs extends Widget_Base
{

    public function get_name()
    {
        return 'angel_tabs';
    }

    public function get_title()
    {
        return __('Angel Tab', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-tabs';
    }

    public function get_keywords() {
		return [ 'Nav', 'Nav Tab', 'Tabs' ];
	}

    public function get_categories()
    {
        return ['angel'];
    }

    /**
     * A list of scripts that the widgets is depended in
     *
     * @since 1.3.0
     **/
    /*
        public function get_script_depends() {
            return [ 'imagesloaded' ];
        }
    */

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Tab Items', 'angel'),
            ]
        );

        $this->add_control(
            'tabs',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'tab_name',
                        'label' => __('Tab Title', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Tab Name', 'angel'),
                        'placeholder' => __('Name', 'angel'),
                    ],
                    [
                        'name' => 'tab_price',
                        'label' => __('Tab Price', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('$25', 'angel'),
                        'placeholder' => __('Price', 'angel'),
                    ],
                    [
                        'name' => 'tab_description',
                        'label' => __('Tab Details', 'angel'),
                        'type'    => Controls_Manager::WYSIWYG,
                        'placeholder' => __('Add designation', 'angel'),
                        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, hic.'
                    ],
                    
                ],
            ]
        );


        $this->end_controls_section();
         $this->start_controls_section(
            'section_tab_button',
            [
                'label' => __( 'Tab Button', 'angel' ),
            ]
        );
       $this->add_control(
            'tab_button_text',
            [
                'label' => __( 'Button Text', 'angel' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
            ]
        );
        $this->add_control(
            'tab_button_link',
            [
                'label' => __( 'Button Link', 'angel' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'popover-toggle',
            [
                'label' => __( 'Box', 'angel' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'Default', 'angel' ),
                'label_on' => __( 'Custom', 'angel' ),
                'return_value' => 'yes',
            ]
        );
        
        // $this->start_popover();

        // $this->add_control();
        // $this->end_popover();

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings();
        $tabs = $this->get_settings('tabs');
    ?>
            
       <div class="tabbable tabTop angel-tab">
            <div class="container-fluid">
                <div class="tabbable tabs-left row">
                    <ul class="nav nav-tabs col-sm-4 col-xs-12">
                        <?php $counter = 1; foreach ($tabs  as $item) : ?>
                            <?php if ($counter===1): ?>
                                <li>
                                    <a href="#tab-<?php echo '-' .$counter; ?>" role="tab" data-toggle="tab" class="active">
                                        <?php echo $item['tab_name'] ?>
                                        <span><?php echo $item['tab_price'] ?></span>
                                    </a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="#tab-<?php echo '-' .$counter; ?>" role="tab" data-toggle="tab">
                                        <?php echo $item['tab_name'] ?>
                                        <span><?php echo $item['tab_price'] ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php $counter++; endforeach; ?>

                        <?php if ($settings['tab_button_text']): ?>
                            <a href="<?php echo $settings['tab_button_link']['url'] ?>" <?php if ( ! empty( $settings['tab_button_link']['is_external'] ) ) { ?> target="_blank" <?php } ?> class="btn btn-primary first-btn btn-tab">
                                <?php echo $settings['tab_button_text'] ?><span></span></a>
                        <?php endif ?>
                    </ul>
                    <div class="tab-content col-sm-8 col-xs-12">
                        <?php  $counter = 1; foreach ($tabs as $tab_details): ?>
                            <?php if ($counter===1): ?>
                                <div role="tabpanel" class="tab-pane active" id="tab-<?php echo '-' .$counter; ?>">
                                    <div class="varietyContent">
                                        <?php echo $tab_details['tab_description'] ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div role="tabpanel" class="tab-pane" id="tab-<?php echo '-' .$counter; ?>">
                                    <div class="varietyContent">
                                        <?php echo $tab_details['tab_description'] ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php $counter++; endforeach; ?>
                    </div>
                </div>
            </div>
            
        </div>



        <div>


        <?php
    }

    protected function content_template() {}
}
