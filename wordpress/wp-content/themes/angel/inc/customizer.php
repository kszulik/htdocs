<?php
/**
 * angel Theme Customizer.
 *
 * @package angel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function angel_customize_preview_js() {
	wp_enqueue_script( 'angel_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'angel_customize_preview_js' );


function angel_theme_customizer( $wp_customize ){

	$wp_customize->remove_control("header_image");
	$wp_customize->remove_section("colors");
	$wp_customize->remove_section("background_image");
	
//==================== Preloader  ===========================

	// Preloader Section enable or Desable.
	$wp_customize->add_section('angel_preloader_settings',
	array(
		'title'      => esc_html__('Preloader Options', 'angel'),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	)
	);

	$wp_customize->add_control('site_preloader',
	array(
		'label'    => esc_html__('Enable preloder', 'angel'),
		'description' => __( 'Preloader For All Pages', 'angel' ),
		'section'  => 'angel_preloader_settings',
		'type'     => 'checkbox',
		'priority' => 15,
	)
	);

	// Setting  preloader Enable.
	$wp_customize->add_setting('enable_site_preloader',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'angel_sanitize_checkbox',
	)
	);

	$wp_customize->add_control('enable_site_preloader',
	array(
		'label'    => esc_html__('Enable preloder', 'angel'),
		'description' => __( 'Preloader For All Pages.', 'angel' ),
		'section'  => 'angel_preloader_settings',
		'type'     => 'checkbox',
		'priority' => 10,
	)
	);

	// Setting  preloader Enable for Home Page.
	$wp_customize->add_setting('enable_site_preloader_for_home_page',
	array(
		'default'           => 'all',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'angel_sanitize_radio_btn',
	)
	);

	$wp_customize->add_control('enable_site_preloader_for_home_page',
	array(
		'label'    => esc_html__('Select Option', 'angel'),
		'section'  => 'angel_preloader_settings',
		'type'     => 'radio',
		'priority' => 11,
		'choices'     => [
			'all'   => esc_html__( 'All Pages', 'angel' ),
			'home' => esc_html__( 'Only Home Page', 'angel' ),
		],
	)
	);

	//Upload Option for preloader image
	$wp_customize->add_setting('angel_preloader_image_setting', array(
	'default' => esc_url(get_template_directory_uri() . '/assets/images/angel-default-preloader.gif', 'angel'),
	'type' => 'theme_mod',
	'sanitize_callback' => 'angel_sanitize_image',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'angel_preloader_image_setting', array(
	'label' => esc_html__( 'Upload Preloader Image', 'angel' ),
	'section' => 'angel_preloader_settings',
	'settings' => 'angel_preloader_image_setting',
	'priority' => 12,
	))
	);

			
	//add preloader image size
	$wp_customize->add_setting( 'angel_slug_customizer_number', 
	array(
		'default'     => 100,
		'sanitize_callback' => 'absint' //converts value to a non-negative integer
	)
	);
	
	$wp_customize->add_control( 'angel_slug_customizer_number', 
	array(
		'label' => esc_html__( 'Add Preloader Size in: %', 'angel' ),
		'description' => __( 'Please Add Non-Negative Number', 'angel' ),
		'section' => 'angel_preloader_settings',
		'type' => 'number',
		'settings' => 'angel_slug_customizer_number',
		'priority' => 15,
	)
	);   

	//add setting to your section
	$wp_customize->add_setting( 'angel_preloader_background_color', 
	array(
		'default' => '#f8f8f8',
		'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
	)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'angel_preloader_background_color', 
	array(              
		'label'      => __( 'Preloader Background Color: ', 'angel' ),
		'section'    => 'angel_preloader_settings',
		'settings' => 'angel_preloader_background_color',
		'priority' => 20,
	))
	);   


  $wp_customize->add_section('angel_color_scheme', array(
        'title' => __('Site Color Scheme','angel'),
        'priority' => 6,
    ));
 
  $wp_customize->add_setting('angel_color_scheme_settings',array(
          'capability'        => 'edit_theme_options',
          'default'     => '#ec5598',
          'transport' => 'refresh',
          'sanitize_callback'  => 'sanitize_hex_color' // or postMessage
        )
    );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    'label'      => __( 'Site Color Scheme', 'angel' ),
    'section'    => 'angel_color_scheme',
    'settings'   => 'angel_color_scheme_settings',
    )
  )
);

 
  // $wp_customize->add_setting('button_hover_color_settings',array(
  //     'capability'        => 'edit_theme_options',
  //     'default'     => '#e1488c',
  //     'transport' => 'refresh',
  //     'sanitize_callback'  => 'sanitize_hex_color' // or postMessage
  //   )
  // );
  // $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
  //     'label'      => __( 'Button Hover Color', 'angel' ),
  //     'section'    => 'angel_color_scheme',
  //     'settings'   => 'button_hover_color_settings',
  //     )
  //   )
  // );


  $wp_customize->add_section('angel_header', array(
  	'title' => __('Header Settings','angel'),
  	'priority' => 20
  ));

 	 $wp_customize->add_setting('angel_header_logo',array(
      'default'     => '',
      'transport' => 'refresh', 
      'sanitize_callback'  => 'esc_attr'// or postMessage
    ));
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
       $wp_customize,
       'angel_header_logo',
       array(
           'label'      => __( 'Upload a logo', 'angel' ),
           'section'    => 'angel_header',
           'settings'   => 'angel_header_logo',
       )
    ));


  $wp_customize -> add_setting('angel_logo_top_bottom_padding_settings',array(
     'transport'=>'refresh'
   ));

  $wp_customize->  add_control('angel_logo_top_bottom_padding',array(
      'label' => __( 'Logo Top Bottom Padding', 'angel' ),
      'type'  =>'text',
      'settings' => 'angel_logo_top_bottom_padding_settings',
      'section' =>  'angel_header'
    ));

  $wp_customize -> add_setting('angel_logo_left_right_padding_settings',array(
     'transport'=>'refresh'
   ));

  $wp_customize->  add_control('angel_logo_left_right_padding',array(
      'label' => __( 'Logo Left Right Padding', 'angel' ),
      'type'  =>'text',
      'settings' => 'angel_logo_left_right_padding_settings',
      'section' =>  'angel_header'
    ));
 
  $wp_customize -> add_setting('angel_header_logo_into_div_setting', array(
      'default' => '',
      'transport' => 'refresh',
  ));

  $wp_customize -> add_control('angel_header_logo_style', array(
      'label' => __( 'Remove Logo Container', 'angel' ),
      'type' => 'checkbox',
      'section' => 'angel_header',
      'settings' => 'angel_header_logo_into_div_setting',
  ));

  $wp_customize -> add_setting('show_mini_cart_setting', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize -> add_control('show_mini_cart_setting', array(
      'label' => __( 'Show Min Cart', 'angel' ),
      'description' => esc_html__('Show Mini Cart at the header.', 'edubin'),
      'type' => 'checkbox',
      'section' => 'angel_header',
      'settings' => 'show_mini_cart_setting',
  ));

  $wp_customize -> add_setting('angel_header_social_icons_setting', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize -> add_control('angel_top_bar_show_social_media_icons', array(
      'label' => 'Social Media Icons Show On Top Bar',
      'type' => 'checkbox',
      'settings' => 'angel_header_social_icons_setting',
      'section' => 'angel_header',
  ));

  $wp_customize -> add_setting('angel_header_show_settings',array(
     'default' => '',
     'transport' => 'refresh',
   ));

  $wp_customize->  add_control('angel_top_bar_show_hide',array(
      'label' => __('Hide Top Header', 'angel' ),
      'type'  => 'checkbox',
      'settings' => 'angel_header_show_settings',
      'section' =>  'angel_header'
    ));

  $wp_customize -> add_setting('angel_header_sticky_settings',array(
     'default' => '',
     'transport'=>'refresh'
   ));

  $wp_customize->  add_control('angel_header_sticky',array(
      'label' => __('Sticky Header', 'angel' ),
      'type'  =>'checkbox',
      'settings' => 'angel_header_sticky_settings',
      'section' =>  'angel_header'
    ));

  $wp_customize -> add_setting('angel_top_bar_phone',array(
     'default' => '',
     'transport'=>'postMessage'
   ));

   $wp_customize-> add_control('angel_top_bar_phn_control',array(
      'label' =>  __('Phone Number', 'angel' ),
      'type'  =>  'text',
      'settings'  =>  'angel_top_bar_phone',
      'section' =>  'angel_header'
  ));
 
   $wp_customize -> add_setting('angel_top_bar_email',array(
   		'default'	=> 'mail@gmail.com',
   		'transport'=>'postMessage'
   	));
  $wp_customize-> add_control('angel_top_bar_email_control',array(
   		'label'	=>	__('Email Address', 'angel' ),
   		'type'	=>	'text',
   		'settings'	=>	'angel_top_bar_email',
   		'section'	=>	'angel_header'
  ));
  
  
  // Header Select Option

  $wp_customize->add_setting( 'header_select', array (
    'default'	=> 'header_v1',
    'sanitize_callback' => 'select_dropdown_option_for_header',
  ) );
  
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_select', array(
    'label'    => __( 'Header Select', 'angel' ),
    'section'  => 'angel_header',
    'settings' => 'header_select',
    'type'     =>  'select',
          'choices'  => array(
      'header_v1' => esc_attr__( 'Header - 1', 'angel'),
      // 'header_v2'  => esc_attr__( 'Header - 2', 'angel'),
          ),			
  ) ) );



	// // eng settings for top header email control
	
	// start settings for top header email control
 //   $wp_customize -> add_setting('angel_top_bar_phone',array(
 //   		'default'	=> '',
 //   		'transport'=>'postMessage'
 //   	));
	// $wp_customize-> add_control('angel_top_bar_phn_control',array(
 //   		'label'	=>	'Phone Number',
 //   		'type'	=>	'text',
 //   		'settings'	=>	'angel_top_bar_phone',
 //   		'section'	=>	'angel_top_bar_section'
	// ));
	// end settings for top header email control

  // Footer settings start
	$wp_customize -> add_section('angel_footer_section', array(
   		'title' => __('Footer Settings','angel'),
   		'priority'	=> 25
     ));

  // Footer Background Color Options
     $wp_customize -> add_setting('footer_background_color_setting', array (
      'default' => '',
      'trnasport' => 'refresh',
     ));
     $wp_customize-> add_control( new WP_Customize_Color_Control( 
        $wp_customize,
       'footer_background_color', array (
        'label' => __('Choose Footer Background Color'),
        
        'settings' => 'footer_background_color_setting',
        'section' => 'angel_footer_section',
     )
    ));

  // Footer Text Color Options
  $wp_customize -> add_setting('footer_text_color_setting', array(
    'default' => '',
    'trnasport' => 'refresh',
  ));
  $wp_customize -> add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'footer_text_color', array(
      'label' => 'Choose Footer Text Color',
      'settings' => 'footer_text_color_setting',
      'section' => 'angel_footer_section',
    )
    ));

   $wp_customize -> add_setting('footer_copyright_text',array(
   		'default'	=> '',
   		'transport' => 'refresh'
   	));
	$wp_customize-> add_control('footer_copyright_text_control',array(
   		'label'	=>	'Footer Copyright Text',
   		'type'	=>	'textarea',
   		'settings'	=>	'footer_copyright_text',
   		'section'	=>	'angel_footer_section'
	));
     $wp_customize -> add_setting('footer_background',array(
      'default' => '',
      'transport' => 'refresh'
    ));
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'footer_background',
           array(
               'label'      => __( 'Footer Background Image', 'angel' ),
               'section'    => 'angel_footer_section',
               'settings'   => 'footer_background',
           )
       )
   );


  // Footer Select Option

  $wp_customize->add_setting( 'footer_select', array (
    'default'	=> 'footer_v1',
    'sanitize_callback' => 'select_dropdown_option_for_footer',
  ) );
  
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_select', array(
    'label'    => __( 'Footer Select', 'angel' ),
    'section'  => 'angel_footer_section',
    'settings' => 'footer_select',
    'type'     =>  'select',
          'choices'  => array(
      'footer_v1' => esc_attr__( 'Footer - 1', 'angel'),
      'footer_v2'  => esc_attr__( 'Footer - 2', 'angel'),
          ),			
  ) ) );

	// end footer settings


 $wp_customize->add_section( 'social_settings', array(
     'title' => __( 'Social Media Icons', 'angel' ),
     'priority' => 100,
 ));
 
 $social_sites = theme_slug_get_social_sites();
 $priority = 5;
 
 foreach( $social_sites as $social_site ) {
 
     $wp_customize->add_setting( "$social_site", array(
         'type' => 'theme_mod',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'esc_url_raw',
     ));
 
     $wp_customize->add_control( $social_site, array(
         'label' => ucwords( __( "$social_site URL:", 'social_icon' , 'angel') ),
         'section' => 'social_settings',
         'type' => 'text',
         'priority' => $priority,
     ));
 
     $priority += 5;
 }


		// sanitization and validation for Header & Footer
		function angel_theme_sanitize_select( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_key( $input );
	
			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;
	
			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
			}

			if ( ! function_exists( 'angel_sanitize_checkbox' ) ) :

				/**
				 * Sanitize checkbox.
				 *
				 * @since 1.0.0
				 *
				 * @param bool $checked Whether the checkbox is checked.
				 * @return bool Whether the checkbox is checked.
				 */
				function angel_sanitize_checkbox( $checked ) {
			
					return ( ( isset( $checked ) && true === $checked ) ? true : false );
			
				}
			
			endif;

			if ( ! function_exists( 'angel_sanitize_image' ) ) :

				/**
				 * Sanitize image.
				 *
				 * @since 1.0.0
				 *
				 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
				 *
				 * @param string               $image Image filename.
				 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
				 * @return string The image filename if the extension is allowed; otherwise, the setting default.
				 */
				function angel_sanitize_image( $image, $setting ) {
			
					/**
					 * Array of valid image file types.
					 *
					 * The array includes image mime types that are included in wp_get_mime_types().
					 */
					$img_type = array(
						'jpg|jpeg|jpe' => 'image/jpeg',
						'gif'          => 'image/gif',
						'png'          => 'image/png',
						'bmp'          => 'image/bmp',
						'tif|tiff'     => 'image/tiff',
						'ico'          => 'image/x-icon',
					);
			
					// Return an array with file extension and mime_type.
					$file = wp_check_filetype( $image, $img_type );
			
					// If $image has a valid mime_type, return it; otherwise, return the default.
					return ( $file['ext'] ? $image : $setting->default );
			
				}
			
			endif;
	
			//radio box sanitization function
			function angel_sanitize_radio_btn( $input, $setting ){
			  
				//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
				$input = sanitize_key($input);
	  
				//get the list of possible radio box options 
				$choices = $setting->manager->get_control( $setting->id )->choices;
								  
				//return input if valid or return default option
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
				  
			}

	

}
add_action( 'customize_register', 'angel_theme_customizer', 20 );



