<?php
/**
 * Tests the Core class.
 *
 * @package PluginWP
 */

namespace PluginWP\Tests\Core;

use PluginWP\Application;
use PluginWP\ServiceProvider;
use \PHPUnit\Framework\TestCase;

/**
 * Tests the Core class.
 */
class CoreTest extends TestCase {

	/**
	 * Test the correct path bindings are generated.
	 */
	public function test_core_register_path_bindings() {
		$application = new Application();

		$this->assertEmpty( $application->basePath() );
		$this->assertEmpty( $application->baseUrl() );

		$application->setBasePath( 'pluginwp/pluginwp.php' );

		$this->assertEquals( 'pluginwp', $application->basePath() );
		$this->assertEquals( 'http://localhost:8889/wp-content/plugins/pluginwp', $application->baseUrl() );
	}

	/**
	 * Test the contstructor parameter will generate the correct path bindings.
	 */
	public function test_core_constructor_can_register_path_bindings() {
		$application = new Application( 'pluginwp/pluginwp.php' );

		$this->assertEquals( 'pluginwp', $application->basePath() );
		$this->assertEquals( 'http://localhost:8889/wp-content/plugins/pluginwp', $application->baseUrl() );
	}

	/**
	 * Test the version is accessible.
	 */
	public function test_core_returns_version() {
		$application = new Application();

		$this->assertEquals( '1.0.0', $application->version() );
	}

	/**
	 * Test that a service provider can be registered.
	 */
	public function test_core_register_provider() {
		$application = new Application();

		$application->register( ServiceProviderStub::class );

		$this->assertInstanceOf( ServiceProviderStub::class, $application->getProvider( ServiceProviderStub::class ) );
	}

	/**
	 * Test that the provider is returned when registered.
	 */
	public function test_core_returns_provider_when_registered() {
		$application = new Application();

		$this->assertInstanceOf( ServiceProviderStub::class, $application->register( ServiceProviderStub::class ) );
	}

	/**
	 * Test that the provider is only registered once.
	 */
	public function test_core_register_returns_existing_provider() {
		$application = new Application();

		$instance = $application->register( ServiceProviderStub::class );

		$this->assertSame( $instance, $application->register( ServiceProviderStub::class ) );
	}

	/**
	 * Test that providers can be "booted".
	 */
	public function test_core_can_boot_providers() {
		$application = new Application();

		$application->register( ServiceProviderStub::class );
		$application->boot();

		$this->expectOutputString( 'booted' );
	}

	/**
	 * Test that Core only boots providers once.
	 */
	public function test_core_boots_once_only() {
		$application = new Application();

		$application->register( ServiceProviderStub::class );
		$application->boot();
		$application->boot();

		$this->expectOutputRegex( '/^booted$/' );
	}

	/**
	 * Test that the deactivation hook is called.
	 */
	public function test_deactivation_hook_is_called() {
		$plugin_basename = 'pluginwp/pluginwp/php';

		register_deactivation_hook( $plugin_basename, array( pluginwp()->app, 'deactivation' ) );
		$this->assertTrue( has_filter( 'deactivate_' . $plugin_basename ) );

		do_action( 'deactivate_' . $plugin_basename ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals
	}

	/**
	 * Test that the deactivation hook removes the maintenance job.
	 */
	public function test_deactivation_hook_removes_maintenance_job() {
		$plugin_basename = 'pluginwp/pluginwp/php';
		$this->assertTrue( has_filter( 'deactivate_' . $plugin_basename ) );
	}
}

// phpcs:disable
class ServiceProviderStub extends ServiceProvider {
	public function boot() {
		echo 'booted';
	}
}
