import { Routes, Route } from 'react-router-dom';

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
import { useInterceptMenuLink } from '../../hooks/use-intercept-menu-link';
import { useSyncCurrentMenu } from '../../hooks/use-sync-menu-current';

export default function App( { settings } ) {
	useInterceptMenuLink();
	useSyncCurrentMenu();

	return (
		<div className="pluginwp__container">
			<div className="pluginwp__layout">
				<Routes>
					<Route path="/" element={ (
						<Page title={ __( 'PluginWP', 'pluginwp' ) } hasPadding>
							<VStack>
								<Text>{ __( 'Initial Settings', 'pluginwp' ) }</Text>
								<pre style={ { margin: '0' } }>
									{ JSON.stringify( settings, null, 2 ) }
								</pre>
							</VStack>
						</Page>
					) } />

					<Route path="/page-one" element={ (
						<Page title={ __( 'PluginWP - Page One', 'pluginwp' ) } hasPadding>
							<VStack>
								<Text>{ __( 'Initial Settings', 'pluginwp' ) }</Text>
								<pre style={ { margin: '0' } }>
									{ JSON.stringify( settings, null, 2 ) }
								</pre>
							</VStack>
						</Page>
					) } />

					<Route path="/page-two" element={ (
						<Page title={ __( 'PluginWP - Page Two', 'pluginwp' ) } hasPadding>
							<VStack>
								<Text>{ __( 'Initial Settings', 'pluginwp' ) }</Text>
								<pre style={ { margin: '0' } }>
									{ JSON.stringify( settings, null, 2 ) }
								</pre>
							</VStack>
						</Page>
					) } />
				</Routes>
			</div>
		</div>
	);
}
