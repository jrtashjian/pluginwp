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
	 * Get the list of block names to register.
	 *
	 * @return array
	 */
	protected function get_blocks(): array {
		return array(
			'test-block',
		);
	}

	/**
	 * Register the blocks.
	 *
	 * @throws \Exception When block path does not exist.
	 */
	public function register_blocks() {
		foreach ( $this->get_blocks() as $block_name ) {
			$block_path = $this->getContainer()->base_path( '/build/block-library/' . $block_name );

			if ( ! is_dir( $block_path ) ) {
				throw new \Exception( 'Block path does not exist: ' . esc_html( $block_path ) );
			}

			register_block_type( $block_path );
		}
	}
}
