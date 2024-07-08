<?php

namespace CreateCustomPostType;

if(! class_exists('CreateCustomPostType\CustomField_Select')){
    class CustomField_Select {

        private $custom_field_name;
        private $custom_field_label;
        private $custom_field_instructions;
        private $select_options;

        function __construct($custom_field_name, $custom_field_label, $select_options){
            $this->custom_field_name = $custom_field_name;
            $this->custom_field_label = $custom_field_label;
            $this->select_options = $select_options;
            add_action('init', array($this, 'get_custom_field_array'));
        }

        function get_custom_field_array() {
            $custom_field_name = $this->custom_field_name;
            $custom_field_label = $this->custom_field_label;
            $select_options = $this->select_options;

            // Comprobar si la función acf_add_local_field_group está disponible
            if( function_exists('acf_add_local_field_group') ) {
                return array(
                    'key' => "field_$custom_field_name",
                    'label' => $custom_field_label,
                    'name' => $custom_field_name,
                    'type' => 'select',
                    'instructions' => 'Select an option.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => $select_options,
                    'default_value' => '',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                );   
            }
        }

        function get_custom_field($post_id) {
            $custom_field_name = $this->custom_field_name;
            return get_field($custom_field_name, $post_id);
        }

        function update_custom_field($post_id, $value) {
            $custom_field_name = $this->custom_field_name;
            update_field($custom_field_name, $value, $post_id);
        }

    }
}




