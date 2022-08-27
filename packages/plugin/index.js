/**
 * WordPress dependencies.
 */
import '@wordpress/dom-ready';
import { render } from '@wordpress/element';

/**
 * Internal dependencies.
 */
import App from './components/app';
import './style.scss';

/**
 * Initializes and returns and instance of PluginWP.
 *
 * @param {string} id Unique identifier for the editor instance.
 */
export function initialize( id ) {
	const target = document.getElementById( id );
	render( <App />, target );
}
