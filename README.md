# PluginWP Foundation

This code serves as a starting point for building WordPress plugin using React and the [block editor components](https://github.com/WordPress/gutenberg/tree/trunk/packages). I also wanted to build WordPress plugins in a more modern PHP way by introducing a portion of the [Service Container](https://laravel.com/docs/8.x/container) and [Service Providers](https://laravel.com/docs/8.x/providers) that are used in the [Laravel framework](https://laravel.com/).

## Creating a new project

Clone this repository and do a case-sensitive search & replace on the codebase to replace references of "PluginWP" to your own.

```
git clone https://github.com/jrtashjian/pluginwp.git yourpluginslug
```

Replace the following strings within the `includes/`, `packages/`, and `phpunit/` directories as well as the `composer.json`, `package.json`, `phpcs.xml`, `phpunit.xml.dist`, `webpack.config.js`, and `pluginwp.php` file.

| Search & Replace  | What's it for? |
| ----------------- | -------------- |
| `PluginWP`        |                |
| `pluginwp`        |                |
| `PluginWP Author` |                |
| `pwp`             |                |
| `PWP`             |                |

You should also rename the main plugin file `pluginwp.php` to `yourpluginslug.php`.