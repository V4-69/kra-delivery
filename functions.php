<?php

/*     add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

    function enqueue_parent_styles() {
       wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css', '', '1.6' );
    } */

    add_action( 'wp_enqueue_scripts', 'enqueue_main_styles' );
    function enqueue_main_styles() {
      wp_enqueue_style( 'main-style', get_stylesheet_directory_uri().'/style.css', '', '1.0.4' );
    }

    add_action( 'wp_enqueue_scripts', 'parallax_method' );

    function parallax_method(){
        wp_enqueue_script( 'parallax-script', get_stylesheet_directory_uri(). '/js/parallax.min.js');
    }

    function mytheme_add_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

    add_filter( 'excerpt_length', function(){
      return 30;
    } );


    //remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    //remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
    //remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
?>
