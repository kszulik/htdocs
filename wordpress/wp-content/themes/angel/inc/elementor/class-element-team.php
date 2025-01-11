<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_Team_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'team_section';
    }

    public function get_title()
    {
        return __('Team Carousel', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-person';
    }

    public function get_keywords() {
		return [ 'Team', 'Member', 'Caousel' ];
	}

    public function get_categories()
    {
        return ['angel'];
    }

    public function get_script_depends() {
        return [ 'imagesloaded', 'owl-carousel-live-version'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Team', 'angel'),
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
            'teams',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'team_image',
                        'label' => __('Add Image', 'angel'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'team_name',
                        'label' => __('Name', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Team Member', 'angel'),
                        'placeholder' => __('Name', 'angel'),
                    ],
                    [
                        'name' => 'team_designation',
                        'label' => __('Designation', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Designer', 'angel'),
                        'placeholder' => __('Job', 'angel'),
                    ],
                    [
                        'name' => 'fb_url',
                        'label' => __('Facebook URL', 'angel'),
                        'type' => Controls_Manager::URL,
                        'placeholder' => __('Add With URL', 'angel'),
                    ],
                    [
                        'name' => 'twitter_url',
                        'label' => __('Twitter URL', 'angel'),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'dribbble_url',
                        'label' => __('Dribbble URL', 'angel'),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'google_url',
                        'label' => __('Google Plus URL', 'angel'),
                        'type' => Controls_Manager::URL,
                    ],

                ],
                'title_field' => '{{{ team_name }}}',
            ]
        );


        $this->end_controls_section();

    }

    protected function render()
    {
        $settings  = $this->get_settings_for_display();
        $teams = $this->get_settings('teams');
        if ( 'style_option_1' == $settings['style_option'] ) {
            $this->add_render_attribute( 'image-content', 'class',  'expertImage');
            $this->add_render_attribute( 'expertBox', 'class',  'expertBox');
            $this->add_render_attribute( 'expertCaption', 'class',  'expertCaption');
        }else{
            $this->add_render_attribute( 'expertBox', 'class', 'expertBox_style_2');
            $this->add_render_attribute( 'image-content', 'class', 'expertImage_style_2');
            $this->add_render_attribute( 'expertCaption', 'class',  'expertCaption_style_2');
        }
?>
            <div class="team-slider">
                <?php foreach ($teams as $team) :
                    $has_image = !!$team['team_image']['url'];
                    $has_name = !!$team['team_name'];
                    $has_job = !!$team['team_designation'];
                    $has_fb = !!$team['fb_url']['url'];
                    $has_twitter = !!$team['twitter_url']['url'];
                    $has_dribbble = !!$team['dribbble_url']['url'];
                    $has_googleplus = !!$team['google_url']['url'];
                    
                    ?>
                <div <?php echo $this->get_render_attribute_string( 'expertBox' ); ?>>
                    <div <?php echo $this->get_render_attribute_string( 'image-content' ); ?>>
                        <img src="<?php echo esc_attr($team['team_image']['url']); ?>"
                     alt="<?php echo esc_attr(Control_Media::get_image_alt($team['team_image'])); ?>"/>
                     <?php if ( 'style_option_1' == $settings['style_option'] ) { ?>
                        <div class="expertMask">
                            <div class="socialArea">
                                <ul class="list-inline">
                                    <?php if ($has_fb): ?>                                
                                        <li><a href="<?php echo $team['fb_url']['url'] ?>"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif ; ?>
                                    <?php if ($has_twitter): ?>
                                        <li><a href="<?php echo $team['twitter_url']['url'] ?>"><i class="fa fa-x-twitter"></i></a></li>
                                    <?php endif ; ?>
                                    <?php if ($has_dribbble): ?>
                                        <li><a href="<?php echo $team['dribbble_url']['url'] ?>"><i class="fa fa-dribbble"></i></a></li>
                                    <?php endif ; ?>
                                    <?php if ($has_googleplus): ?>
                                        <li><a href="<?php echo $team['google_url']['url'] ?>"><i class="fa fa-google-plus"></i></a></li>
                                    <?php endif ; ?>
                                  
                                </ul>
                            </div>
                        </div>
                    <?php } ;?>
                    </div>
                    <div <?php echo $this->get_render_attribute_string( 'expertCaption' ); ?>>
                        <?php if ($has_name): ?>
                            <h2><?php echo $team['team_name']; ?> </h2>
                        <?php endif; ?>
                        <?php if ($has_job): ?>
                            <p><?php echo $team['team_designation']; ?></p>
                        <?php endif; 
                        if ( 'style_option_2' == $settings['style_option'] ) { ?>
                            <div class="socialAreas">
                                <ul class="list-inline">
                                    <?php if ($has_fb): ?>
                                        <li><a href="<?php echo $team['fb_url']['url'] ?>"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif ; ?>
                                    <?php if ($has_twitter): ?>
                                        <li><a href="<?php echo $team['twitter_url']['url'] ?>"><i class="fa fa-x-twitter"></i></a></li>
                                    <?php endif ; ?>
                                    <?php if ($has_dribbble): ?>
                                        <li><a href="<?php echo $team['dribbble_url']['url'] ?>"><i class="fa fa-dribbble"></i></a></li>
                                    <?php endif ; ?>
                                    <?php if ($has_googleplus): ?>
                                        <li><a href="<?php echo $team['google_url']['url'] ?>"><i class="fa fa-google-plus"></i></a></li>
                                    <?php endif ; ?>
                                </ul>
                            </div>
                      <?php  } ?>

                    </div>
                </div>
              
            <?php endforeach; ?>
            </div>
            
        <?php
    }

}