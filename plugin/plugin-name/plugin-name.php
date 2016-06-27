<?php
/**
 * Plugin Name:     Plugin Name
 * Plugin URI:      https://plugin-name.com
 * Description:     Plugin Description.
 * Version:         1.0.0
 * Author:          Your Name
 * Author URI:      https://your-name.com
 * Text Domain:     plugin-name
 *
 * @package         PluginName
 * @author          Your Name
 * @copyright       Copyright (c) Your Name
 *
 *
 * WordPress Plugin Boilerplate
 * Source: https://github.com/flowdee/wordpress-plugin-boilerplate
 *
 * Copyright (c) 2016 - flowdee ( https://twitter.com/flowdee )
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'Plugin_Name' ) ) {

    /**
     * Main Plugin_Name class
     *
     * @since       1.0.0
     */
    class Plugin_Name {

        /**
         * @var         Plugin_Name $instance The one true Plugin_Name
         * @since       1.0.0
         */
        private static $instance;


        /**
         * Get active instance
         *
         * @access      public
         * @since       1.0.0
         * @return      object self::$instance The one true Plugin_Name
         */
        public static function instance() {
            if( !self::$instance ) {
                self::$instance = new Plugin_Name();
                self::$instance->setup_constants();
                self::$instance->includes();
                self::$instance->load_textdomain();
            }

            return self::$instance;
        }


        /**
         * Setup plugin constants
         *
         * @access      private
         * @since       1.0.0
         * @return      void
         */
        private function setup_constants() {

            // Plugin name
            define( 'PLUGIN_NAME_NAME', 'Plugin Name' );

            // Plugin version
            define( 'PLUGIN_NAME_VER', '1.0.0' );

            // Plugin path
            define( 'PLUGIN_NAME_DIR', plugin_dir_path( __FILE__ ) );

            // Plugin URL
            define( 'PLUGIN_NAME_URL', plugin_dir_url( __FILE__ ) );
        }
        
        /**
         * Include necessary files
         *
         * @access      private
         * @since       1.0.0
         * @return      void
         */
        private function includes() {

            // Basic
            require_once PLUGIN_NAME_DIR . 'includes/helper.php';
            require_once PLUGIN_NAME_DIR . 'includes/scripts.php';

            // Admin only
            if ( is_admin() ) {
                require_once PLUGIN_NAME_DIR . 'includes/admin/plugins.php';
                require_once PLUGIN_NAME_DIR . 'includes/admin/class.settings.php';
            }

            // Anything else
            require_once PLUGIN_NAME_DIR . 'includes/functions.php';
        }

        /**
         * Internationalization
         *
         * @access      public
         * @since       1.0.0
         * @return      void
         */
        public function load_textdomain() {
            // Set filter for language directory
            $lang_dir = PLUGIN_NAME_DIR . '/languages/';
            $lang_dir = apply_filters( 'plugin_name_languages_directory', $lang_dir );

            // Traditional WordPress plugin locale filter
            $locale = apply_filters( 'plugin_locale', get_locale(), 'plugin-name' );
            $mofile = sprintf( '%1$s-%2$s.mo', 'plugin-name', $locale );

            // Setup paths to current locale file
            $mofile_local   = $lang_dir . $mofile;
            $mofile_global  = WP_LANG_DIR . '/plugin-name/' . $mofile;

            if( file_exists( $mofile_global ) ) {
                // Look in global /wp-content/languages/plugin-name/ folder
                load_textdomain( 'plugin-name', $mofile_global );
            } elseif( file_exists( $mofile_local ) ) {
                // Look in local /wp-content/plugins/plugin-name/languages/ folder
                load_textdomain( 'plugin-name', $mofile_local );
            } else {
                // Load the default language files
                load_plugin_textdomain( 'plugin-name', false, $lang_dir );
            }
        }
    }
} // End if class_exists check

/**
 * The main function responsible for returning the one true Plugin_Name
 * instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \Plugin_Name The one true Plugin_Name
 *
 */
function plugin_prefix_load() {
    return Plugin_Name::instance();
}
add_action( 'plugins_loaded', 'plugin_prefix_load' );

/**
 * The activation hook
 */
function plugin_prefix_activation() {
    // Create your tables here
}
register_activation_hook( __FILE__, 'plugin_prefix_activation' );

/**
 * The deactivation hook
 */
function plugin_prefix_deactivation() {
    // Cleanup your tables, transients etc. here
}
register_deactivation_hook(__FILE__, 'plugin_prefix_deactivation');