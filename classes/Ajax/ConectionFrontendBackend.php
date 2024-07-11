<?php

namespace Ajax;

/**
 * This class represents the process of conecting the frontend and backend using Ajax in Wordpress.
 */
if(! class_exists('Ajax\ConectionFrontendBackend')){
    class ConectionFrontendBackend {

        /**
         * Class Constructor
         *
         * @param string $server_action Name of the action on the frontend.
         * @param callable $server_function Function that define de the logic in the server side.
         */
        function __construct($server_action, $server_function){
            add_action('wp_enqueue_scripts', array($this, 'enqueue_my_scripts'));

            add_action("wp_ajax_$server_action", $server_function);
            add_action("wp_ajax_nopriv_$server_action", $server_function);
        }

        /**
        * This function conects the frontend and backend using Ajax and the object my_script_vars can be used in the frontend.
        */
        function enqueue_my_scripts() {       
                wp_enqueue_script('my-general-script', MY_PLUGIN_PATH_WP_REST_API . '/src/ajax-localize-script.js', array('jquery'), '1.0', true);
                $my_script_vars = array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'security' => wp_create_nonce('my-ajax-nonce')
                );
                wp_localize_script('my-general-script', 'my_script_vars', $my_script_vars);
        }
    }
}
