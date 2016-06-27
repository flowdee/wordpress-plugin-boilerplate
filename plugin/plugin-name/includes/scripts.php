<?php
/**
 * Scripts
 *
 * @package     PluginName\Scripts
 * @since       1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Load admin scripts
 *
 * @since       1.0.0
 * @global      string $post_type The type of post that we are editing
 * @return      void
 */
function plugin_prefix_admin_scripts( $hook ) {

    // Use minified libraries if SCRIPT_DEBUG is turned off
    $suffix = ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ) ? '' : '.min';

    /**
     *	Settings page only
     */
    $screen = get_current_screen();

    if ( ! empty( $screen->base ) && ( $screen->base == 'settings_page_plugin_name' || $screen->base == 'widgets' ) ) {

        wp_enqueue_script( 'plugin_name_admin_js', PLUGIN_NAME_URL . '/assets/js/admin' . $suffix . '.js', array( 'jquery' ), PLUGIN_NAME_VER );
        wp_enqueue_style( 'plugin_name_admin_css', PLUGIN_NAME_URL . '/assets/css/admin' . $suffix . '.css', false, PLUGIN_NAME_VER );
    }
}
add_action( 'admin_enqueue_scripts', 'plugin_prefix_admin_scripts', 100 );

/**
 * Load frontend scripts
 *
 * @since       1.0.0
 * @return      void
 */
function plugin_prefix_scripts( $hook ) {

    /* TODO: Variant 1 - Output the scripts only after using a shortocde
    global $post;

    if( ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'your_shortcode') ) ) {

        // Use minified libraries if SCRIPT_DEBUG is turned off
        $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

        wp_enqueue_script( 'plugin_name_scripts', PLUGIN_NAME_URL . 'assets/js/scripts' . $suffix . '.js', array( 'jquery' ), PLUGIN_NAME_VER, true );
        wp_enqueue_style( 'plugin_name_styles', PLUGIN_NAME_URL . 'assets/css/styles' . $suffix . '.css', false, PLUGIN_NAME_VER );

    }
    */

    //TODO: Variant 2 - Output the scripts on every single post/page
    // Use minified libraries if SCRIPT_DEBUG is turned off
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_script( 'plugin_name_scripts', PLUGIN_NAME_URL . 'assets/js/scripts' . $suffix . '.js', array( 'jquery' ), PLUGIN_NAME_VER, true );
    wp_enqueue_style( 'plugin_name_styles', PLUGIN_NAME_URL . 'assets/css/styles' . $suffix . '.css', false, PLUGIN_NAME_VER );

}
add_action( 'wp_enqueue_scripts', 'plugin_prefix_scripts' );