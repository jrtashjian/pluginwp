[![Build and Test](https://github.com/jrtashjian/pluginwp/actions/workflows/build-and-test.yml/badge.svg?branch=master)](https://github.com/jrtashjian/pluginwp/actions/workflows/build-and-test.yml)

# PluginWP Foundation

🚧 [**UNDER DEVELOPMENT**](https://github.com/jrtashjian/pluginwp/issues/1) 🚧

This code serves as a starting point for building a WordPress plugin using React and the [block editor components](https://github.com/WordPress/gutenberg/tree/trunk/packages). I also wanted to build WordPress plugins in a more modern PHP way by introducing a portion of the [Service Container](https://laravel.com/docs/8.x/container) and [Service Providers](https://laravel.com/docs/8.x/providers) that are used in the [Laravel framework](https://laravel.com/).

## Installation

### Requirements

- [Node.js](https://nodejs.org)
- [Composer](https://getcomposer.org)

### Quick Start

Clone this repository or click [Use this template](https://github.com/jrtashjian/pluginwp/generate) on to create a new project on GitHub.

```
git clone https://github.com/jrtashjian/pluginwp.git yourpluginslug
```

Search for `PluginWP Author` and replace with `Actual Author Name`
```
find . -type f -not -path "./.git/*" -exec sed -i 's/PluginWP Author/Actual Author Name/g' {} +
```

Search for `PluginWP` and replace with `YourPluginSlug`
```
find . -type f -not -path "./.git/*" -exec sed -i 's/PluginWP/YourPluginSlug/g' {} +
```

Search for `pluginwp` and replace with `yourpluginslug`
```
find . -type f -not -path "./.git/*" -exec sed -i 's/pluginwp/yourpluginslug/g' {} +
```

Finally, rename the main plugin file `pluginwp.php` to `yourpluginslug.php`.

### Setup

Install the necessary Node.js and Composer dependencies:

```
$ composer install
$ npm install
```

### Available CLI commands

- `composer lint` : checks all PHP files for syntax errors.
- `composer format` : fixes all automatically fixable syntax errors.
- `npm run wp-env` : exposes all commands available in [`@wordpress/env`](https://github.com/WordPress/gutenberg/tree/wp/6.0/packages/env)
- `npm run build` : compiles all scripts and styles for distribution.
- `npm run dev` : compiles all scripts and styles for development.

Now go build something!