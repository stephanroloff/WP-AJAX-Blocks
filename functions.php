<?php
/**
 * Plugin Name:       WP REST API
 * Description:       This is a Plugin Scaffold.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       meraki
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

namespace WpRestApi;
require __DIR__ . '/vendor/autoload.php';
define('MY_PLUGIN_PATH_WP_REST_API',plugin_dir_url(__FILE__));

$RegisterBlocks = new RegisterBlocks();
$EnqueueAssets = new EnqueueAssets();


// namespace OtherNamespace;

add_action('admin_notices', function() {
    if ( ! is_plugin_active('advanced-custom-fields-pro/acf.php') ) {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php esc_html_e('The plugin ACF must be activated for the WP REST API plugin to function correctly. Activate ACF PRO from the plugins page.', 'text-domain'); ?></p>
        </div>
        <?php
    }
});

add_action('plugins_loaded', function(){
    include_once __DIR__ . '/inc/create-events-custom-post-type.php';
    include_once __DIR__ . '/inc/adding-data-to-custom-fields.php';
});







