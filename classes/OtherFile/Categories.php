<?php

namespace OtherNamespace;

if(! class_exists('OtherNamespace\Categories')){
    class Categories extends Offline {

        public function __construct() {
            parent::__construct();
        }
        
        public function get_all_categories() {
            return $this->allOfflineData['block_categories'];
        }

        public function get_category_by_id($id) {
            foreach($this->allOfflineData['block_categories'] as $category){
                if ($category['category_id'] == $id) {
                    return $category['category_name'];
                }
            }
        }

    }
}




