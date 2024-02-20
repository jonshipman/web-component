<?php
/**
 * Enqueue for Svelte Components
 *
 * @package Web_Component
 */

/**
 * Global Scripts Class.
 */
class Webcomponent_Demo_Enqueue extends Webcomponent_Core {
	/**
	 * WordPress Hooks.
	 */
	public function hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Enqueues the assets.
	 */
	public function enqueue() {
		$assets = require_once WEBCOMPONENT_PATH . '/assets/js/web-component-demo.asset.php';

		wp_register_script( 'web-component-demo-js', plugins_url( '/assets/js/web-component-demo.js', WEBCOMPONENT_FILE ), $assets['dependencies'], $assets['version'], true );

		$data = array(
			'plugin_url' => plugins_url( '', WEBCOMPONENT_FILE ),
		);

		$data = apply_filters( 'webcomponent_demo_inline_js', $data );

		wp_add_inline_script(
			'web-component-demo-js',
			sprintf(
				'window.webcomponent = window.webcomponent||{};window.webcomponent.demo = window.webcomponent.demo||{};window.webcomponent.demo = Object.assign(window.webcomponent.demo, %s);',
				wp_json_encode( $data )
			),
			'before'
		);
	}
}
