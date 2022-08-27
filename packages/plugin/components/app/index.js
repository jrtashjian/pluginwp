/**
 * WordPress dependencies.
 */
import { __ } from '@wordpress/i18n';
import {
	Popover,
	SlotFillProvider,
} from '@wordpress/components';

export default function App( { settings } ) {
	return (
		<SlotFillProvider>
			{ __( 'PluginWP' ) }
			<pre>
				{ JSON.stringify( settings, null, 2 ) }
			</pre>
			<Popover.Slot />
		</SlotFillProvider>
	);
}
