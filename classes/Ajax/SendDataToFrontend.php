<?php

namespace Ajax;

/**
 * This class represents the process of saving data in the Wordpress database.
 */
if(! class_exists('Ajax\SendDataToFrontend')){
    class SendDataToFrontend {
        private $data;

        function __construct($data, $server_action_name){
            $this->data = $data;
            $this->server_action_name = $server_action_name;
            $ConectionFrontendBackend = new ConectionFrontendBackend($server_action_name, array($this, 'send_data_to_frontend'));
        }

        function send_data_to_frontend() {
            $data = $this->data;
            echo json_encode($data);
            wp_die();
        }

    }
}