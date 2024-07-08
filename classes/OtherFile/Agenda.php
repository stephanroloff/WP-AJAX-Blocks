<?php

namespace OtherNamespace;

if(! class_exists('OtherNamespace\Agenda')){
    class Agenda {

        private $allEvents;
        private $singleEvent;

        function __construct(){
            $this->allEvents = (new UrlRequest())->urlRequest_GET('/event');
        }
        
        public function get_all_events() {
            return $this->allEvents;
        }

        public function get_event_by_id($id) {
            foreach($this->allEvents as $event){
                if ($event['event_id'] == $id) {
                    return $event;
                }
            }
        }

        //Here you have to use the "external_id" not the normal "id". You have to define the external_id in the MEA CMS
        public function get_single_event_by_id($id) {
            $this->singleEvent = (new UrlRequest())->urlRequest_GET("/event/$id");
            return $this->singleEvent;
        }

    }
}




