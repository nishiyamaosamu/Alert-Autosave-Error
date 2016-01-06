<?php
/*
Plugin Name: Alert Autosave Error
Plugin URI: https://github.com/nishiyamaosamu/Alert-Autosave-Error
Description: Avoid losing data after nonces expire
Author: Osamu Nishiyama
Version: 0.1
Author URI: https://github.com/nishiyamaosamu
*/

add_action( 'plugins_loaded', 'my_plugins_loaded' );

/**
 * Fires on plugins_loaded hook.
 */
function my_plugins_loaded()
{
    add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts' );
}

/**
 * Fires on admin_enqueue_scripts hook
 */
function admin_enqueue_scripts( $hook_suffix )
{
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
