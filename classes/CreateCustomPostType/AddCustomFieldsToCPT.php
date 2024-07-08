<?php

namespace CreateCustomPostType;

if(! class_exists('CreateCustomPostType\AddCustomFieldsToCPT')){
    class AddCustomFieldsToCPT {

        private $custom_field_for_CPT;
        private $all_custom_field;

        function __construct($all_custom_field, $custom_field_for_CPT){
            $this->custom_field_for_CPT = $custom_field_for_CPT;
            $this->all_custom_field = $all_custom_field;

            add_action('acf/init', array($this,'my_acf_init'));
        }

        function my_acf_init() {
            $all_custom_field = $this->all_custom_field;
            $custom_field_for_CPT = $this->custom_field_for_CPT;


            // Comprobar si la función acf_add_local_field_group está disponible
            if( function_exists('acf_add_local_field_group') ) {
                // Configuración del grupo de campos
                $fields = $all_custom_field;

                // Configuración del grupo de campos
                $field_group = array(
                    'key' => 'group_event_details',
                    'title' => 'Event Details',
                    'fields' => $fields,
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => $custom_field_for_CPT, // Aquí va el nombre de tu tipo de contenido personalizado
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'active' => true,
                    'description' => '',
                );

                // Añadir el grupo de campos
                acf_add_local_field_group($field_group);
            }
        }

    }
}




