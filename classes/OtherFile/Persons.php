<?php

namespace OtherNamespace;

if(! class_exists('OtherNamespace\Persons')){
    class Persons {

        private $allPersons;

        function __construct(){
            $this->allPersons = (new UrlRequest())->urlRequest_GET('/person');
        }
        
        public function get_all_persons() {
            return $this->allPersons;
        }

        public function get_person_by_id($id) {
            foreach($this->allPersons['data'] as $person){
                if ($person['person_id'] == $id) {
                    return $person;
                }
            }
        }

    }
}




