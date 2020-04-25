<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e('Skip to content', 'wp-bootstrap-starter'); ?></a>
    <?php if (!is_page_template('blank-page.php') && !is_page_template('blank-page-with-container.php')): ?>
    <header id="masthead" class="fixed-top site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>"
            role="banner">
        <div class="container">
            <div class="row">
                <nav class="navbar w-100 navbar-dark navbar-expand-lg">
                    <div class="col-6 col-md-4 col-lg-2 col-sm-4 col-xs-4 navbar-brand">
                        <?php if (get_theme_mod('wp_bootstrap_starter_logo')): ?>
                            <a class="logo-white" href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url(get_theme_mod('wp_bootstrap_starter_logo')); ?>"
                                     alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        <?php else : ?>
                            <a class="site-title"
                               href="<?php echo esc_url(home_url('/')); ?>"><?php esc_url(bloginfo('name')); ?></a>
                        <?php endif; ?>


                        <a class="logo-black" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php $custom_logo_id = get_theme_mod('custom_logo');
                            $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
                            <img src="<?php echo $image[0]; ?>" class="img-fluid"
                                 alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>


                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => 'div',
                        'container_id' => 'main-nav navbarNavAltMarkup',
                        'container_class' => 'col-10 collapse navbar-collapse',
                        'menu_id' => false,
                        'menu_class' => 'navbar-nav ml-auto align-items-center',
                        'depth' => 3,
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker()
                    ));
                    ?>

                </nav>
            </div>
        </div>
    </header>
    <?php if (is_front_page() && !get_theme_mod('header_banner_visibility')): ?>
        <div id="page-sub-header"
             <?php if (has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if (get_theme_mod('header_banner_title_setting')) {
                        echo get_theme_mod('header_banner_title_setting');
                    } else {
                        echo 'WordPress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if (get_theme_mod('header_banner_tagline_setting')) {
                        echo get_theme_mod('header_banner_tagline_setting');
                    } else {
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize', 'wp-bootstrap-starter');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
    <div>
        <div>

            <?php endif; ?>
