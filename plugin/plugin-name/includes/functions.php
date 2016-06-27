<?php
/**
 * Functions
 *
 * @package     PluginName\Functions
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get options
 *
 * return array options or empty when not available
 */
function plugin_prefix_get_options() {
    return get_option( 'plugin_name', array() );
}

/**
 * Example function which uses your settings
 */
function plugin_prefix_my_first_function() {

    // Using the plugin option on any place
    $options = plugin_prefix_get_options();

    if ( isset( $options['select_01'] ) ) {
        echo $options['select_01'];
    }
}