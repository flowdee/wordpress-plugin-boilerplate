<?php
/**
 * Settings
 *
 * @package     PluginName\Admin\Plugins
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Plugins row action links
 *
 * @param array $links already defined action links
 * @param string $file plugin file path and name being processed
 * @return array $links
 */
function plugin_prefix_action_links( $links, $file ) {

    $settings_link = '<a href="' . admin_url( 'options-general.php?page=plugin_name' ) . '">' . esc_html__( 'Settings', 'plugin-name' ) . '</a>';

    if ( $file == 'plugin-name/plugin-name.php' )
        array_unshift( $links, $settings_link );

    return $links;
}
add_filter( 'plugin_action_links', 'plugin_prefix_action_links', 10, 2 );

/**
 * Plugin row meta links
 *
 * @param array $input already defined meta links
 * @param string $file plugin file path and name being processed
 * @return array $input
 */
function plugin_prefix_row_meta( $input, $file ) {

    if ( $file != 'plugin-name/plugin-name.php' )
        return $input;

    $custom_link = esc_url( add_query_arg( array(
            'utm_source'   => 'plugins-page',
            'utm_medium'   => 'plugin-row',
            'utm_campaign' => 'Plugin Name',
        ), 'https://plugin-name.com/' )
    );

    $links = array(
        '<a href="' . $custom_link . '">' . esc_html__( 'Example Link', 'plugin-name' ) . '</a>',
    );

    $input = array_merge( $input, $links );

    return $input;
}
add_filter( 'plugin_row_meta', 'plugin_prefix_row_meta', 10, 2 );