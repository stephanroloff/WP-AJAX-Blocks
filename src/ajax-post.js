export function send_data_to_backend(server_action_name, dataObject, ResponseComponent, divForData) {
    jQuery(document).ready(function($) {
    
        var datos = {
            action: server_action_name,
            mi_parametro: dataObject,
            security: my_script_vars.security
        };
        $(`#${divForData}`).html('Sending Data...'); 

        $.post(my_script_vars.ajax_url, datos, function(response) {
            ReactDOM.render(
                <ResponseComponent dataBackend={response}/>,
                document.getElementById(divForData)
            );
        });
    });
}