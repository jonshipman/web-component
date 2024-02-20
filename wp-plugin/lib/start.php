<?php
/**
 * Web Component Start
 *
 * @package Web_Component
 */

/**
 * Start up.
 */
class Webcomponent_Start {
	/**
	 * Demo subclass.
	 *
	 * @var Webcomponent_Demo_Start
	 */
	public $demo;

	/**
	 * WordPress hooks.
	 */
	public function __construct() {
		$this->demo = new Webcomponent_Demo_Start( $this );
	}
}
