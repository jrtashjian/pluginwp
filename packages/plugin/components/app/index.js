/**
 * WordPress dependencies.
 */
import { __ } from '@wordpress/i18n';
import {
	Popover,
	SlotFillProvider,
} from '@wordpress/components';

export default function App() {
	return (
		<SlotFillProvider>
			{ __( 'PluginWP' ) }
			<Popover.Slot />
		</SlotFillProvider>
	);
}
