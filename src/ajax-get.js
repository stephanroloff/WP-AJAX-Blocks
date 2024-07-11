export function ajax_start(server_action_name, Component, divForData) {
    jQuery(document).ready(function($) {
        $.ajax({
            url: my_script_vars.ajax_url,
            type: 'get',
            data: {
                action: server_action_name, 
            },
            success: function(response) {
                let data = JSON.parse(response);
    
                if (data) {
                    ReactDOM.render(
                        <Component dataBackend={data}/>,
                        document.getElementById(divForData)
                    );
                } else {
                    $(`#${divForData}`).html('No valid data found.');
                }
            }
        });
    });
}