<?php
/**
 * The PluginServiceProvider class.
 *
 * @package PluginWP
 */

namespace PluginWP\Plugin;

use PluginWP\ServiceProvider;

/**
 * The PluginServiceProvider class.
 */
class PluginServiceProvider extends ServiceProvider {

	/**
	 * This method will be used for hooking into WordPress with actions/filters.
	 */
	public function boot() {
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
						<div id="pluginwp">
							PluginWP
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

		$asset_loader = $this->app->makeWith(
			Asset::class,
			array(
				'handle' => strtolower( str_replace( '\\', '-', __NAMESPACE__ ) ),
				'slug'   => strtolower( basename( __DIR__ ) ),
			)
		);

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
