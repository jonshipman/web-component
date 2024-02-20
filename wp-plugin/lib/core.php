<?php
/**
 * Web Component Core
 *
 * @package Web_Component
 */

/**
 * Core plugin extension.
 */
class Webcomponent_Core {
	/**
	 * Base class.
	 *
	 * @var Webcomponent_Start
	 */
	protected $main;

	/**
	 * Adds main script to the class scope on initialization.
	 *
	 * @param Webcomponent_Start $main Start script.
	 */
	public function __construct( $main ) {
		$this->main = $main;

		$this->init();
		$this->hooks();
	}

	/**
	 * Stub function that can be overridden in child classes.
	 */
	public function init() {}

	/**
	 * Stub function that can be overridden in child classes.
	 */
	public function hooks() {}
}
