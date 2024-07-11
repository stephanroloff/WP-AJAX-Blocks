//JAVASCRIPT JUST FRONTEND
//This Block is send data to AjaxGetFromRestApi.php

jQuery(document).ready(function ($) {
    $('#load-api').click(function () {
        $.ajax({
            url: my_script_vars.ajax_url,
            type: 'get',
            data: {
                action: 'get_data_from_rest_api', 
            },
            success: function(response) {
                let datos = JSON.parse(response);
                let data_array = datos['results'];

                // Comprueba si los datos son un array
                if (Array.isArray(data_array)) {
                let listaHTML = '<ul>';
                data_array.forEach(function(dato) {
                    listaHTML += '<li>' + dato.name + '</li>';
                });
                listaHTML += '</ul>';
                
                $('#load-response').html(listaHTML);
                } else {
                    $('#load-response').html('No se encontraron datos válidos.');
                }
            }
        });
    });
});
