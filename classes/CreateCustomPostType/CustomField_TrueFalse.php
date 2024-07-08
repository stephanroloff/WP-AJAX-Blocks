<?php

namespace CreateCustomPostType;

if(! class_exists('CreateCustomPostType\CustomField_TrueFalse')){
    class CustomField_TrueFalse {

        private $custom_field_name;
        private $custom_field_label;
        private $custom_field_instructions;
        private $custom_field_message;

        function __construct($custom_field_name, $custom_field_label, $custom_field_instructions = 'Select true or false.', $custom_field_message = 'Click me'){
            $this->custom_field_name = $custom_field_name;
            $this->custom_field_label = $custom_field_label;
            $this->custom_field_instructions = $custom_field_instructions;
            $this->custom_field_message = $custom_field_message;
            add_action('init', array($this, 'get_custom_field_array'));
        }

        function get_custom_field_array() {
            $custom_field_name = $this->custom_field_name;
            $custom_field_label = $this->custom_field_label;
            $custom_field_instructions = $this->custom_field_instructions;
            $custom_field_message = $this->custom_field_message;

            // Comprobar si la función acf_add_local_field_group está disponible
            if( function_exists('acf_add_local_field_group') ) {
                return array(
                    'key' => "field_$custom_field_name",
                    'label' => $custom_field_label,
                    'name' => $custom_field_name,
                    'type' => 'true_false',
                    'instructions' => $custom_field_instructions,
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => $custom_field_message,
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                );
            }
        }

    }
}




