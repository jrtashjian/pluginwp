/**
 * WordPress dependencies.
 */
import { __ } from '@wordpress/i18n';
import {
	__experimentalVStack as VStack,
	__experimentalText as Text,
} from '@wordpress/components';
import { Page } from '@wordpress/admin-ui';

/**
 * Internal dependencies
 */

export default function App( { settings } ) {
	return (
		<div className="pluginwp__container">
			<div className="pluginwp__layout">
				<Page title={ __( 'PluginWP', 'pluginwp' ) } hasPadding>
					<VStack>
						<Text>{ __( 'Welcome to PluginWP!', 'pluginwp' ) }</Text>
						<Text>{ __( 'Initial Settings', 'pluginwp' ) }</Text>
						<pre style={ { margin: '0' } }>
							{ JSON.stringify( settings, null, 2 ) }
						</pre>
					</VStack>
				</Page>
			</div>
		</div>
	);
}
