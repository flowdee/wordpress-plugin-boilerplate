<?php
/**
 * Helper
 *
 * @package     PluginName\Helper
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Public assets folder
 */
function plugin_prefix_the_assets() {
    echo PLUGIN_NAME_URL . 'assets';
}

/*
 * Better debugging
 */
function plugin_prefix_debug( $args, $title = false ) {

    if ( $title ) {
        echo '<h3>' . $title . '</h3>';
    }

    if ( $args ) {
        echo '<pre>';
        print_r($args);
        echo '</pre>';
    }
}

