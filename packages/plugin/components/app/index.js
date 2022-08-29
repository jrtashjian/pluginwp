/**
 * WordPress dependencies.
 */
import { __ } from '@wordpress/i18n';
import {
	Popover,
	SlotFillProvider,
} from '@wordpress/components';
import { PluginArea } from '@wordpress/plugins';
import {
	FullscreenMode,
	InterfaceSkeleton,
} from '@wordpress/interface';

export default function App( { settings } ) {
	return (
		<SlotFillProvider>
			<FullscreenMode isActive={ false } />
			<InterfaceSkeleton
				content={ (
					<div>
						{ __( 'PluginWP' ) }
						<pre>
							{ JSON.stringify( settings, null, 2 ) }
						</pre>
					</div>
				) }
			/>
			<PluginArea scope="pluginwp" onError={ ( name ) => console.debug( name, 'plugin has encountered an error' ) } />
			<Popover.Slot />
		</SlotFillProvider>
	);
}
