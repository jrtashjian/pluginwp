<?php
/**
 * Plugin Name: PluginWP
 * Plugin URI: https://pluginwp.com
 * Description: PluginWP Plugin Description.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: PluginWP Author
 * Author URI: https://pluginwp.com
 * Text Domain: pluginwp
 * Domain Path: /languages
 *
 * Copyright 2019-2023 PluginWP Author
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see <http://www.gnu.org/licenses/>.
 *
 * @package PluginWP
 */

defined( 'ABSPATH' ) || exit;

// Guard the plugin from initializing more than once.
if ( class_exists( \PluginWP\Application::class ) ) {
	return;
}

require_once dirname( __FILE__ ) . '/vendor/autoload.php';

/**
 * Create and retrieve the main application container instance.
 *
 * @return Application The application container.
 */
function pluginwp() {
	return \PluginWP\Application::get_instance();
}

pluginwp()->set_base_path( __FILE__ );

/**
 * Service Providers.
 */
pluginwp()->addServiceProvider( new \PluginWP\Plugin\PluginServiceProvider() );
pluginwp()->addServiceProvider( new \PluginWP\BlockLibrary\BlockLibraryServiceProvider() );

register_deactivation_hook( __FILE__, array( pluginwp(), 'deactivation' ) );
add_action( 'plugins_loaded', array( pluginwp(), 'load_text_domain' ) );
