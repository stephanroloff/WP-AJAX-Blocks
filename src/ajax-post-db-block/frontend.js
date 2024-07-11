import { ResponseComponent } from "./ResponseComponent.js";
import { send_data_to_backend } from "../ajax-post.js";

//Example 1: The data is sent by clicking on a button.
let mi_boton = document.querySelector('#mi-boton');

mi_boton.addEventListener('click', ()=>{
    let user_id = document.querySelector('#user-id').value;
    let valor_texto = document.querySelector('#mi-valor').value;
    
    let dataObject = {
        valor_texto: valor_texto,
        user_id: user_id
    }
    send_data_to_backend('post_data_to_db', dataObject, ResponseComponent, 'response');
})


//Example 2: The data is sent by 



