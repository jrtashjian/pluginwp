<?php
/**
 * The PluginServiceProvider class.
 *
 * @package PluginWP
 */

namespace PluginWP\Plugin;

use PluginWP\Dependencies\League\Container\ServiceProvider\AbstractServiceProvider;
use PluginWP\Dependencies\League\Container\ServiceProvider\BootableServiceProviderInterface;

/**
 * The PluginServiceProvider class.
 */
class PluginServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {
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
		add_action( 'admin_enqueue_scripts', array( $this, 'registerScripts' ) );

		add_action(
			'admin_menu',
			function () {
				add_menu_page(
					esc_html__( 'PluginWP', 'pluginwp' ),
					esc_html__( 'PluginWP', 'pluginwp' ),
					'manage_options',
					'pluginwp',
					function () {
						?>
						<div id="pluginwp" class="hide-if-no-js"></div>

						<?php // JavaScript is disabled. ?>
						<div class="wrap hide-if-js">
							<h1 class="wp-heading-inline">PluginWP</h1>
							<div class="notice notice-error notice-alt">
								<p><?php esc_html_e( 'PluginWP requires JavaScript. Please enable JavaScript in your browser settings.', 'pluginwp' ); ?></p>
							</div>
						</div>
						<?php
					},
					'',
					2
				);
			}
		);
	}

	/**
	 * Enqueue required scripts and styles.
	 */
	public function registerScripts() {
		$current_screen = get_current_screen();

		if ( 'toplevel_page_pluginwp' !== $current_screen->base ) {
			return;
		}

		// Prevent default hooks rendering content to the page.
		remove_all_actions( 'network_admin_notices' );
		remove_all_actions( 'user_admin_notices' );
		remove_all_actions( 'admin_notices' );
		remove_all_actions( 'all_admin_notices' );

		$asset_loader = $this->getContainer()
			->get( \PluginWP\Plugin\Asset::class )
			->addArgument(
				array( 'handle' => strtolower( str_replace( '\\', '-', __NAMESPACE__ ) ) )
			);

		$asset_loader->setPackageName( strtolower( basename( __DIR__ ) ) );
		$asset_loader->enqueueScript();
		$asset_loader->enqueueStyle();

		$init_script = <<<JS
			( function() {
				window._loadPluginWP = new Promise( function( resolve ) {
					wp.domReady( function() {
						resolve( pluginwp.plugin.initialize( 'pluginwp', %s ) );
					} );
				} );
			} )();
		JS;

		$script = sprintf(
			$init_script,
			wp_json_encode( array() )
		);
		wp_add_inline_script( $asset_loader->getHandle(), $script );
	}
}
