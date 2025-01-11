<?php
/**
 * Template part for displaying Header Version.
 *
 * @package angel
 */

?>

<header class="header header-version-2">
        <!-- TOP INFO BAR -->
        <?php if (!get_theme_mod('angel_header_show_settings')) : ?>
        <div class="top-info-bar">
          <div class="container">
            <div class="top-bar-right">
              <?php if(get_theme_mod('angel_header_logo_into_div_setting')) : ?>
                <div class="header-topbar-social-email ">
                    <div class="header-tobar-social-media">
                      <?php theme_slug_show_social_icons();?>
                    </div>
                    <div class="header-tobar-email-phone">
                        <ul class="list-inline ">
                        <?php if (get_theme_mod('angel_top_bar_email')) : ?>
                          <li class="email_address"><i class="fa fa-envelope"></i><a href="mailto:<?php echo get_theme_mod('angel_top_bar_email') ?>"><?php echo get_theme_mod('angel_top_bar_email', 'mail@gmail.com') ?></a></li>
                        <?php else : ?>
                          <li class="email_address"><i class="fa fa-envelope"></i><a href="#"><?php echo __('mail@gmail.com','angel');?> </a></li>
                        <?php endif ?>
                        
                        <?php if (get_theme_mod('angel_top_bar_phone')) : ?>
                          <li class="phone_number"><i class="fa fa-phone"></i><span><?php echo get_theme_mod('angel_top_bar_phone') ?></span></li>
                        <?php else : ?>
                          <li class="phone_number"><i class="fa fa-phone"></i><span><?php echo __('+88 0167234','angel');?> </span></li>
                        <?php endif ?>
                       
                      </ul>
                    </div>
                </div>
              <?php else: ?>
                <ul class="list-inline">
                  <?php if (get_theme_mod('angel_top_bar_email')) : ?>
                    <li class="email_address"><i class="fa fa-envelope"></i><a href="mailto:<?php echo get_theme_mod('angel_top_bar_email') ?>"><?php echo get_theme_mod('angel_top_bar_email', 'mail@gmail.com') ?></a></li>
                  <?php else : ?>
                    <li class="email_address"><i class="fa fa-envelope"></i><a href="#">mail@gmail.com</a></li>
                  <?php endif ?>
                  
                  <?php if (get_theme_mod('angel_top_bar_phone')) : ?>
                    <li class="phone_number"><i class="fa fa-phone"></i><span><?php echo get_theme_mod('angel_top_bar_phone') ?></span></li>
                  <?php else : ?>
                    <li class="phone_number"><i class="fa fa-phone"></i><span>+88 0167234 </span></li>
                  <?php endif ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        
        <nav class="navigation navbar-default lightHeader navbar" id="menuBar">
          <div class="containere">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <?php if(get_theme_mod('angel_header_logo_into_div_setting')) : ?>
                    <a class="navbar-brand-in-container" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if (!get_theme_mod('angel_header_logo')) : ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" alt="<?php echo bloginfo('title') ?>">
                        <?php else : ?>
                        <img src="<?php echo get_theme_mod('angel_header_logo'); ?>" alt="<?php echo bloginfo('title') ?>">
                        <?php endif; ?>
                    </a>
                <?php else: ?>
                    <a style="padding-top:<?php echo get_theme_mod('angel_logo_top_bottom_padding_settings') ?>px ; padding-bottom:<?php echo get_theme_mod('angel_logo_top_bottom_padding_settings') ?>px;padding-left:<?php echo get_theme_mod('angel_logo_left_right_padding_settings') ?>px;padding-right:<?php echo get_theme_mod('angel_logo_left_right_padding_settings') ?>px" class="navbar-brand logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (!get_theme_mod('angel_header_logo')) : ?>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" alt="<?php echo bloginfo('title') ?>">
                    <?php else : ?>
                    <img src="<?php echo get_theme_mod('angel_header_logo'); ?>" alt="<?php echo bloginfo('title') ?>">
                    <?php endif; ?>
                    </a>
                <?php endif; ?>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse header-version-2-nav">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav navbar-nav menu main-menu navbar-right')); ?>
                </div><!-- /.navbar-collapse -->
                
                <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && get_theme_mod('show_mini_cart_setting')) {
                $count = WC()->cart->cart_contents_count; ?>
                <div class="cart_btn">

                <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'angel'); ?>">
                    <i class="fa fa-shopping-basket"></i> <span class="cart-contents-count"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count(), 'angel'), WC()->cart->get_cart_contents_count()); ?></span>
                </a>

                </div>
                <?php 
                } ?>
          </div>
        </nav>
</header>

<div class="clearfif"></div>