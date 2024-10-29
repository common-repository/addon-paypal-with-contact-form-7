<?php
/**
* Plugin Name: Addon Paypal With Contact Form 7
* Description: This plugin allows create Addon Paypal With Contact Form 7 plugin.
* Version: 1.0
* Copyright: 2020
* Text Domain: addon-paypal-with-contact-form-7
* Domain Path: /languages 
*/

if (!defined('ABSPATH')) {
    die('-1');
}
if (!defined('CF7WPAY_PLUGIN_NAME')) {
    define('CF7WPAY_PLUGIN_NAME', 'Addon Paypal With Contact Form 7');
}
if (!defined('CF7WPAY_VERSION')) {
    define('CF7WPAY_VERSION', '1.0.0');
}
if (!defined('CF7WPAY_PATH')) {
    define('CF7WPAY_PATH', __FILE__);
}
if (!defined('CF7WPAY_PLUGIN_DIR')) {
    define('CF7WPAY_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('CF7WPAY_PLUGIN_FILE')) {
   define('CF7WPAY_PLUGIN_FILE', __FILE__);
}
if (!defined('CF7WPAY_DOMAIN')) {
    define('CF7WPAY_DOMAIN', 'addon-paypal-with-contact-form-7');
}
if (!defined('CF7WPAYPREFIX')) {
    define('CF7WPAYPREFIX', "cf7wpay_");
}
if (!defined('CF7WPAY_BASE_NAME')) {
    define('CF7WPAY_BASE_NAME', plugin_basename(CF7WPAY_PLUGIN_FILE));
}
if (!defined('CF7WPAY_PAGE_SLUG')) {
    define('CF7WPAY_PAGE_SLUG', "cfywpay_paypal_entries");
}
if (!defined('CF7WPAY_PAYPAL_VERSION')) {
    define('CF7WPAY_PAYPAL_VERSION', '1.1.8');
}


if (!class_exists('CF7WPAY')) {

    class CF7WPAY {

        protected static $instance;
        function includes() {
            include_once('admin/cfywpay-backend.php');
            include_once('admin/cfywpay-export-csv.php');
            include_once('admin/cfywpay-cf7-panel.php');
            include_once('admin/cfywpay-payment.php');

            if (!class_exists('Stripe\Stripe')) {
                include_once('includes/stripe_library/init.php');
            }
        }

        function CF7WPAY_plugin_row_meta( $links, $file ) {
            if ( CF7WPAY_BASE_NAME === $file ) {
                $row_meta = array(
                    'rating'    =>  '<a href="https://www.xeeshop.com/addon-paypal-and-stripe-with-contact-form-7/" target="_blank">Documentation</a> | <a href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress" target="_blank">Support</a> | <a href="https://wordpress.org/support/plugin/addon-paypal-with-contact-form-7/reviews/?filter=5" target="_blank"><img src="'.CF7WPAY_PLUGIN_DIR.'/includes/image/star.png" class="ocaddpapla_rating_div"></a>',
                );

                return array_merge( $links, $row_meta );
            }
            return (array) $links;
        }

         function init() {
                 session_start();
            global $wpdb;
            $table_name = $wpdb->prefix.'cf7wpay_forms';
            if( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ) {

                $charset_collate = $wpdb->get_charset_collate();

                $sql = "CREATE TABLE $table_name (
                    form_id bigint(20) NOT NULL AUTO_INCREMENT,
                    form_post_id bigint(20) NOT NULL,
                    form_value longtext NOT NULL,
                    form_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    PRIMARY KEY  (form_id)
                ) $charset_collate;";

                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                dbDelta( $sql );
            }

            $upload_dir      = wp_upload_dir();
            $cf7wpay_dirname = $upload_dir['basedir'].'/cf7wpay_uploads';
            if ( ! file_exists( $cf7wpay_dirname ) ) {
                wp_mkdir_p( $cf7wpay_dirname );
            }
            add_action( 'admin_enqueue_scripts', array($this, 'CF7WPAY_load_admin_script_style'));
            add_action('wp_enqueue_scripts',  array($this, 'CF7WPAY_load_front_script_style'));
            add_action( 'admin_init', array($this, 'CF7WPAY_load_plugin'), 11 );
            add_filter( 'plugin_row_meta', array( $this, 'CF7WPAY_plugin_row_meta' ), 10, 2 );
         }

        function CF7WPAY_load_front_script_style() {
            wp_enqueue_script('jquery', false, array(), false, false);
            wp_enqueue_style( 'CF7WPAY-front-style', CF7WPAY_PLUGIN_DIR . '/includes/css/front_style.css', false, '1.0.0' );
            wp_enqueue_script('cf7pp-stripe-checkout','https://js.stripe.com/v3/');
              wp_enqueue_script( 'CF7WPAY-front-script', CF7WPAY_PLUGIN_DIR . '/includes/js/front.js', false, '1.0.0' );
        }

        function CF7WPAY_load_admin_script_style() {
            wp_enqueue_style( 'CF7WPAY-back-style', CF7WPAY_PLUGIN_DIR . '/includes/css/back_style.css', false, '1.0.0' );
            wp_enqueue_script( 'CF7WPAY-back-script', CF7WPAY_PLUGIN_DIR . '/includes/js/back_script.js', false, '1.0.0' );
            $CF7WPAY_array_img = CF7WPAY_PLUGIN_DIR;
            wp_localize_script( 'CF7WPAY-back-script', 'CF7WPAY_name', array('CF7WPAY_array_img'=>$CF7WPAY_array_img) );
        }

        function CF7WPAY_load_plugin() {
          if ( ! ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) ) {
            add_action( 'admin_notices', array($this,'OCCF7CAL_install_error') );
          }
        }

      
        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
                self::$instance->includes();
            }
            return self::$instance;
        }
    }
    add_action('plugins_loaded', array('CF7WPAY', 'instance'));
}

add_action( 'plugins_loaded', 'CF7WPAY_load_textdomain' );
function CF7WPAY_load_textdomain() {
    load_plugin_textdomain( 'addon-paypal-with-contact-form-7', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

function CF7WPAY_load_my_own_textdomain( $mofile, $domain ) {
    if ( 'addon-paypal-with-contact-form-7' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}
add_filter( 'load_textdomain_mofile', 'CF7WPAY_load_my_own_textdomain', 10, 2 );