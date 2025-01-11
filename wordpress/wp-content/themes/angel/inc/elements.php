<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elements Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class angel_Elements {


	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		// Elementor Editor Styles
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'angel_editor_scripts'] );
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}


	private function includes() {
        $element_files = glob( get_template_directory() . '/inc/elementor/*.php');

        foreach ($element_files as $file) {
            require $file;
        }
	}

    public function angel_editor_scripts() {
		wp_enqueue_style( 'angel-frontend-editor', get_template_directory_uri() . '/assets/css/angel-frontend-editor.css' );
		wp_enqueue_script( 'angel-editor-script', get_template_directory_uri() . '/assets/js/angel-editor-script.js', array( 'elementor-editor' ), '1.0', true );
	}

	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Home_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BookedCalendar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Contact_Form_Seven() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Team_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Pricing_Table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Angel_Tabs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Service_Price() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Woo_Products() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Image_Compare() );\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Blog_grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_angel_adv_tabs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_filterble_Gallery() );
	}
}

new Angel_Elements();



