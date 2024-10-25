$("body").on("submit", "#form-crear", function(event){
    event.preventDefault();
    if($("#form-crear").valid()){
        agregarRegistro();
    }
})

const agregarRegistro = () => {
    const nombre = document.getElementById("nombre").value;
    const correo = document.getElementById("correo").value;
    const telefono = document.getElementById("telefono").value;

      fetch("http://localhost/cleverclick360/api/apiRest.php", {
        method: "POST",
        body: JSON.stringify({ nombre, correo, telefono }),
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => response.json())
        .then((resultado) => {
            console.log(resultado);
          // Verificamos si se agregó correctamente
          if (resultado.estado === 200) {

            // Muestra un mensaje de alerta con SweetAlert
            Swal.fire({
              icon: "success",
              title: "Solicitud exitosa",
              text: `${resultado.mensaje}`,
            });

            //limpiar campos
            document.getElementById('nombre').value = '';
            document.getElementById('correo').value = '';
            document.getElementById('telefono').value = '';
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