module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	mode: 'jit',
	future: {},
	purge: {
		layers: [
			'base',
			'components',
		],
		content: [
			// Ensure changes to theme.json rebuild your CSS.
			'./theme/theme.json',
			'./theme/**/*.php',
		],
		safelist: [
			'editor-post-title__block',
			'editor-post-title__input',
			'mx-auto',
		],
	},
	theme: {
		// Extend the default theme.
		extend: {

		},
	},
	variants: {},
	plugins: [
		// Extract colors and widths from theme.json.
		require('@_tw/themejson')(require('../theme/theme.json')),

		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/forms'),
		require('@tailwindcss/line-clamp'),
	],
};
