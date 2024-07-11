<?php

namespace Ajax;

/**
 * This class represents the process of saving data in the Wordpress database.
 */
if(! class_exists('Ajax\PostToDatabase')){
    class PostToDatabase {

        private $callback;

        function __construct($callback, $server_action_name){
            $this->callback = $callback;
            $this->server_action_name = $server_action_name;
            $ConectionFrontendBackend = new ConectionFrontendBackend( $server_action_name, array($this, 'post_data_to_db'));
        }

        function post_data_to_db() {
            check_ajax_referer('my-ajax-nonce', 'security');
            $data_from_frontend = $_POST['mi_parametro'];
            $this->saveData($data_from_frontend);
            wp_die();
        }

        function saveData($data_from_frontend){
            $callback = $this->callback;
            $callback($data_from_frontend); //$callback function has to finish with a eco
        }
    }
}
