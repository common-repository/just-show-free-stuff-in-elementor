<?php
/**
* Plugin Name
*
* @package           PluginPackage
* @author            Michael Gangolf
* @copyright         2024 Michael Gangolf
* @license           GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name:       Just show free stuff in Elementor
* Description:       This plug-in will remove/hide pro features so the interface will be a bit cleaner.
* Version:           1.0.4
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Michael Gangolf
* Author URI:        https://www.migaweb.de/
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

add_action('admin_menu', 'miga_elementor_free_styles_menu', 801);
add_action('admin_enqueue_scripts', 'miga_elementor_free_styles_menu_scripts');

function miga_elementor_free_styles_menu()
{
    if (! did_action('elementor/loaded')) {
        return false;
    }
    remove_submenu_page('elementor', 'e-form-submissions');
    remove_submenu_page('elementor', 'elementor_custom_fonts');
    remove_submenu_page('elementor', 'elementor_custom_icons');
    remove_submenu_page('elementor', 'elementor_custom_custom_code');
    remove_submenu_page('elementor', 'go_elementor_pro');
}

function miga_elementor_free_styles_menu_scripts()
{
    wp_enqueue_style('miga_elementor_free_styles', plugins_url('styles/main.css', __FILE__));
}

add_action('elementor/editor/before_enqueue_scripts', function () {
    wp_enqueue_style('admin-styles', plugins_url('styles/main.css', __FILE__));
});
