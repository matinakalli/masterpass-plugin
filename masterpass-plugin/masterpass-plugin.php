<?php
   /*
   Plugin Name: MasterPass Plugin
   Plugin URI: 
   description: A plugin to connect masterpass payments
   Author: Matina Kallivoka
   Version: 1.0
   Author email: matina.246@hotmail.com
   */

// Include our Gateway Class and register Payment Gateway with WooCommerce
add_action( 'plugins_loaded', 'masterpass_gateway_init', 0 );
function masterpass_gateway_init() {
	// If the parent WC_Payment_Gateway class doesn't exist
	// it means WooCommerce is not installed on the site
	// so do nothing
	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;
	
	// If we made it this far, then include our Gateway Class
	include_once( 'masterpassGateway_class.php' );

	// Now that we have successfully included our class,
	// Lets add it too WooCommerce
	add_filter( 'woocommerce_payment_gateways', 'add_masterpass_gateway' );
	function add_masterpass_gateway( $methods ) {
		$methods[] = 'WC_Gateway_MasterPass';
		return $methods;
	}
}
?>


