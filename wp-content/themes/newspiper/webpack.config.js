/**
 * External Dependencies
 */
const path = require( 'path' );
const FixStyleOnlyEntriesPlugin = require( 'webpack-fix-style-only-entries' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' );

/**
 * WordPress Dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );

module.exports = {
	...defaultConfig,
	...{
		entry: {
			'css/main': path.resolve( process.cwd(), 'src/sass', 'app.scss' ),
			'css/woocommerce': path.resolve( process.cwd(), 'src/sass', 'woocommerce.scss' ),
			'js/app': path.resolve( process.cwd(), 'src/js', 'app.js' ),
			'js/woocommerce': path.resolve( process.cwd(), 'src/js', 'woocommerce.js' ),
		},
		output: {
			filename: '[name].js',
			path: path.resolve( __dirname, 'build' ),
		},
	},
	plugins: [
		new DependencyExtractionWebpackPlugin(),
		new FixStyleOnlyEntriesPlugin(),
		new MiniCssExtractPlugin(),
	],
};
