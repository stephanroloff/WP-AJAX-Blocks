<?php
function myFunction($mi_parametro){

    $valor_texto = sanitize_text_field($mi_parametro['valor_texto']);
    $user_id = absint($mi_parametro['user_id']);
    $meta_key = 'days_of_the_year';
    
    if (metadata_exists('user', $user_id, $meta_key)) {

        $meta_value = get_user_meta($user_id, $meta_key, true);

        date_default_timezone_set('Europe/Berlin');
        $fechaHoraActual = date('Y-m-d H:i:s');
        array_push($meta_value, $fechaHoraActual);

        echo 'Metadato existe, te lo mostramos:';
        echo '<br>';
        echo 'user_id: ' . $user_id;
        echo '<br>';
        echo 'meta_key: ' . $meta_key;
        echo '<br>';
        echo 'valor_texto: ' . $valor_texto;
        echo '<br>';
        echo '<pre>';
        var_dump($meta_value);
        echo '</pre>';
        echo '<br>';

        update_user_meta($user_id, $meta_key, $meta_value);
        
        // delete_user_meta($user_id, $meta_key);
        // echo 'Dato Borrado con exito';
    } else {
        echo 'Metadata doesnt exist, we create it...';
        date_default_timezone_set('Europe/Berlin');
        $fechaHoraActual = date('Y-m-d H:i:s');

        $array_fechas = array($fechaHoraActual);
        var_dump($array_fechas);

        add_user_meta($user_id, $meta_key, $array_fechas);

        echo '<br>';
        echo 'user_id: ' . $user_id;
        echo '<br>';
        echo 'meta_key: ' . $meta_key;
        echo '<br>';
        echo 'meta value: ' . $fechaHoraActual;
    }
        
}