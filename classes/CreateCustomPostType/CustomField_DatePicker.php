<?php

namespace CreateCustomPostType;

if(! class_exists('CreateCustomPostType\CustomField_DatePicker')){
    class CustomField_DatePicker {

        private $custom_field_name;
        private $custom_field_label;
        private $custom_field_instructions;

        function __construct($custom_field_name, $custom_field_label, $custom_field_instructions = 'Select a date.'){
            $this->custom_field_name = $custom_field_name;
            $this->custom_field_label = $custom_field_label;
            $this->custom_field_instructions = $custom_field_instructions;
            add_action('init', array($this, 'get_custom_field_array'));
        }

        function get_custom_field_array() {
            $custom_field_name = $this->custom_field_name;
            $custom_field_label = $this->custom_field_label;
            $custom_field_instructions = $this->custom_field_instructions;

            // Comprobar si la función acf_add_local_field_group está disponible
            if( function_exists('acf_add_local_field_group') ) {
                return array(
                    'key' => "field_$custom_field_name",
                    'label' => $custom_field_label,
                    'name' => $custom_field_name,
                    'type' => 'date_picker',
                    'instructions' => $custom_field_instructions,
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'display_format' => 'd/m/Y',
                    'return_format' => 'Ymd',
                );
            }
        }

        function get_custom_field($post_id) {
            $custom_field_name = $this->custom_field_name;
            return get_field($custom_field_name, $post_id);
        }

        function update_custom_field($post_id, $date_value) {
            $custom_field_name = $this->custom_field_name;
            update_field($custom_field_name, $date_value, $post_id);
        }

    }
}




