<?php
/**
 * Settings
 *
 * Source: https://codex.wordpress.org/Settings_API
 *
 * @package     PluginName\Settings
 * @since       1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


if (!class_exists('Plugin_Name_Settings')) {

    class Plugin_Name_Settings
    {
        public $options;

        public function __construct()
        {
            // Options
            $this->options = get_option('plugin_name');

            // Initialize
            add_action('admin_menu', array( &$this, 'add_admin_menu') );
            add_action('admin_init', array( &$this, 'init_settings') );
        }

        function add_admin_menu()
        {
            /*
             * Source: https://codex.wordpress.org/Function_Reference/add_options_page
             */
            add_options_page(
                'Plugin Name', // Page title
                'Plugin Name', // Menu title
                'manage_options', // Capabilities
                'plugin_name', // Menu slug
                array( &$this, 'options_page' ) // Callback
            );

        }

        function init_settings()
        {
            register_setting(
                'plugin_name',
                'plugin_name',
                array( &$this, 'validate_input_callback' )
            );

            // SECTION ONE
            add_settings_section(
                'plugin_name_section_one',
                __('Section One', 'plugin-name'),
               false,
                'plugin_name'
            );

            add_settings_field(
                'plugin_name_text_field_01',
                __('Text Field', 'plugin-name'),
                array(&$this, 'text_field_01_render'),
                'plugin_name',
                'plugin_name_section_one',
                array('label_for' => 'plugin_name_text_field_01')
            );

            add_settings_field(
                'plugin_name_select_field_01',
                __('Select Field', 'plugin-name'),
                array(&$this, 'select_field_01_render'),
                'plugin_name',
                'plugin_name_section_one',
                array('label_for' => 'plugin_name_select_field_01')
            );

            add_settings_field(
                'plugin_name_checkbox_field_01',
                __('Checkbox Field', 'plugin-name'),
                array(&$this, 'checkbox_field_01_render'),
                'plugin_name',
                'plugin_name_section_one',
                array('label_for' => 'plugin_name_checkbox_field_01')
            );

            // SECTION TWO
            add_settings_section(
                'plugin_name_section_two',
                __('Section Two', 'plugin-name'),
                array( &$this, 'section_two_render' ), // Optional you can output a description for each section
                'plugin_name'
            );

            add_settings_field(
                'plugin_name_text_field_02',
                __('Text Field', 'plugin-name'),
                array(&$this, 'text_field_02_render'),
                'plugin_name',
                'plugin_name_section_two',
                array('label_for' => 'plugin_name_text_field_02')
            );

        }

        function validate_input_callback( $input ) {

            /*
             * Here you can validate (and manipulate) the user input before saving to the database
             */

            return $input;
        }

        function section_two_render() {
            ?>

            <p>Section two description...</p>

            <?php
        }

        function text_field_01_render() {

            $text = ( ! empty($this->options['text_01'] ) ) ? esc_attr( trim($this->options['text_01'] ) ) : ''

            ?>
            <input type="text" name="plugin_name[text_01]" id="plugin_name_text_field_01" value="<?php echo esc_attr( trim( $text ) ); ?>" />
            <?php
        }

        function select_field_01_render() {

            $select_options = array(
                '0' => __('Please select...', 'plugin-name'),
                '1' => __('Option One', 'plugin-name'),
                '2' => __('Option Two', 'plugin-name'),
                '3' => __('Option Three', 'plugin-name')
            );

            $selected = ( isset ( $this->options['select_01'] ) ) ? $this->options['select_01'] : '0';

            ?>
            <select id="plugin_name_select_field_01" name="plugin_name[select_01]">
                <?php foreach ( $select_options as $key => $label ) { ?>
                    <option value="<?php echo $key; ?>" <?php selected( $selected, $key ); ?>><?php echo $label; ?></option>
                <?php } ?>
            </select>
            <?php
        }

        function checkbox_field_01_render() { 

            $checked = ( isset ( $this->options['checkbox_01'] ) && $this->options['checkbox_01'] == '1' ) ? 1 : 0;
            ?>

                <input type="checkbox" id="plugin_name_checkbox_field_01" name="plugin_name[checkbox_01]" value="1" <?php echo($checked == 1 ? 'checked' : ''); ?> />
                <label for="plugin_name_checkbox_field_01"><?php _e('Activate in order to do some cool stuff.', 'plugin-name'); ?></label>
            <?php
        }

        function text_field_02_render() {

            $text = ( ! empty($this->options['text_02'] ) ) ? esc_attr( trim($this->options['text_02'] ) ) : ''

            ?>
            <input type="text" name="plugin_name[text_02]" id="plugin_name_text_field_02" value="<?php echo esc_attr( trim( $text ) ); ?>" />
            <?php
        }

        function options_page() {
            ?>

            <div class="wrap">
                <?php screen_icon(); ?>
                <h2><?php _e('Plugin Name', 'plugin-name'); ?></h2>

                <form action="options.php" method="post">
                    <?php
                    settings_fields( 'plugin_name' );
                    do_settings_sections( 'plugin_name' );
                    ?>
                </form>

                <p><?php submit_button( 'Save Changes', 'button-primary', 'submit', false ); ?></p>
            </div>
            <?php
        }
    }
}

new Plugin_Name_Settings();