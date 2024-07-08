<?php

namespace WpRestApi;

if(! class_exists('WpRestApi\EnqueueAssets')){
    class EnqueueAssets {

        function __construct(){
            //Just Frontend
            add_action('wp_enqueue_scripts',  array($this, 'scripts_and_styles_frontend'));
            //Frontend & Editor
            add_action('enqueue_block_assets',  array($this, 'scripts_and_styles'));
            //Just Editor
            add_action('enqueue_block_editor_assets',  array($this, 'scripts_and_styles_editor'));
        }

        function scripts_and_styles() {
            wp_enqueue_style('main_style', MY_PLUGIN_PATH_WP_REST_API . '/build/both.css');
            wp_enqueue_script('main_js_both', MY_PLUGIN_PATH_WP_REST_API . 'build/both.js', array('jquery','wp-blocks'), '1.0', true );
            
        }

        function scripts_and_styles_editor() {
            wp_enqueue_style('main_style_editor', MY_PLUGIN_PATH_WP_REST_API . '/build/editor.css');
            wp_enqueue_script('main_js_editor', MY_PLUGIN_PATH_WP_REST_API . 'build/editor.js', array('jquery','wp-blocks'), '1.0', true );
        }

        function scripts_and_styles_frontend() {
            wp_enqueue_style('main_style_frontend', MY_PLUGIN_PATH_WP_REST_API . '/build/frontend.css');
            wp_enqueue_script('main_js_frontend', MY_PLUGIN_PATH_WP_REST_API . 'build/frontend.js', array('jquery','wp-blocks'), '1.0', true );
        }
    }
}




