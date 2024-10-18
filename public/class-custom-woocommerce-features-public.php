<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://Jhonaiquel.com
 * @since      1.0.0
 *
 * @package    Custom_Woocommerce_Features
 * @subpackage Custom_Woocommerce_Features/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Custom_Woocommerce_Features
 * @subpackage Custom_Woocommerce_Features/public
 * @author     Jhonaiquel Rodríguez <jhonaiquel@gmail.com>
 */
class Custom_Woocommerce_Features_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Woocommerce_Features_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Woocommerce_Features_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/custom-woocommerce-features-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Woocommerce_Features_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Woocommerce_Features_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/custom-woocommerce-features-public.js', array('jquery'), $this->version, false);
	}


	/**
	 * Prints a message to Woocommerce Checkout screen.
	 *
	 * @since    1.0.0
	 */
	public function print_message()
	{

		$text = get_option('text') ?? " no text ";
		$amount1 = get_option('monto1') ?? 0;
		$percentage1 = get_option('porcentaje1') ?? 0;
		$amount2 = get_option('monto2') ?? 0;
		$percentage2 = get_option('porcentaje2') ?? 0;
		$cart_total = 0;

		if (is_checkout() && ! is_wc_endpoint_url() && WC()->cart) {
			$cart_total = WC()->cart->subtotal;
			if ($cart_total < $amount1 && $cart_total < $amount2) {

				$text = str_replace('{monto}', $amount1 . '$', $text);
				$text = str_replace('{porcentaje}', $percentage1 . '%', $text);

				wc_print_notice($text, 'notice'); //Woocommerce < 8.3
			} elseif ($cart_total >= $amount1 && $cart_total < $amount2) {

				$text = str_replace('{monto}', $amount2 . '$', $text);
				$text = str_replace('{porcentaje}', $percentage2 . '%', $text);

				wc_print_notice($text, 'notice');

			} else {

				wc_print_notice('¡mientras mas compras mas ahorras!', 'notice');
			}
		}
	}
}