function theme_slug_get_social_sites() {
 
     // Store social site names in array
     $social_sites = array(
         'x-twitter', 
         'facebook', 
         'google-plus',
         'flickr',
         'pinterest', 
         'youtube',
         'vimeo',
         'tumblr',
         'dribbble',
         'rss',
         'linkedin',
         'instagram',
         'email'
     );
 return $social_sites;
}



// Get user input from the Customizer and output the linked social media icons
function theme_slug_show_social_icons() {
 
    $social_sites = theme_slug_get_social_sites();
 
     // Any inputs that aren't empty are stored in $active_sites array
     foreach( $social_sites as $social_site ) {
         if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
             $active_sites[] = $social_site;
         }
     }
 
     // For each active social site, add it as a list item
     if ( !empty( $active_sites ) ) {
         echo "<ul class='social-media-icons list-inline socialLink'>";
 
         foreach ( $active_sites as $active_site ) { ?>

             <li>
             <a href="<?php echo get_theme_mod( $active_site ); ?>">
             <?php if( $active_site == 'vimeo' ) { ?>
                 <i class="fa fa-<?php echo $active_site; ?>-square"></i> <?php
             } else if( $active_site == 'email' ) { ?>
                 <i class="fa fa-envelope"></i> <?php
             } else { ?>
                 <i class="fa fa-<?php echo $active_site; ?>"></i> <?php
             } ?>
             </a>
             </li> <?php
         }
         echo "</ul>";
     }
}




