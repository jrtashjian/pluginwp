const fs = require( 'fs' );
const path = require( 'path' );

/**
 * WordPress dependencies.
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const { camelCaseDash } = require( '@wordpress/dependency-extraction-webpack-plugin/lib/util' );

const PACKAGES_DIR = path.resolve( __dirname, 'packages' );

/**
 * Retrieves an array of plugin package names from the packages directory.
 * Filters for directories that contain an index.js file.
 *
 * @type {string[]}
 */
const pluginPackages = fs
	.readdirSync( PACKAGES_DIR )
	.filter( ( packageName ) => {
		const packagePath = path.join( PACKAGES_DIR, packageName );
		const indexPath = path.join( packagePath, 'index.js' );
		return (
			fs.statSync( packagePath ).isDirectory() &&
			fs.existsSync( indexPath )
		);
	} );

module.exports = {
	...defaultConfig,

	entry: {
		...pluginPackages.reduce( ( memo, packageName ) => {
			return {
				...memo,
				[ `${ packageName }/index` ]: {
					import: `./packages/${ packageName }`,
					library: {
						name: [ 'pluginwp', camelCaseDash( packageName ) ],
						type: 'window',
					},
				},
			};
		}, {} ),
		...defaultConfig.entry(),
	},
};
