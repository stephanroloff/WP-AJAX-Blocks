<?php

namespace CreateCustomPostType;

if(! class_exists('CreateCustomPostType\CustomField_Image')){
    class CustomField_Image {

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
                    'type' => 'image',
                    'instructions' => 'Select an image.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'id', // or 'array' or 'url'
                    'preview_size' => 'thumbnail',
                    'library' => 'all', // or 'uploadedTo'
                    'min_width' => '',
                    'min_height' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'mime_types' => 'jpg, jpeg, png, gif', // 'jpg,jpeg,png,gif'
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




