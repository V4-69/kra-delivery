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
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="header site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">
            
                <div class="row py-2">
                    <div class="col-xl-4 col-10 col-logo">
                        <a href="<?php echo esc_url( home_url( '/' )); ?>" class="logo-ref">
                            <div class = "row">
                                <div class = "col-auto pr-1">
                                    <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" class="logo" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </div>
                                <div class = "col-auto text-logo px-0">
                                    <div class = "col px-0 d-flex align-items-end">
                                        <span class = "header-name">
                                            <?php esc_url(bloginfo('name')); ?>
                                        </span>
                                    </div> 
                                    <div class = "col px-0 d-flex align-items-start">
                                        <span class = "header-description">
                                            <?php esc_url(bloginfo('description')); ?>
                                        </span>
                                    </div>
                                </div>  
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-xl-8 col-2 d-flex justify-content-end">
                      <nav class="navbar navbar-expand-xl p-0">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                          </button>

                          <?php
                          wp_nav_menu(array(
                          'theme_location'    => 'primary',
                          'container'       => 'div',
                          'container_id'    => 'main-nav',
                          'container_class' => 'collapse navbar-collapse justify-content-end',
                          'menu_id'         => false,
                          'menu_class'      => 'navbar-nav',
                          'depth'           => 3,
                          'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                          'walker'          => new wp_bootstrap_navwalker()
                          ));
                          ?>
                      </nav>
                    </div>
                    
                </div>
          
        
        </div>
	</header><!-- #masthead -->
    

    <?php endif; ?>
<div id="content" class="site-content site-content-main">
    <div class="container">
        <div class="row">