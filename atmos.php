<?php
/**
 * @package Atmos6
 * @version 1.0
 */
/*
Plugin Name: Atmos6
Plugin URI: http://kageetai.net/
Description: Additional shortcodes and more for Atmos6.de
Author: Michael Seifarth
Version: 1.0
Author URI: http://kageetai.net/
*/

function atmos_sphere_shortcode( $atts ) {

    // Attributes
    $atts = shortcode_atts(
        array(
            'background_image'           => '',
            'background_image_secondary' => '',
            'top_text'                   => '',
            'top_text_secondary'         => '',
            'bottom_text'                => '',
            'bottom_text_secondary'      => '',
            'border_color'               => '#fff',
            'icon'                       => '',
            'icon_second'                => true,
        ),
        $atts,
        'atmos-sphere'
    );

    if (!$atts['background_image']) {
        return '';
    }

    $id     = rand( 1, 1000 );
    $output = '';
    $output .= '<div class="atmos-sphere" id="atmos-sphere-' . $id . '">';
    $output .= '  <div class="atmos-background">&nbsp;</div>';
    if ( $atts['background_image_secondary'] ) {
        $output .= '  <div class="atmos-background secondary">&nbsp;</div>';
    }
    $output .= '  <h3 class="atmos-title top">' . $atts['top_text'] . '</h3>';
    $output .= '  <h3 class="atmos-title top secondary">' . $atts['top_text_secondary'] . '</h3>';
    $output .= '  <h4 class="atmos-title bottom">' . $atts['bottom_text'] . '</h4>';
    $output .= '  <h4 class="atmos-title bottom secondary">' . $atts['bottom_text_secondary'] . '</h4>';
    if ( $atts['icon'] ) {
        $output .= '  <i class="atmos-icon fa ' . $atts['icon'] . '" aria-hidden="true"></i>';
    }
    $output .= '</div>';
    $output .= '<style>';
    if ( $atts['border_color'] ) {
        $output .= '#atmos-sphere-' . $id . '.atmos-sphere {';
        $output .= '  border: 3px solid ' . $atts['border_color'] . ';';
        $output .= '}';
        $output .= '#atmos-sphere-' . $id . '.atmos-sphere:before {';
        $output .= '  border: 1px solid ' . $atts['border_color'] . ';';
        $output .= '}';
    }
    if ( $atts['background_image'] ) {
        $output .= '#atmos-sphere-' . $id . '.atmos-sphere .atmos-background {';
        $output .= '  background-image: url('.$atts['background_image'].');';
        $output .= '}';
    }
    if ( $atts['background_image'] ) {
        $output .= '#atmos-sphere-' . $id . '.atmos-sphere .atmos-background .secondary {';
        $output .= '  background-image: url('.$atts['background_image'].');';
        $output .= '}';
    }
    $output .= '</style>';

    return $output;

}

add_shortcode( 'atmos-sphere', 'atmos_sphere_shortcode' );

function atmos_sphere() {
    wp_register_style( 'atmos-sphere-styles',  plugin_dir_url( __FILE__ ) . 'atmos.css' );
    wp_enqueue_style( 'atmos-sphere-styles' );
    wp_enqueue_script( 'atmos-sphere-scripts', plugin_dir_url( __FILE__ ) . 'atmos.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'atmos_sphere' );
