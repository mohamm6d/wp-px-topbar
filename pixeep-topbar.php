<?php

/**
Plugin Name: Pixeep TopBar
Author: Mohammad
 */

defined('ABSPATH') or die;
include_once ABSPATH . 'wp-admin/includes/plugin.php';

$pluginName = 'pixeep-topbar';

if (in_array("$pluginName/$pluginName.php", apply_filters('active_plugins', get_option('active_plugins')))) {

    function sample_admin_notice__error()
    {
        $class = 'notice notice-error notice error my-acf-notice is-dismissible';
        $message = __('Irks! An error has occurred.', 'sample-text-domain');

        printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
    }
    add_action('admin_notices', 'sample_admin_notice__error');

    function custom_content_after_body_open_tag()
    {
        global $woocommerce;
        $options = get_option('px_topbar_settings');
        $amount = $woocommerce->cart->cart_contents_total + $woocommerce->cart->tax_total;
        $total = $woocommerce->cart->total;

        if ($options['minimum_card'] < $total) {

            echo '<div style="background:black;color:white;padding:10px;text-align:center;display:block;width:100%;">' . $options['text_message'] . '</div>';
        }

    }

    add_action('after_body_open_tag', 'custom_content_after_body_open_tag');

    add_action('admin_menu', 'px_topbar_add_admin_menu');
    add_action('admin_init', 'px_topbar_settings_init');

   

    include (dirname(__FILE__) . '/functions.php');

}