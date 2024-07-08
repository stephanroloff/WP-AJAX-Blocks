<?php

namespace OtherNamespace;

if(! class_exists('OtherNamespace\UrlRequest')){
    class UrlRequest {

        private $access_key;
        public $base_url;
        private $convention;
        private $url_api;

        public function __construct(){
            // Get the access key from an environment variable (wp-config)
            $this->access_key = defined('MEA_CMS_API_ACCESS_KEY') ? MEA_CMS_API_ACCESS_KEY : null;
            $this->base_url = 'https://dsag-dev-cms.plazz.net/';
            $this->convention = '1';
            $this->url_api = $this->base_url . 'conference/api/manage/' . $this->convention;
        }

        public function urlRequest_GET($url_end) {
            // URL de la API REST que quieres llamar
            // $url = 'https://dsag-dev-cms.plazz.net/conference/api/manage/1/agenda';
            // $url = 'https://dsag-dev-cms.plazz.net/conference/api/manage/1/event';
            // $url = 'https://dsag-dev-cms.plazz.net/conference/api/manage/1/person';
            $url = $this->url_api . $url_end;

            //Initializes the cURL session
            $ch = curl_init();
            // Sets the URL
            curl_setopt($ch, CURLOPT_URL, $url);
            // Indicates that it is a GET request
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            // Sets the X-ACCESS-KEY header
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'X-ACCESS-KEY: ' . $this->access_key
            ));
            // Returns the answer instead of printing the answer
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Make the API call and get the response
            $response = curl_exec($ch);
            // Check for errors
            if(curl_errno($ch)){
                echo 'Error: ' . curl_error($ch);
            }
            // Close the cURL session
            curl_close($ch);
            // Decode the JSON response
            $json_data = json_decode($response, true);

            return $json_data;
        }
    }
}




