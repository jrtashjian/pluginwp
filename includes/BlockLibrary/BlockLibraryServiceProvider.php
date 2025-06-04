<?php
/**
 * The BlockLibraryServiceProvider class.
 *
 * @package PluginWP
 */

namespace PluginWP\BlockLibrary;

use PluginWP\Dependencies\League\Container\ServiceProvider\AbstractServiceProvider;
use PluginWP\Dependencies\League\Container\ServiceProvider\BootableServiceProviderInterface;

/**
 * The BlockLibraryServiceProvider class.
 */
class BlockLibraryServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {
	/**
	 * Get the services provided by the provider.
	 *
	 * @param string $id The service to check.
	 *
	 * @return array
	 */
	public function provides( string $id ): bool {
		$services = array();

		return in_array( $id, $services, true );
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register(): void {}

	/**
	 * Bootstrap any application services by hooking into WordPress with actions/filters.
	 *
	 * @return void
	 */
	public function boot(): void {
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	/**
	 * Register the blocks.
	 */
	public function register_blocks() {
		register_block_type( $this->getContainer()->base_path( '/build/block-library/test-block' ) );
	}
}
