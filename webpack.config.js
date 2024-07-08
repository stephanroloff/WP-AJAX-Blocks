const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const { getWebpackEntryPoints } = require( '@wordpress/scripts/utils/config' );
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
 
module.exports = {
    ...defaultConfig,
    entry: {
      // Define tus entry points aquí
      ...getWebpackEntryPoints(),
      both: './src/assets/both/both.js',
      editor: './src/assets/editor/editor.js',
      frontend: './src/assets/frontend/frontend.js',
    },
    plugins: [
        ...defaultConfig.plugins,
        new BrowserSyncPlugin({
          // browse to http://localhost:3000/ during development,
          // ./public directory is being served
          host: 'localhost',
          port: 3000,
          proxy: 'http://localhost:10019/'
        })
    ]
};