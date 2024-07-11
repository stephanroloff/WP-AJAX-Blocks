export function ResponseComponent({dataBackend}) {
    //Aqui se procesan la respuesta que llega del backend
    console.log('Data Backend POST: ', dataBackend);

    return (
        <div>
            <p>Data has been saved successfully</p>
        </div>
    );
}