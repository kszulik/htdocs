<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Widget_Testimonial extends Widget_Base
{

    public function get_name()
    {
        return 'testimonial_carousel';
    }

    public function get_title()
    {
        return __('Testimonial', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-testimonial';
    }

	public function get_keywords() {
		return [ 'Testimonial' ];
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
                'label' => __('Testimonial', 'angel'),
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'testimonial_name',
                        'label' => __('Name', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Testimonial Name', 'angel'),
                        'placeholder' => __('Name', 'angel'),
                    ],
                    [
                        'name' => 'testimonial_job',
                        'label' => __('Job', 'angel'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Designer', 'angel'),
                        'placeholder' => __('Add designation', 'angel'),
                    ],
                    [
                        'name' => 'testimonial_image',
                        'label' => __('Add Image', 'angel'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'testimonial_content',
                        'label' => __('Write Testimonial', 'angel'),
                        'type' => Controls_Manager::TEXTAREA,
                        'rows' => '10',
                        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, officiis iure. Odio modi quas, quod quis repudiandae, dolorum sunt voluptates accusantium veritatis cupiditate perspiciatis aspernatur quisquam laboriosam eaque vel voluptate.',
                    ],
                ],
                'title_field' => '{{{ testimonial_name }}}',
            ]
        );


        $this->end_controls_section();

    }

    protected function render()
    {
        $testimonials = $this->get_settings('testimonials'); ?>
        <div class="reviewSection">
        <div class="container-fluid">
            <div class="row">

            <?php foreach ($testimonials as $testimonial) :
                $has_content = !!$testimonial['testimonial_content'];
            $has_image = !!$testimonial['testimonial_image']['url'];
            $has_name = !!$testimonial['testimonial_name'];
            $has_job = !!$testimonial['testimonial_job'];

            ?>

                <div class="col-sm-6 col-xs-12">
                    <div class="row">
                      <div class="col-sm-9 col-sm-offset-3 col-xs-12 reviewInner">
                            <div class="reviewImage hidden-xs">
                                <img src="<?php echo esc_attr($testimonial['testimonial_image']['url']); ?>"
                             alt="<?php echo esc_attr(Control_Media::get_image_alt($testimonial['testimonial_image'])); ?>"/>
                            </div>
                        <div class="reviewInfo">
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                            <?php if ($has_content) : ?>
                                <p> <?php echo $testimonial['testimonial_content']; ?> </p>
                            <?php endif; ?>
                            <?php if ($has_name) : ?>
                                <h3><?php echo $testimonial['testimonial_name']; ?> </h3>
                            <?php endif; ?>
                            <?php if ($has_job) : ?>
                                <h4><?php echo $testimonial['testimonial_job']; ?></h4>
                            <?php endif; ?>
                          </div>
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
        <div class="reviewSection">
            <div class="row">
                
                <# _.each( settings.testimonials, function( testimonial ) { #>
                    <div class="col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3 col-xs-12 reviewInner">
                                    <div class="reviewImage hidden-xs">
                                        <img src="{{testimonial.testimonial_image.url}}"
                                     alt=""/>
                                    </div>
                                <div class="reviewInfo">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                    <p>{{testimonial.testimonial_content }}</p>
                                    <h3>{{ testimonial.testimonial_name }}</h3>
                                    <h4>{{testimonial.testimonial_job}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <# } ); #>
            </div>
        </div>

    <?php 
}
}
