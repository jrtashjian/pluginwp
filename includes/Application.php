<?php
/**
 * The Application class.
 *
 * @package PluginWP
 */

namespace PluginWP;

use PluginWP\Dependencies\League\Container\Container;
use PluginWP\Dependencies\League\Container\DefinitionContainerInterface;

/**
 * The Application class.
 */
class Application extends Container {
	/**
	 * The current globally available container (if any).
	 *
	 * @var static
	 */
	protected static $instance;

	/**
	 * The plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * The base path for the plugin.
	 *
	 * @var string
	 */
	protected $base_path;

	/**
	 * The base url for the plugin.
	 *
	 * @var string
	 */
	protected $base_url;

	/**
	 * Get the globally available instance of the container.
	 *
	 * @return static
	 */
	public static function getInstance() {
		if ( \is_null( static::$instance ) ) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * Set the shared instance of the container.
	 *
	 * @param  \PluginWP\Dependencies\League\Container\DefinitionContainerInterface|null $container The Dependency Injection Container.
	 *
	 * @return \PluginWP\Dependencies\League\Container\DefinitionContainerInterface|static
	 */
	public static function setInstance( DefinitionContainerInterface $container = null ) {
		static::$instance = $container;
		return static::$instance;
	}

	/**
	 * Get the version number of the application.
	 *
	 * @return string
	 */
	public function version() {
		return static::VERSION;
	}

	/**
	 * Register the path bindings based on the main plugin file.
	 *
	 * @param string $plugin_file The full path to the main plugin file.
	 */
	public function setBasePath( $plugin_file ) {
		$this->base_path = plugin_dir_path( $plugin_file );
		$this->base_url  = plugin_dir_url( $plugin_file );
	}

	/**
	 * Get the base path of the plugin.
	 *
	 * @param string $path path from the root.
	 *
	 * @return string
	 */
	public function basePath( $path = '' ) {
		return rtrim( $this->base_path, DIRECTORY_SEPARATOR ) . ( '' !== $path ? DIRECTORY_SEPARATOR . ltrim( $path, DIRECTORY_SEPARATOR ) : '' );
	}

	/**
	 * Get the base url of the plugin.
	 *
	 * @param string $path path from the root.
	 *
	 * @return string
	 */
	public function baseUrl( $path = '' ) {
		return rtrim( $this->base_url, '/' ) . ( '' !== $path ? '/' . ltrim( $path, '/' ) : '' );
	}

	/**
	 * Callback for plugin deactivation.
	 */
	public function deactivation() {}

	/**
	 * Load language files.
	 */
	public function loadTextDomain() {
		load_plugin_textdomain( 'pluginwp', false, $this->basePath( 'languages' ) );
	}
}
