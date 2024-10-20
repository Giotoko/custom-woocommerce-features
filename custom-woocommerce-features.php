<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://Jhonaiquel.com
 * @since             1.0.0
 * @package           Custom_Woocommerce_Features
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Woocommerce features
 * Plugin URI:        https://jhonaiquel.com
 * Description:       A simple Woocommerce plugin
 * Version:           1.0.0
 * Author:            Jhonaiquel Rodríguez
 * Author URI:        https://Jhonaiquel.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-woocommerce-features
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CUSTOM_WOOCOMMERCE_FEATURES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-woocommerce-features-activator.php
 */
function activate_custom_woocommerce_features() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-woocommerce-features-activator.php';
	Custom_Woocommerce_Features_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-woocommerce-features-deactivator.php
 */
function deactivate_custom_woocommerce_features() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-woocommerce-features-deactivator.php';
	Custom_Woocommerce_Features_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_woocommerce_features' );
register_deactivation_hook( __FILE__, 'deactivate_custom_woocommerce_features' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-woocommerce-features.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_woocommerce_features() {

	$plugin = new Custom_Woocommerce_Features();
	$plugin->run();

}
run_custom_woocommerce_features();