add_action('wp_head' , function(){
  if(get_theme_mod('angel_header_show_settings')){
      ?>
        <style type="text/css">
          .navbar-brand {
            top: -10px;
          }
        </style>
      <?php
  }

});


add_action('wp_head' , function(){
  if(get_theme_mod('footer_background_color_setting')){
      ?>
        <style type="text/css">
          .footer_bg_color{
            background-color: <?php echo get_theme_mod('footer_background_color_setting'); ?>;
          }
          .copyRight {
              background-color:  <?php echo get_theme_mod('footer_background_color_setting'); ?>;
              opacity: 0.9;
            }
        </style>
      <?php
  }
  if(get_theme_mod('footer_text_color_setting')){ ?>
    <style type ="text/css">
      footer, .footer a:link, .footer a:visited, .footer a:active, .footer .footer-widget ul li a, .footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6, .footer p, .footer span, footer .copyRight i{ 
              color: <?php echo get_theme_mod('footer_text_color_setting'); ?>;
            }
          .footer-widget ul li a:hover,
          .footer-widget ul li:hover,
            footer .copyRight a i:hover  {
              color: <?php echo get_theme_mod('footer_text_color_setting')?>;
              opacity: 0.85;
            }
    </style>
 <?php }
}); 


function select_dropdown_option_for_header( $input ) {
  $valid = array(
    'header_v1' => esc_attr__( 'Header - 1', 'angel'),
    'header_v2'  => esc_attr__( 'Header - 2', 'angel'),
  );

  if ( array_key_exists( $input, $valid ) ) {
    return $input;
  } else {
    return '';
  }
}


function select_dropdown_option_for_footer( $input ) {
  $valid = array(
    'footer_v1' => esc_attr__( 'Footer - 1', 'angel'),
    'footer_v2'  => esc_attr__( 'Footer - 2', 'angel'),
  );

  if ( array_key_exists( $input, $valid ) ) {
    return $input;
  } else {
    return '';
  }
}
