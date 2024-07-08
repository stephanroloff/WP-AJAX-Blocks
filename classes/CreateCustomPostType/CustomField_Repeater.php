<?php

namespace CreateCustomPostType;

if(! class_exists('CreateCustomPostType\CustomField_Repeater')){
    class CustomField_Repeater {

        private $sub_fields_repeater;
        private $custom_field_name;
        private $custom_field_label;
        private $custom_field_instructions;
        private $once;
        private $the_original_length;

        function __construct($sub_fields_repeater, $custom_field_name, $custom_field_label, $custom_field_instructions = 'Add your items here.'){
            $this->sub_fields_repeater = $sub_fields_repeater;
            $this->custom_field_name = $custom_field_name;
            $this->custom_field_label = $custom_field_label;
            $this->custom_field_instructions = $custom_field_instructions;
            $this->once = false;
            $this->the_original_length = 0;

            add_action('acf/init', array($this, 'get_custom_field_array'));
            add_action('acf/init', array($this, 'get_repeater_data'));
        }

        function get_custom_field_array() {
            $sub_fields_repeater = $this->sub_fields_repeater;
            $custom_field_name = $this->custom_field_name;
            $custom_field_label = $this->custom_field_label;
            $custom_field_instructions = $this->custom_field_instructions;

            if( function_exists('acf_add_local_field_group') ) {
                return array(
                    'key' => "field_$custom_field_name",
                    'label' => $custom_field_label,
                    'name' => $custom_field_name,
                    'type' => 'repeater',
                    'instructions' => $custom_field_instructions,
                    'required' => 0,
                    'conditional_logic' => 1,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    // 'layout' => 'row',
                    'layout' => 'table',
                    'button_label' => 'Add Row',
                    'pagination' => true,
                    'rows_per_page' => 10,
                    'sub_fields' => $sub_fields_repeater,
                );
            }
        }

        function get_repeater_data($post_id) {
            if(!is_admin()){
                $custom_field_name = $this->custom_field_name;
                return get_field($custom_field_name, $post_id);
            }
        }

        function add_new_row_to_repeater($post_id) {

            //ESTA FUNCION ESTA EN PERIODO DE PRUEBA, PODRIA NO FUNCIONAR CORRECTAMENTE
            //POR OTRO LADO AL PARECER NO TIENE UNA REAL UTILIDAD, SI SE NECESITA UNA NUEVa FILA SE PUEDE USAR update_custom_field
            $transient = get_transient('codigo_ejecutado_una_vez');

            echo '<br>';
            echo 'Transient: ';
            echo var_dump($transient);
            echo '<br>';

            if (!$transient) {
            // if (true) {
            
                add_action('acf/init', function() use ($post_id) {

                    $custom_field_name = $this->custom_field_name;

                    $rows = get_field($custom_field_name, $post_id);

                    $new_row_data = array(
                        'repeater_date_picker' => '20240514',
                        // 'repeater_true_false' => 1,
                    );

                    if (!is_array($rows)) {
                        $rows = array(); // Si no hay filas existentes, inicializamos como un array vacío
                    }

                    $rows[] = $new_row_data;

                    update_post_meta($post_id, 'mi_repeater_agregado', true);

                    echo '<br>';
                    echo var_dump($rows);
                    echo '<br>';

                    delete_field($custom_field_name, $post_id);
                    update_field($custom_field_name, $rows, $post_id);



                    // update_post_meta($post_id, 'mi_repeater_agregado', true);
                    set_transient('codigo_ejecutado_una_vez', true, 5);
                    $transient = get_transient('codigo_ejecutado_una_vez');



                    echo '<br>';
                    echo var_dump($transient);
                    echo '<br>';


                    echo '<br>';
                    echo var_dump(count($rows));
                    echo '<br>';

                    
                });

            }
        }

        function update_custom_field($rows, $post_id) {
            add_action('acf/init', function() use ($rows, $post_id) {
                $custom_field_name = $this->custom_field_name;
                update_field($custom_field_name, $rows, $post_id);
            });
        }

        function delete_custom_field($post_id) {
            add_action('acf/init', function() use ($post_id) {
                $custom_field_name = $this->custom_field_name;
                delete_field($custom_field_name, $post_id);
            });
        }
    }
}




