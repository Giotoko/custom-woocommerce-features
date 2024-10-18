<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://Jhonaiquel.com
 * @since      1.0.0
 *
 * @package    Custom_Woocommerce_Features
 * @subpackage Custom_Woocommerce_Features/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Woocommerce_Features
 * @subpackage Custom_Woocommerce_Features/admin
 * @author     Jhonaiquel Rodríguez <jhonaiquel@gmail.com>
 */
class Custom_Woocommerce_Features_Admin
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/custom-woocommerce-features-admin.css', array(), $this->version, 'all');
		wp_enqueue_style('bootstrap-css', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
		//podría usar también Bulma o cualquier otra libreria de css ;)

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/custom-woocommerce-features-admin.js', array('jquery'), $this->version, false);
		wp_enqueue_script('bootstrap-js', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), $this->version, false);
	}

	/**
	 * Register plugin menus.
	 *
	 * register menus.
	 *
	 * @since    1.0.0
	 */
	public static function register_menus()
	{
		add_menu_page('Custom Woocommerce features', 'Custom Woocommerce features', 'manage_options', 'woocommerce-features-menu', array(__CLASS__, 'custom_woocommerce_features_page'), 'dashicons-smiley', 3);
	}

	/**
	 * Register plugin page.
	 *
	 * register admin page.
	 *
	 * @since    1.0.0
	 */
	public static function custom_woocommerce_features_page()
	{
		include_once plugin_dir_path(__FILE__) . 'partials\custom-woocommerce-features-admin-display.php';
	}

	/**
	 * Register plugin settings.
	 *
	 * register custom plugin settings fields.
	 *
	 * @since    1.0.0
	 */
	public function register_plugin_settings()
	{
		register_setting('custom-woocommerce-features-settings', 'text');
		register_setting('custom-woocommerce-features-settings', 'monto1');
		register_setting('custom-woocommerce-features-settings', 'porcentaje1');
		register_setting('custom-woocommerce-features-settings', 'monto2');
		register_setting('custom-woocommerce-features-settings', 'porcentaje2');
	}

	/**
	 * shows message if woocommerce is not installed or activated.
	 *
	 * shows admin error message.
	 *
	 * @since    1.0.0
	 */
	public function no_woocommerce_message(){
		echo '<div class="alert alert-danger notice is-dismissible">
        <p> Este plugin utiliza Woocommerce y no puede funcionar sin él, asegúrate que Woocommerce está instalado y activado</p>
    </div>';
	}
}
