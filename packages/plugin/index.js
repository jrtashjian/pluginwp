/**
 * WordPress dependencies.
 */
import '@wordpress/dom-ready';
import { createRoot, StrictMode } from '@wordpress/element';

/**
 * Internal dependencies.
 */
import App from './components/app';
import './style.scss';

/**
 * Initializes and returns and instance of PluginWP.
 *
 * @param {string}  id       Unique identifier for the editor instance.
 * @param {?Object} settings Settings object.
 */
export function initialize( id, settings ) {
	const target = document.getElementById( id );
	const root = createRoot( target );

	root.render(
		<StrictMode>
			<App settings={ settings } />
		</StrictMode>
	);
	return root;
}
