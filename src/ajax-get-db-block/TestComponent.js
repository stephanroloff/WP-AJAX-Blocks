export function TestComponent({dataBackend}) {
    //Aqui se procesan los datos que llegan del backend

    console.log('Data Backend: ', dataBackend);

    let countries = [
        dataBackend['text_event_name1'], 
        dataBackend['repeater_fields1_1_event_name_initial'], 
        dataBackend['repeater_fields1_2_event_name_initial'], 
    ];

    return (
        <div>
            {countries.map(element => (
                <p key={element}>{element}</p>
            ))}
        </div>
    );
}