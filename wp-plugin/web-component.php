<?php
/**
 * Plugin Name:     Web Component Demo
 * Plugin URI:      https://github.com/jonshipman/web-component
 * Description:     A Demo/Boilerplate for building web-components using Svelte for WordPress.
 * Author:          Jon Shipman <jon@jonshipman.com>
 * Author URI:      https://www.shaemarcus.com
 * Text Domain:     webcomponent
 * Version:         1.0.0
 *
 * @package         Web_Component
 */

// Define constants.
define( 'WEBCOMPONENT_VERSION', '1.0.0' );
define( 'WEBCOMPONENT_FILE', __FILE__ );
define( 'WEBCOMPONENT_PATH', plugin_dir_path( __FILE__ ) );
define( 'WEBCOMPONENT_URL', plugin_dir_url( __FILE__ ) );

require_once __DIR__ . '/vendor/autoload.php';

spl_autoload_register( 'webcomponent_autoloader' );

/**
 * Loads classes from lib directory.
 *
 * @param string $class_name Class name being parsed.
 */
function webcomponent_autoloader( $class_name ) {
	$config = array(
		'Webcomponent_Demo' => array( 'directory' => 'demo' ),
		'Webcomponent'      => array( 'directory' => '' ),
	);

	foreach ( $config as $class_prefix => $options ) {
		if ( false !== strpos( $class_name, $class_prefix . '_' ) ) {
			$classes_dir            = realpath( rtrim( WEBCOMPONENT_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . $options['directory'], DIRECTORY_SEPARATOR ) );
			$sanitized_class_prefix = strtolower( str_replace( '_', '-', $class_prefix ) );

			$class_file = strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
			$class_file = str_replace( $sanitized_class_prefix . '-', '', $class_file );
			$class_file = $classes_dir . DIRECTORY_SEPARATOR . $class_file;

			if ( file_exists( $class_file ) ) {
				require_once $class_file;
				return;
			}
		}
	}
}

new Webcomponent_Start();
