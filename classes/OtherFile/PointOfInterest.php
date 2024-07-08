<?php

namespace OtherNamespace;

//Point of interest (POI)

if(! class_exists('OtherNamespace\PointOfInterest')){
    class PointOfInterest extends Offline {

        public function __construct() {
            parent::__construct();
        }
        
        public function get_all_pois() {
            return $this->allOfflineData['pois'];
        }

        public function get_poi_by_id($id) {
            foreach($this->allOfflineData['pois'] as $poi){
                if ($poi['poi_id'] == $id) {
                    return $poi['poi_name'];
                }
            }
        }

    }
}




