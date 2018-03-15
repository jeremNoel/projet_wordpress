<?php
/**
** activation theme
**/ 
/**
 * Proper way to enqueue scripts and styles
 */

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function header_widgets_init() {
 
 register_sidebar( array(

 'name' => 'Zone de widget pour header',
 'id' => 'widget-body',
 'before_widget' => '<div class="nwa-widget">',
 'after_widget' => '</div>',
 'before_title' => '<h2 class="widget-title">',
 'after_title' => '</h2>',
 ) );
}

add_action( 'widgets_init', 'header_widgets_init' );
 ?>

