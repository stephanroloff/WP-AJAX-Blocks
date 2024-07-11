import { ajax_start } from "../ajax-get.js";
import { TestComponent } from "./TestComponent.js";

let updateButton = document.querySelector('.update-data');

//Example 1: The data is receive by clicking on a button.
updateButton.addEventListener('click', ()=>{
    ajax_start('send_data_to_frontend', TestComponent, 'ajax-get-from-db');
})

// //Example 2: The data is receive every 3 seconds

// setInterval(() => {
//     ajax_start('send_data_to_frontend', TestComponent, 'ajax-get-from-db');
// }, 3000);

//Example 3: The data is receive by page loading
ajax_start('send_data_to_frontend', TestComponent, 'ajax-get-from-db');


//Example 4: The data is receive at an exact time.
// {
//     function scheduleCheck(timeObject) {
//         const now = new Date();
//         const currentTime = now.getTime();
    
//         let nextExecution = new Date(now);
//         nextExecution.setFullYear(timeObject.year);
//         nextExecution.setMonth(timeObject.month); 
//         nextExecution.setDate(timeObject.day);
//         nextExecution.setHours(timeObject.hours);
//         nextExecution.setMinutes(timeObject.minutes);
//         nextExecution.setSeconds(timeObject.seconds);
    
//         // Si ya se paso el tiempo, se ejecuta el codigo
//         if (currentTime > nextExecution.getTime()) {
//             ajax_start('send_data_to_frontend', TestComponent, 'ajax-get-from-db');
//         }
    
//         const timeUntilNextExecution = nextExecution.getTime() - currentTime;
//         console.log('Time left:', `${timeUntilNextExecution/1000} seconds`);
    
//         // Configurar setTimeout para la próxima ejecución
//         setTimeout(function() {
//             ajax_start('send_data_to_frontend', TestComponent, 'ajax-get-from-db');
//         }, timeUntilNextExecution);
//     }
    
//     let timeObject = {
//         year: 2024,
//         month: 6,
//         day: 11, // The months in JavaScript are 0-11, where 0 is January and 11 is December.
//         hours: 14,
//         minutes: 2,
//         seconds: 0,
//     }
    
//     // Programar la primera ejecución
//     scheduleCheck(timeObject);
// }

