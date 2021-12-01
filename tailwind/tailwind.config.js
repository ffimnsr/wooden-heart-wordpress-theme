module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	mode: 'jit',
	future: {},
	purge: {
		content: [
			// Ensure changes to theme.json rebuild your CSS.
			'./theme/theme.json',
			'./theme/**/*.php',
			'./safelist.txt',
		],
	},
	theme: {
		// Extend the default theme.
		extend: {

		},
	},
	variants: {
		extend: {
			margin: ['last'],
		},
	},
	plugins: [
		// Generate safelist.txt file for use in purgeCSS.
		require('tailwind-safelist-generator')({
			path: 'safelist.txt',
			patterns: [
				'editor-post-title__block',
				'editor-post-title__input',
				'mx-{margin}',
				'px-{padding}',
				'py-{padding}',
				'text-{textColor}',
				'!text-{textColor}',
				'text-{fontSize}',
				'font-{fontWeight}',
				'!font-{fontWeight}',
				'leading-{lineHeight}',
				'bg-{backgroundColor}',
				'hover:bg-{backgroundColor}',
				'hover:text-{textColor}',
				'no-underline',
				'!no-underline',
				'text-center',
			],
		}),

		// Extract colors and widths from theme.json.
		require('@_tw/themejson')(require('../theme/theme.json')),

		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/forms'),
		require('@tailwindcss/line-clamp'),
	],
};
