<?php

namespace OtherNamespace;

if(! class_exists('OtherNamespace\Offline')){
    class Offline {

        protected $allOfflineData;

        public function __construct() {
            $this->allOfflineData = $this->getFetchData();
        }
    
        public function getFetchData() {
            return (new FetchData())->fetchDataFromApi('/offline');
        }
    }
}




