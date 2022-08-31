/**
 * WordPress dependencies.
 */
import { registerPlugin } from '@wordpress/plugins';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies.
 */
import ExampleSlotFill from './components/example-slot-fill';

const TestPlugin = () => {
	return (
		<ExampleSlotFill>
			<p>
				{ __( 'This content is rendered from a registered plugin using:', 'pluginwp' ) }&nbsp;
				<a href="https://developer.wordpress.org/block-editor/reference-guides/packages/packages-plugins/#registerplugin" target={ '_blank' } rel="noreferrer">registerPlugin()</a>
			</p>
		</ExampleSlotFill>
	);
};

registerPlugin( 'test-plugin', {
	render: TestPlugin,
	scope: 'pluginwp',
} );
