<?php
/**
 * Web Component Demo Start
 *
 * @package Web_Component
 */

/**
 * Start up.
 */
class Webcomponent_Demo_Start extends Webcomponent_Core {
	/**
	 * Enqueue JavaScript.
	 *
	 * @var Webcomponent_Demo_Enqueue
	 */
	public $enqueue;

	/**
	 * Hooks for the shortcode render.
	 *
	 * @var Webcomponent_Demo_Shortcode
	 */
	public $shortcode;

	/**
	 * Assign local classes.
	 */
	public function init() {
		$this->enqueue   = new Webcomponent_Demo_Enqueue( $this->main );
		$this->shortcode = new Webcomponent_Demo_Shortcode( $this->main );
	}
}
