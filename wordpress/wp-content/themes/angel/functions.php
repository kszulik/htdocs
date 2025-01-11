<?php

/**
 * angel functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package angel
 */
if (!function_exists('angel_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function angel_setup()
{
    /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on angel, use a find and replace
   * to change 'angel' to the name of your theme in all the template files.
   */
  load_theme_textdomain('angel', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');
    /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support('title-tag');

    /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');
  add_image_size( 'post-grid-size', 360, 260, true );
    // This theme uses wp_nav_menu() in one location.
  register_nav_menus(array(
    'primary' => esc_html__('Primary', 'angel'),
    'secondary' => esc_html__('Secondary', 'angel'),
  ));
    /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
    /*
   * Enable support for Post Formats.
   * See https://developer.wordpress.org/themes/functionality/post-formats/
   */
  add_theme_support('post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
  ));
    // Set up the WordPress core custom background feature.
  add_theme_support('custom-background', apply_filters('angel_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  )));
}
endif;
add_action('after_setup_theme', 'angel_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function angel_content_width()
{
  $GLOBALS['content_width'] = apply_filters('angel_content_width', 640);
}
add_action('after_setup_theme', 'angel_content_width', 0);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function angel_widgets_init()
{

  register_sidebar(array(
    'name' => 'Blog Sidebar',
    'id' => 'blog_sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));


  register_sidebar(array(
    'name' => 'Footer Widgets',
    'id' => 'footer_widgets',
    'before_widget' => '<div class="col-sm-3 col-xs-12 widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="footerInfoTitle">',
    'after_title' => '</h2>',
  ));



}
add_action('widgets_init', 'angel_widgets_init');

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
  global $woocommerce;

  ob_start();

  ?>

    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'angel'); ?>">
      <i class="fa fa-shopping-basket"></i> <span class="cart-contents-count"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count(), 'angel'), WC()->cart->get_cart_contents_count()); ?></span>
    </a>

	<?php
$fragments['a.cart-contents'] = ob_get_clean();
return $fragments;
}

/**
 * Enqueue scripts and styles.
 */
function angel_scripts()
{
  wp_enqueue_style('angel-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
  wp_enqueue_style('angel-fonts', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
  wp_enqueue_style('owl.carousel.css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
  wp_enqueue_style('angel-image-compare.css', get_template_directory_uri() . '/assets/css/angel-image-compare.css');
  wp_enqueue_style('angel-style', get_stylesheet_uri());

  wp_enqueue_script('angel-bootstrap.min.js', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '20210313', true);
  wp_enqueue_script('page-scroll.js', get_template_directory_uri() . '/assets/js/vendor/page-scroll.js', array('jquery'), '20120206', true); 
  wp_enqueue_script('page-jquery-matchHeight', get_template_directory_uri() . '/assets/js/vendor/jquery.matchHeight-min.js', array('jquery'), '20120206', true);
  wp_enqueue_script('owl.carousel.min.js', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.min.js', array('jquery'), '20120206', true);
  wp_enqueue_script('tilt.min.js', get_template_directory_uri() . '/assets/js/vendor/tilt.jquery.min.js', array('jquery'), '20120206', true);
  wp_enqueue_script('image-compare.js', get_template_directory_uri() . '/assets/js/vendor/image-compare-viewer.js', array('jquery'), '20120206', true);
  wp_enqueue_script('angel-gallery-isotope', get_template_directory_uri() . '/assets/js/vendor/isotop.min.js', array('jquery'), '20120206', true);
  wp_enqueue_script('script-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '20210313', true);
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'angel_scripts');


function angel_theme_customizer_init()
{
  wp_enqueue_script(
    'angel-themecustomizer',            //Give the script an ID
    get_template_directory_uri() . '/js/customizer.js',//Point to file
    array('jquery', 'customize-preview'),    //Define dependencies
    '1.0',                       //Define a version (optional) 
    true                      //Put script in footer?
  );
}
add_action('customize_preview_init', 'angel_theme_customizer_init');


/**
 * Register/Enqueue JS/CSS In Admin Panel
 */
function angel_register_admin_styles(){
	wp_enqueue_style( 'angel-customizer', get_template_directory_uri() . '/assets/css/customizer.css');

	//wp_enqueue_script( 'angel-custom-controls-js', get_template_directory_uri()  . '/assets/js/angel-customizer.js', array( 'jquery', 'wp-color-picker' ), '1.0', true );
}
add_action('admin_enqueue_scripts', 'angel_register_admin_styles');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**l
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


//TMG Plugin for plugin activation
if (file_exists(__DIR__ . '/inc/tmg/class-tgm-plugin-activation.php')) {
  require_once __DIR__ . '/inc/tmg/class-tgm-plugin-activation.php';
}


if (file_exists(__DIR__ . '/inc/shortcodes.php')) {
  require_once __DIR__ . '/inc/shortcodes.php';
};

if (file_exists(__DIR__ . '/inc/elementor-functions.php')) {
  require_once __DIR__ . '/inc/elementor-functions.php';
}

if (file_exists(__DIR__ . '/inc/elements.php')) {
  require_once __DIR__ . '/inc/elements.php';
}

// Woocommerce Settings
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
  add_theme_support('woocommerce');
  //add_theme_support( 'wc-product-gallery-zoom');
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' ); 
}


remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);



remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_after_shop_loop_item', 5);


add_action('woocommerce_before_shop_loop_item', function () {
	?>
  
   <?php 
	  
	  global $product;
	  
	   $product_col = esc_attr( wc_get_loop_prop( 'columns' ) );
     
     
		if ($product_col == 1){
		  $product_col = 'col-md-12';
		}elseif ($product_col == 2){
		  $product_col = 'col-md-6';
		}elseif($product_col == 3){
		  $product_col = 'col-md-4';
		}
		elseif($product_col == 4){
		  $product_col = 'col-md-3';
		}elseif($product_col == 6 || $product_col == 5 ){
		  $product_col = 'col-md-2';
		}else{
		  $product_col = 'col-md-4';
		}
  
		;?>
	<div <?php wc_product_class( $product_col ); ?> >
		
		<div class="block produtSingle">
  
		<div class="produtImage">
  <?php
  
  });
  

add_action('woocommerce_before_shop_loop_item_title', function () {
  ?>
  </div>
<?php

}, 11);


add_action('woocommerce_before_shop_loop_item_title', function () {
  ?>
    <div class="productMask">
      <?php woocommerce_template_loop_add_to_cart(); ?>
    </div>
  <?php

}, 10);

add_action('woocommerce_before_shop_loop_item_title', function () {
  ?>
    <div class="productCaption">
    
  <?php

}, 11);

add_action('woocommerce_shop_loop_item_title', function () {
  ?>
    </div>
  <?php

}, 12);

add_action('woocommerce_after_shop_loop_item', function(){
  ?>
     </div>
</div>
  <?php 
}, 10);

add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 11);

add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 9);
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');

add_action('woocommerce_before_main_content', 'remove_sidebar');
function remove_sidebar()
{
  if (is_shop()) {
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
  }
}

add_action('woocommerce_before_main_content', function() {
  ?>

<section class="page-wrapper container">
	<div class="row" id="woo-margin-zero">
		<div class="col-md-12">

  <?php
},8);

add_action('woocommerce_no_products_found', function() {
  ?>
		</div>	
	</div>
</section>

<?php 
},12);

add_action ( 'woocommerce_before_account_navigation', function() {
  ?>
		<div class="row">
      <div class="col-md-4">

<?php 
},10);

add_action ( 'woocommerce_after_account_navigation',function() {
  ?>  
    </div>
    <div class="col-md-8">

<?php 
},10);

add_action ( 'woocommerce_account_dashboard', function() {
  ?>  
    </div>
<?php 
},10);





// woocommerce product catagory page
add_action('woocommerce_before_main_content', 'remove_sidebar_archive');
function remove_sidebar_archive() {
  if (is_archive()) {
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);
  }
}

add_filter( 'woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999 );
 
function bbloomer_change_number_related_products( $args ) {
 $args['posts_per_page'] = 3; // # of related products
 $args['columns'] = 3; // # of columns per row
 return $args;
}

//TMG Plugin Settings
add_action('tgmpa_register', 'angel_register_required_plugins');
function angel_register_required_plugins()
{

  $plugins = array(
    array(
      'name' => 'Elementor Page Builder',
      'slug' => 'elementor',
      'required' => true,
      'force_activation'   => true,
    ),
    array(
      'name' => 'Contact Form',
      'slug' => 'contact-form-7',
      'required' => true,
      'force_activation'   => true,
    ),
    array(
      'name' => 'Woocommerce',
      'slug' => 'woocommerce',
      'required' => true,
      'force_activation'   => true,
    ),
		array(
			'name'      => 'Bookingpress Appointment Booking',
			'slug'      => 'bookingpress-appointment-booking',
			'source'    => 'https://ocdi.iamabdus.com/plugins/bookingpress-appointment-booking.zip',
			'required'  => true,
			'force_activation'   => true,
      'force_deactivation' => true,
		),
    array(
      'name' => 'Demo Import',
      'slug' => 'one-click-demo-import',
      'required' => true,
      'force_activation'   => true,
    )
  );

  $config = array(
    'id' => 'angel',
    'default_path' => '',
    'menu' => 'tgmpa-install-plugins',
    'has_notices' => true,
    'dismissable' => true,
    'dismiss_msg' => '',
    'is_automatic' => true,
    'message' => '',
  );

  tgmpa($plugins, $config);
}

function hex2rgba($color, $opacity = false)
{

  $default = 'rgb(0,0,0)';

  //Return default if no color provided
  if (empty($color))
    return $default; 

  //Sanitize $color if "#" is provided 
  if ($color[0] == '#') {
    $color = substr($color, 1);
  }

        //Check if color has 6 or 3 characters and get values
  if (strlen($color) == 6) {
    $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
  } elseif (strlen($color) == 3) {
    $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
  } else {
    return $default;
  }

        //Convert hexadec to rgb
  $rgb = array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
  if ($opacity) {
    if (abs($opacity) > 1)
      $opacity = 1.0;
    $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
  } else {
    $output = 'rgb(' . implode(",", $rgb) . ')';
  }

    //Return rgb(a) color string
  return $output;
}


// Woocommerce Add Filer To remove CSS 
add_filter('woocommerce_enqueue_styles', '__return_empty_array');


function angle_customizer_css()
{
  $preloader_color = get_theme_mod('angel_preloader_background_color') == '' ? "#f8f8f8" : get_theme_mod('angel_preloader_background_color');
   $preloader_image_size = get_theme_mod('angel_slug_customizer_number') == '' ? "100" : get_theme_mod('angel_slug_customizer_number');
  $primary_color = get_theme_mod('angel_color_scheme_settings') == '' ? "#ec5598" : get_theme_mod('angel_color_scheme_settings');
  //$button_hover_color = get_theme_mod('button_hover_color_settings') == '' ? "#e1488c" : get_theme_mod('button_hover_color_settings');
  $button_hover_color = '#fff';
  ?>

    <style type="text/css">

    .smooth-loader-wrapper .loader img{
		   width: <?php echo "$preloader_image_size" ?>%;
	   }
		 
		 .smooth-loader-wrapper {
		   background-color: <?php echo "$preloader_color" ?>;
     }
     
  .post-nav a,
  .post-nav .page-numbers,
  .post-nav span,
  .woocommerce-pagination ul.page-numbers li a,
  .woocommerce-pagination ul.page-numbers li span,
  .navigation.post-navigation .nav-links .nav-previous a,
  .navigation.post-navigation .nav-links .nav-next a,
  .navigation.posts-navigation .nav-links .nav-previous a, 
  .navigation.posts-navigation .nav-links .nav-next a,
  .navbar-default .navbar-nav > li.current-menu-item > a {
      color: <?php echo $primary_color ?>
    }

    .btn-primary:link, .btn-primary:visited, .btn-primary:active:focus{
      background-color: <?php echo $primary_color ?>;
    }


    ::selection {
      background-color: <?php echo $primary_color ?>;
    }


    .tabs-left .nav li a:hover, .tabs-left .nav li.active a, .tabs-left .nav li.active a:hover, .tabs-left .nav li.active a:focus, .tabs-left .nav li.active a a:active, .homeGallery ul.filter > li.active > a, .homeGallery ul.filter > li > a:hover {
      border-bottom-color: <?php echo $primary_color ?>;
    }

    .tabs-left .nav li.active a {
      border-bottom: 1px dashed <?php echo $primary_color ?>;
    }
    .tabTop .nav li.active a, .tabTop .nav li.active a:hover, .tabTop .nav li a:hover {
        color: <?php echo $primary_color ?>;
    }

    .tabs-left .nav li a:hover, .tabs-left .nav li.active a, .tabs-left .nav li.active a:hover, .tabs-left .nav li.active a:focus, .tabs-left .nav li.active a a:active, .homeGallery ul.filter > li.active > a, .homeGallery ul.filter > li > a:hover {
        border-bottom-color: <?php echo $primary_color ?>;
    }

    .varietyContent h4{
      color: <?php echo $primary_color ?>;
    }

    .post-nav .page-numbers.current, .post-nav .page-numbers:hover,
    .woocommerce-pagination ul.page-numbers li span.current,
    .woocommerce-pagination ul.page-numbers li a:hover,
    .woocommerce-pagination ul.page-numbers li span:hover,
    .navigation.post-navigation .nav-links .nav-previous a:hover,
    .navigation.post-navigation .nav-links .nav-next a:hover,
    .navigation.posts-navigation .nav-links .nav-previous a:hover,
    .navigation.posts-navigation .nav-links .nav-next a:hover,
    .blogCommnets .media-body .btn-link, .post-comments .comment-form .submit , .backToTop , .pageTitleArea ,.cart_btn a .cart-contents-count , .top-info-bar , .priceTag , .navbar-default .navbar-toggle , .woocommerce .woocommerce-MyAccount-navigation li.is-active a , p.no-comments , .single_add_to_cart_button, .woocommerce-Button , .btn-primary:hover, .wpcf7 input[type='submit']:hover, .single_add_to_cart_button:hover, .woocommerce-Button:hover ,.mc4wp-form-fields input[type="submit"] , .shop_table td.actions input[type="submit"] , .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a , .woocommerce .form-row input[type='submit'], .blogSidebar .widget .widget-title, .btn-primary, .wpcf7 input[type='submit'] , .product .woocommerce-tabs .tabs li.active a ,.navbar-default .navbar-toggle:hover ,   ::selection , .onsale , .woocommerce-tabs .tabs li.active a   {
      background: <?php echo $primary_color ?>
    }

    .post-nav a,
    .post-nav .page-numbers,
    .post-nav span,
    .post-nav .page-numbers.current, .post-nav .page-numbers:hover,
    .post-comments .comment-form .submit{
      border-color: <?php echo $primary_color ?>;
    }


    .footerInfo , .main-menu .sub-menu , .navbar-default .navbar-toggle , .woocommerce .woocommerce-MyAccount-navigation li.is-active a , .mc4wp-form-fields input[type="submit"] , .woocommerce .form-row input[type='submit'] , .blogSidebar .widget .widget-title , .product .woocommerce-tabs .tabs li.active a , .navbar-default .navbar-toggle:hover, .wpcf7 .wpcf7-form-control:not(span):not([type="submit"]):focus, .woocommerce .woocommerce-MyAccount-navigation li.is-active a:hover , .main-slider , .woocommerce-tabs .tabs li.active a{
      border-color: <?php echo $primary_color ?>
    }

    .main-menu .sub-menu,
    .footerInfo {
      border-top-color: <?php echo $primary_color ?>
    }

    .blogPost h2, .blogPost h2 a , a , .angel-tab .nav-tabs li.active , .reviewInfo .fa-quote-left , .reviewInfo h4 , .expertBox:hover .expertCaption h2, .offerContent .offerPrice h5 , .navbar-default .navbar-nav > li > a:hover , .main-menu .sub-menu li a:hover , .footer-widget .cat-item a:hover , footer:not(.footer_style-2) .copyRight .list-inline li a:hover , .copyRightText p a:hover , .required , .post-comments .reply a, .post-comments .edit-link a , .main-slider .owl-carousel .owl-controls .owl-nav .owl-prev, .main-slider .owl-carousel .owl-controls .owl-nav .owl-next, .main-slider .owl-carousel .owl-controls .owl-dot , .secotionTitle h2 span, .productCaption h3 , .product .summary .price , .price ins, .price .woocommerce-Price-amount, .price * { 
      color: <?php echo $primary_color ?>;
    }

    .priceTableWrapper:hover .maskImage , .expertMask , .productMask , .offerTitle , .woocommerce-message , .woocommerce-error, .woocommerce-info,.woocommerce-noreviews  {
      background: <?php echo hex2rgba($primary_color, 0.7); ?>;
    }

    .woocommerce-pagination ul.page-numbers li a,
    .woocommerce-pagination ul.page-numbers li span,
    .navigation.post-navigation .nav-links .nav-previous a,
    .navigation.post-navigation .nav-links .nav-next a,
    .navigation.posts-navigation .nav-links .nav-previous a, 
    .navigation.posts-navigation .nav-links .nav-next a,
    .team-slider .owl-controls .owl-dots .owl-dot {
        border-color: <?php echo $primary_color ?>;;
        border: 1px solid <?php echo $primary_color ?>;
    }

    .team-slider .owl-controls .owl-dots .owl-dot.active {
        background-color: <?php echo $primary_color ?>;
        width: 13px;
        height: 13px;
    }

    .coupon [name="apply_coupon"], .woocommerce-cart-form [name="update_cart"], button[name='woocommerce_checkout_place_order']{
      background-color: <?php echo $primary_color ?>;
      border: 1px solid <?php echo $primary_color ?>;
    }

    #coupon_code{
      height: 40px;
      box-shadow: none;
      border-radius: 0;
      padding-left: 18px;
      border: 1px solid <?php echo $primary_color ?>;
      color: #333;
    }

    .angel-cta.elementor-element {
      background-color: <?php echo $primary_color ?> !important;
    }

    .angel-contact-details {
      background-color: <?php echo $primary_color ?>!important;
    }
    
    /*.angel-contact-details .elementor-icon-list-icon i {
      color: <?php echo $primary_color ?> !important;
    }*/

    .profilePersonal .list-unstyled li i.fa{
      color: <?php echo $primary_color ?>;
    }

    .wpcf7 input[type="submit"]:active:focus,.wpcf7 input[type="submit"]:focus, .wpcf7 input[type="submit"]:active, .footer-widget .wpcf7 input[type="submit"]{
      background-color: <?php echo $primary_color ?>;
      border: 1px solid <?php echo $primary_color ?>;
    }

    .footer-widget .wpcf7 input[type="email"]{
      border: 1px solid <?php echo $primary_color ?>;
    }

    body table.booked-calendar tr.days, body table.booked-calendar tr.days th, body .booked-calendarSwitcher.calendar, body #booked-profile-page .booked-tabs, #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead, #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead th{
      background-color: <?php echo $primary_color ?> !important;
    }
    body table.booked-calendar tr.days th, body #booked-profile-page .booked-tabs{
      border-color: <?php echo $primary_color ?> !important;
    }
    #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active, #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active:hover, body #booked-profile-page input[type=submit].button-primary:hover, body .booked-list-view button.button:hover, body .booked-list-view input[type=submit].button-primary:hover, body table.booked-calendar input[type=submit].button-primary:hover, body .booked-modal input[type=submit].button-primary:hover, body table.booked-calendar th, body table.booked-calendar thead, body table.booked-calendar thead th, body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover, body #booked-profile-page .booked-profile-header, body #booked-profile-page .booked-tabs li.active a, body #booked-profile-page .booked-tabs li.active a:hover, body #booked-profile-page .appt-block .google-cal-button > a:hover, #ui-datepicker-div.booked_custom_date_picker .ui-datepicker-header{
       background-color: <?php echo $primary_color ?> !important;
    }
    body #booked-profile-page input[type=submit].button-primary:hover, body table.booked-calendar input[type=submit].button-primary:hover, body .booked-list-view button.button:hover, body .booked-list-view input[type=submit].button-primary:hover, body .booked-modal input[type=submit].button-primary:hover, body table.booked-calendar th, body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover, body #booked-profile-page .booked-profile-header, body #booked-profile-page .appt-block .google-cal-button > a:hover {
      border-color: <?php echo $primary_color ?> !important;
    }

    body table.booked-calendar td.today .date span{
      border-color: <?php echo $primary_color ?> !important;
    }
    body table.booked-calendar td.today:hover .date span{
      background: <?php echo $primary_color ?> !important;
    }

    .blogSidebar .widget .search-form input[type="search"]:focus {
      border: 1px solid <?php echo $primary_color ?>
    }

    .post-comments .comment-form textarea:focus, .post-comments .comment-form .comment-form-author input:focus, .post-comments .comment-form .comment-form-email input:focus, .post-comments .comment-form .comment-form-url input:focus {
      border: 1px solid <?php echo $primary_color ?>
    }

    .home2-pricing-tabel figure.elementor-image-box-img::before {
    background-image: -webkit-linear-gradient(90deg,rgb(211,16,39) 0%, <?php echo hex2rgba($primary_color, 0.7) ?> 0%,rgba(255,255,255,0) 50%);
    }

    li.home2-price-list span {
    color: <?php echo $primary_color ?>
    }

    .homev2-divider .elementor-divider-separator {
      border-top-color: <?php echo $primary_color ?>
    }

    .home2-icon-list .elementor-icon-list-item i, .home2-icon-list .elementor-icon-list-item .elementor-icon-list-text, .home2-time-shedule .elementor-image-box-content .elementor-image-box-title, .home2-counterup .elementor-counter-number, .home2-shedule-app .elementor-widget-container .elementor-heading-title, .home2-video-title .elementor-widget-container .elementor-heading-title, .home2-shedule-app .elementor-icon-list-item .elementor-icon-list-text {
      color: <?php echo $primary_color ?>
    }

    .homev2-app-clm .elementor-element-populated, .homev2-app-clm .elementor-element-populated::after, .homev2-app-clm .elementor-element-populated::before {
      border-color: <?php echo $primary_color ?>
    }
    
    .star-rating span:before, ul.wc-block-grid__products li.wc-block-grid__product .star-rating span::before, p.stars a:before ,p.stars a:hover ~ a:before ,p.stars:hover a:before, p.stars.selected, a.active:before, p.stars.selected a.active ~ a:before, p.stars.selected a:not(.active):before  {
      color: <?php echo $primary_color ?> !important;
    }

    .angel-ct12, .contact-sidebar {
      background-color: <?php echo $primary_color ?> !important;
    }

    .per-head-color * {
      color: <?php echo $primary_color ?> !important;
    }

    /* ====v3=== */
  
    .news-letter .wpcf7 input[type='submit'],
    .single_tab__img .angel-tab-image-content span,
    .posted_time{
      background: <?php echo $primary_color ?> !important;
    }

    .elementor-widget-container a.btn.btn-primary span {
      background: <?php echo hex2rgba($button_hover_color, 0.1); ?> !important;
    }

    .angel-gallery-menu .filter-item.current {
      color: <?php echo $primary_color ?> !important;
      border-color: <?php echo $primary_color ?> !important;
    }

    
    /* .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a i, */
    .expertCaption_style_2 ul li a:hover,
    .expertBox_style_2:hover .expertCaption_style_2 h2,
    .angel-gallery-menu .filter-item:hover {
      color: <?php echo $primary_color ?> !important;
    }

    footer.footer_style-2 .copyRight {
      border-top-color: <?php echo $primary_color ?> !important;
    }

    .column_border_style .elementor-element-populated,
    .column_border_style .elementor-widget-wrap.elementor-element-populated::after,
    .column_border_style .elementor-widget-wrap.elementor-element-populated::before {
        border-color: <?php echo $primary_color ?> !important;
    }

    .footer.footer_style-2 .footer_bg_color,
    .footer.footer_style-2 .copyRight,
    .elementor-8 .elementor-element.elementor-element-85fde05 .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a:hover{
      background: <?php echo $primary_color ?> !important;
    }
  

    .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a i
    .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a:hover i{
      color: #fff !important;
    }

    .angel-gallery-item .angel-gallery-item-overlay .angel-gallery-item-overlay-content a:hover {
      background: <?php echo $primary_color ?> !important;
      color: #fff !important;
    }

    .elementor-widget-divider:not(.elementor-widget-divider--view-line_text):not(.elementor-widget-divider--view-line_icon) .elementor-divider-separator {
      background-image: -webkit-linear-gradient(175deg,<?php echo hex2rgba($primary_color, 0.01); ?> 0%,<?php echo hex2rgba($primary_color, 0.26); ?> 24%,<?php echo hex2rgba($primary_color, 0.5); ?> 46%,<?php echo hex2rgba($primary_color, 1); ?> 100%) !important;
    
    }

    .logo_border_center_style::before  {
      background-image: -webkit-linear-gradient(0deg,rgb(255,255,255) 0%,rgb(255,255,255) 0%,<?php echo hex2rgba($primary_color); ?> 25%,<?php echo hex2rgba($primary_color); ?> 100%,rgb(255,255,255) 100%);
    }

    .logo_border_center_style::after {
      background-image: -webkit-linear-gradient(0deg,rgb(255,255,255) 0%,rgb(255,255,255) 0%,<?php echo hex2rgba($primary_color); ?> 0%,<?php echo hex2rgba($primary_color); ?> 25%,rgb(255,255,255) 100%);
    }

    .logo_border_right_bottom_style::after {
      background-image: -webkit-linear-gradient(90deg,rgb(255,255,255) 0%,rgb(255,255,255) 0%,<?php echo hex2rgba($primary_color); ?>  25%,<?php echo hex2rgba($primary_color); ?>  100%,rgb(255,255,255) 100%);
    }

    .logo_border_right_top_style::after{
      background-image: -webkit-linear-gradient(90deg,rgb(255,255,255) 0%,rgb(255,255,255) 0%,<?php echo hex2rgba($primary_color); ?> 0%,<?php echo hex2rgba($primary_color); ?> 75%,rgb(255,255,255) 100%);
    }

    .single_post__box .article-footer a:hover,
    .single_post__box .post-content h2 a:hover,
    .title_prmary_color .elementor-widget-container .elementor-heading-title {
      color: <?php echo $primary_color ?> !important;
    }

    .time_shedule .elementor-widget-container .elementor-icon-list-items .elementor-icon-list-item:not(:last-child) .elementor-icon-list-icon i{
      color: <?php echo $primary_color ?> !important;
    }

    .footer-top-shape svg path {
      fill: <?php echo hex2rgba($primary_color); ?> !important;
    }
}
   
  </style>
  <?php

}
add_action('wp_head', 'angle_customizer_css');

