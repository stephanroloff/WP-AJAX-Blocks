<?php

namespace CreateCustomPostType;

if(! class_exists('CreateCustomPostType\CustomField_TextArea')){
    class CustomField_TextArea {

        private $custom_field_name;
        private $custom_field_label;
        private $custom_field_instructions;

        function __construct($custom_field_name, $custom_field_label){
            $this->custom_field_name = $custom_field_name;
            $this->custom_field_label = $custom_field_label;
            add_action('init', array($this, 'get_custom_field_array'));
        }

        function get_custom_field_array() {
            $custom_field_name = $this->custom_field_name;
            $custom_field_label = $this->custom_field_label;

            // Comprobar si la función acf_add_local_field_group está disponible
            if( function_exists('acf_add_local_field_group') ) {
                return array(
                    'key' => "field_$custom_field_name",
                    'label' => $custom_field_label,
                    'name' => $custom_field_name,
                    'type' => 'textarea',
                    'instructions' => 'Enter the description of the event here.',
                    'required' => true,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                );
            }
        }

    }
}




