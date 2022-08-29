/**
 * WordPress dependencies.
 */
import { registerPlugin } from '@wordpress/plugins';

/**
 * Internal dependencies.
 */
import ExampleSlotFill from './components/example-slot-fill';

const TestPlugin = () => {
	return (
		<ExampleSlotFill>
			<p>This content is rendered from a <a href="https://developer.wordpress.org/block-editor/reference-guides/packages/packages-plugins/#registerplugin">registered plugin</a>.</p>
		</ExampleSlotFill>
	);
};

registerPlugin( 'test-plugin', {
	render: TestPlugin,
	scope: 'pluginwp',
} );