add_action('admin_head', 'angle_admin_css');

if (!function_exists('angle_admin_css')):

    function angle_admin_css() {

        echo '<style>
        .booked-outdated-notice.notice {
                display: none !important;
            }
      </style>';

    }
endif;

add_action('elementor/editor/before_enqueue_scripts', 'elementor_scripts');

function elementor_scripts()
{
  wp_enqueue_script(
    'plugin-name-frontend',
    get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
    [
      'elementor-frontend', // dependency
    ],
    '1.0',
    true // in_footer
  );
}



function ocdi_import_files()
{
  return array(
    array(
        'import_file_name' => 'angel Import',
        'import_file_url' => 'https://ocdi.iamabdus.com/angel/angel-wp.xml',
        'import_widget_file_url' => 'https://ocdi.iamabdus.com/angel/angel-wp-widgets.wie',
        'import_customizer_file_url' => 'https://ocdi.iamabdus.com/angel/angel-customizer-export.dat',
        'import_preview_image_url'   => 'https://ocdi.iamabdus.com/angel/demo.jpg',
        'preview_url' => 'https://angel.iamabdus.com/v1.4/',
    )
  );
}
add_filter('ocdi/import_files', 'ocdi_import_files');

function ocdi_after_import_setup() {
  // Assign menus to their locations.
  $main_menu = get_term_by( 'name', 'Main', 'nav_menu' );
  $footer_menu = get_term_by( 'name', 'Footer LInk Pages', 'nav_menu' );

  set_theme_mod( 'nav_menu_locations', array(
          'primary' => $main_menu->term_id, 
          'secondary' => $footer_menu->term_id,
        )
  );

  // Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'ocdi/after_import', 'ocdi_after_import_setup' ); 

function disable_plugin_updates( $value ) {
  if ( isset($value) && is_object($value) ) {
    if ( isset( $value->response['booked/booked.php'] ) ) {
      unset( $value->response['booked/booked.php'] );
    }
  }
  return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );


/**
 * Replace demo URLs
 */
function replace_demo_urls_after_import() {
	// Get the current site URL dynamically using home_url()
	$new_url = home_url();
	$old_url = 'https://angel.iamabdus.com/v1.4'; // ##### CHANGE URL #####

	// Use Elementor Utils class to update URLs
	if (class_exists('Elementor\Utils')) {
			Elementor\Utils::replace_urls($old_url, $new_url);
	}

	// Replace menu URLs
	$locations = get_nav_menu_locations(); // Get all menu locations

	foreach ($locations as $location => $menu_id) {
			$menu_items = wp_get_nav_menu_items($menu_id);

			if (is_array($menu_items)) {
					foreach ($menu_items as $key => $item) {
							// Replace the initial part of URL if it's a custom link type
							if ($item->type === 'custom') {
									if (strpos($item->url, $old_url) === 0) {
											// Update URL
											$new_menu_url = str_replace($old_url, $new_url, $item->url);
											// Update the menu item object
											update_post_meta($item->ID, '_menu_item_url', esc_url_raw($new_menu_url));
									}
							}
					}
			}
	}
}

add_action('ocdi/after_import', 'replace_demo_urls_after_import');