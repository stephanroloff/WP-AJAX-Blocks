<?php

namespace OtherNamespace;

if(! class_exists('OtherNamespace\FetchData')){
    class FetchData {

        public function __construct() {
        }
    
        public function fetchDataFromApi($slug) {
            //Check if the data is cached
            $cached_data = get_transient('api_data');

            if ($cached_data !== false) {
                // return $cached_data;   //<---------------------------REVISAR!
            }

            // If the data is not cached, make the GET request to the API
            $response = (new UrlRequest())->urlRequest_GET($slug);

            if ($response == null) {
                // Handle request error
                echo '<div class="error-message">Request Error</div>';
                return false;
            }

            // Cache data for 1 hour (3600 seconds)
            set_transient('api_data', $response, 70);

            return $response;
        }
    }
}




