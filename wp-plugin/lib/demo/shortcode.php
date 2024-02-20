<?php
/**
 * Web Component Demo Shortcode
 *
 * @package Web_Component
 */

/**
 * Adds the shortcodes for the roster.
 */
class Webcomponent_Demo_Shortcode extends Webcomponent_Core {
	/**
	 * Registers WordPress Hooks.
	 */
	public function hooks() {
		add_action( 'init', array( $this, 'attach_shortcode' ) );
	}

	/**
	 * Attaches shortcode during init action.
	 */
	public function attach_shortcode() {
		add_shortcode( 'web-component-demo', array( $this, 'output' ) );
	}

	/**
	 * Renders the output of web-component-demo.
	 */
	public function output() {
		wp_enqueue_script( 'web-component-demo-js' );

		return '<web-component-demo></web-component-demo>';
	}
}
