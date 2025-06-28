<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Theme setup
function gangculture_setup() {
    load_theme_textdomain( 'gangculture', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'gangculture' )
    ) );
}
add_action( 'after_setup_theme', 'gangculture_setup' );

// Enqueue scripts and styles
function gangculture_scripts() {
    wp_enqueue_style( 'gangculture-style', get_stylesheet_uri(), array(), '1.0' );
    wp_enqueue_script( 'gangculture-parallax', get_template_directory_uri() . '/js/parallax.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'gangculture_scripts' );

// Custom post type for music singles
function gangculture_register_single_cpt() {
    $labels = array(
        'name' => __( 'Singles', 'gangculture' ),
        'singular_name' => __( 'Single', 'gangculture' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive' => true,
        'show_in_rest' => true,
    );
    register_post_type( 'single', $args );
}
add_action( 'init', 'gangculture_register_single_cpt' );

// Reservation form shortcode
function gangculture_reservation_shortcode() {
    ob_start();
    echo '<div id="reservation-calendar"></div>';
    echo '<form id="reservation-form">';
    echo '<label>' . __( 'Date', 'gangculture' ) . '<input type="date" name="res_date" required></label>';
    echo '<label>' . __( 'Type', 'gangculture' ) . '<select name="res_type"><option>' . __( 'With engineer', 'gangculture' ) . '</option><option>' . __( 'Without engineer', 'gangculture' ) . '</option><option>' . __( 'Space only', 'gangculture' ) . '</option></select></label>';
    echo '<button class="gang-btn" type="submit">' . __( 'Reserve', 'gangculture' ) . '</button>';
    echo '</form>';
    return ob_get_clean();
}
add_shortcode( 'gang_reservation', 'gangculture_reservation_shortcode' );

// Simple button shortcode
function gangculture_button_shortcode( $atts, $content = null ) {
    return '<a class="gang-btn" href="#">' . do_shortcode( $content ) . '</a>';
}
add_shortcode( 'gang_button', 'gangculture_button_shortcode' );

// Graffiti Icon Widget
class Graffiti_Icon_Widget extends WP_Widget {
    function __construct() {
        parent::__construct( 'graffiti_icon', __( 'Graffiti Icon', 'gangculture' ) );
    }
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<span class="graffiti-icon">&#x1F58C;</span>';
        echo $args['after_widget'];
    }
}
function gangculture_register_widgets() {
    register_widget( 'Graffiti_Icon_Widget' );
}
add_action( 'widgets_init', 'gangculture_register_widgets' );
?>
