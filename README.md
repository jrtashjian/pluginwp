[![Build and Test](https://github.com/jrtashjian/pluginwp/actions/workflows/build-and-test.yml/badge.svg?branch=master)](https://github.com/jrtashjian/pluginwp/actions/workflows/build-and-test.yml)

# PluginWP Foundation

🚧 [**UNDER DEVELOPMENT**](https://github.com/jrtashjian/pluginwp/issues/1) 🚧

PluginWP is a modern starting point for building WordPress plugins using React and the [block editor components](https://github.com/WordPress/gutenberg/tree/trunk/packages). It brings a more maintainable and scalable approach to plugin development by introducing concepts from Laravel, such as the [Service Container](https://laravel.com/docs/8.x/container) and [Service Providers](https://laravel.com/docs/8.x/providers).

## Features

- Modern PHP architecture inspired by Laravel
- React-based block editor components
- Composer and npm support
- Pre-configured build tools and scripts
- Easy-to-follow structure for scalable plugin development

## Installation

### Requirements

- [Node.js](https://nodejs.org)
- [Composer](https://getcomposer.org)

### Quick Start

**Create your plugin project:**

Clone this repository or click [Use this template](https://github.com/jrtashjian/pluginwp/generate) to create a new project on GitHub.

```sh
git clone https://github.com/jrtashjian/pluginwp.git yourpluginslug
cd yourpluginslug
```

**Customize plugin details:**

Replace all occurrences of `PluginWP Author` with your actual author name:

```sh
find . -type f -not -path "./.git/*" -exec sed -i 's/PluginWP Author/Actual Author Name/g' {} +
```

Replace all occurrences of `PluginWP` with your plugin slug (e.g., `YourPluginSlug`):

```sh
find . -type f -not -path "./.git/*" -exec sed -i 's/PluginWP/YourPluginSlug/g' {} +
```

Replace all occurrences of `pluginwp` with your lowercase plugin slug (e.g., `yourpluginslug`):

```sh
find . -type f -not -path "./.git/*" -exec sed -i 's/pluginwp/yourpluginslug/g' {} +
```

Finally, rename the main plugin file:

```sh
mv pluginwp.php yourpluginslug.php
```

## Setup

Install the necessary dependencies:

```sh
composer install
npm install
```

## Available CLI Commands

### Composer Scripts

- `composer lint` : Run PHP_CodeSniffer on all PHP files using `phpcs.xml.dist`.
- `composer lint-prefixed` : Run PHP_CodeSniffer on prefixed vendor files using `phpcs-prefixed.xml.dist`.
- `composer format` : Automatically fix fixable PHP coding standard issues using PHPCBF.
- `composer test` : Run the PHPUnit test suite.
- `composer makepot` : Generate a .pot file for translations using WP-CLI.
- `composer build-release` : Build a distributable plugin archive.
- `composer phpscoper` : Run PHP-Scoper to prefix vendor dependencies.

### NPM Scripts

- `npm run build` : Compile all scripts and styles for distribution.
- `npm run build:analyze-bundles` : Build and analyze bundle sizes with webpack-bundle-analyzer.
- `npm run start` : Start the development build process.
- `npm run format:php` : Run Composer's `format` script inside the wp-env container.
- `npm run lint:css` : Lint all SCSS files using WordPress stylelint config.
- `npm run lint:css:fix` : Lint and automatically fix SCSS files.
- `npm run lint:js` : Lint JavaScript files using WordPress ESLint config.
- `npm run lint:js:fix` : Lint and automatically fix JavaScript files.
- `npm run lint:php` : Run Composer's `lint` script inside the wp-env container.
- `npm run lint:php:prefixed` : Run Composer's `lint-prefixed` script inside the wp-env container.
- `npm run mailhog` : Start a MailHog SMTP testing server in Docker.
- `npm run packages-update` : Update all @wordpress packages to the specified dist-tag.
- `npm run test:php` : Run all PHP linting and unit tests.
- `npm run test:unit:php:coverage` : Run PHPUnit with code coverage report.
- `npm run test:unit:php:setup` : Start wp-env with Xdebug for code coverage.
- `npm run test:unit:php` : Run PHPUnit setup and then the test suite.
- `npm run wp-env` : Start and manage the local WordPress environment using @wordpress/env.
- `npm run version` : Update version numbers and stage changes for commit.

For more details, see the `scripts` section in `composer.json` and `package.json`.

## Contributing

Contributions are welcome! Please open issues or submit pull requests to help improve this project.

## License
This project is open source and available under the [GNU General Public License v2.0 or later (GPL-2.0+)](LICENSE).

---

Now go build something awesome! 🚀