// escucha form editar
$("body").on("submit", "#form-editar", function(event){
    event.preventDefault();
    if($("#form-editar").valid()){
        editarRegistro();
    }
})

const editarRegistro = () => {
        const id = document.getElementById("form-editar-id").value;
        const nombre = document.getElementById("form-editar-nombre").value;
        const correo = document.getElementById("form-editar-correo").value;
        const telefono = document.getElementById("form-editar-telefono").value;

        fetch(`http://localhost/cleverclick360/api/apiRest.php/${id}`, {
            method: "PUT",
            body: JSON.stringify({ id, nombre, correo, telefono }),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then((response) => response.json())
            .then((resultado) => {
                // Verificamos si se editó correctamente
                if (resultado.estado === 200) {
                    // Cerramos el modal y mostramos un mensaje de éxito
                    $("#modal-editar").modal("hide");

                    // Muestra un mensaje de alerta con SweetAlert
                    Swal.fire({
                        icon: "success",
                        title: "Solicitud exitosa",
                        text: `${resultado.mensaje}`,
                    });

                    // Actualizamos la lista de registros
                    obtenerRegistros();
                } else {
                    // Mostramos un mensaje de error
                    swal(
                        "Error",
                        `${resultado.mensaje}`,
                        "error"
                    );
                }
            });
}

const editarModal = (id) => {
    $("#modal-editar").modal("show");
    fetch(`http://localhost/cleverclick360/api/apiRest.php/${id}`)
    .then((response) => response.json())
    .then((elemento) => {
        document.getElementById("form-editar-id").value = elemento[0].id;
        document.getElementById("form-editar-nombre").value = elemento[0].nombre;
        document.getElementById("form-editar-correo").value = elemento[0].correo;
        document.getElementById("form-editar-telefono").value = elemento[0].telefono;
    })
}
