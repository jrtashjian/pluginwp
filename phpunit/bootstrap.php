<?php
/**
 * PHPUnit bootstrap file
 *
 * @package PluginWP
 */

// Require composer dependencies.
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

// Initialize WP_Mock.
WP_Mock::bootstrap();

// Activate strict mode.
WP_Mock::activateStrictMode();
