<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://Jhonaiquel.com
 * @since      1.0.0
 *
 * @package    Custom_Woocommerce_Features
 * @subpackage Custom_Woocommerce_Features/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Woocommerce_Features
 * @subpackage Custom_Woocommerce_Features/includes
 * @author     Jhonaiquel Rodríguez <jhonaiquel@gmail.com>
 */
class Custom_Woocommerce_Features_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-woocommerce-features',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
