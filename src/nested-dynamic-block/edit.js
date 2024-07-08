import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';

export default function Edit({ attributes }) {

	const MY_TEMPLATE = [
		['core/heading', { placeholder: 'Book Title' }],
		['core/paragraph', { placeholder: 'Summary' }],
	];

	return (
		<div {...useBlockProps()}>
			<InnerBlocks
				template={MY_TEMPLATE}
			/>
		</div>
	);
}
