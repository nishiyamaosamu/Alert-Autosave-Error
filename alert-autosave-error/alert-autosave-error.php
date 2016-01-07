<?php
/*
Plugin Name: Alert Autosave Error
Plugin URI: https://github.com/nishiyamaosamu/Alert-Autosave-Error
Description: Avoid losing data after nonces expire
Author: Osamu Nishiyama
Version: 0.2
Author URI: https://github.com/nishiyamaosamu
*/

add_action( 'plugins_loaded', array( 'Alert_Autosave_Error', 'get_object' ) );


class Alert_Autosave_Error {

    public static function get_object() {
        static $instance;
        if ( NULL === $instance ) {
            $instance = new self();
        }
        return $instance;
    }

    private function __construct() {
        if ( ! is_admin() ) {
            return;
        }
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts') );
    }

    public function admin_enqueue_scripts( $hook_suffix ) {
        if ( 'post-new.php' === $hook_suffix || 'post.php' === $hook_suffix ) {
            wp_enqueue_script(
                'alert-autosave-error',
                plugins_url( 'js/alert-autosave-error.js', __FILE__ ),
                array( 'jquery' ),
                filemtime( dirname( __FILE__ ) . '/js/alert-autosave-error.js' ),
                true
            );
        }
    }
}
