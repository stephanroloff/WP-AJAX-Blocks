<?php

namespace OtherNamespace;

if(! class_exists('OtherNamespace\Sponsors')){
    class Sponsors extends Offline {

        public function __construct() {
            parent::__construct();
        }
        
        public function get_all_sponsors() {
            return $this->allOfflineData['sponsors'];
        }

        public function get_sponsor_by_id($id) {
            foreach($this->allOfflineData['sponsors'] as $sponsor){
                if ($sponsor['sponsor_id'] == $id) {
                    return $sponsor;
                }
            }
        }

    }
}




