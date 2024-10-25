const eliminarModal = (id) => {
    // Mostramos un mensaje de confirmación
    Swal.fire({
      title: "¿Estás seguro?",
      text: "Una vez eliminado, no podrás recuperar el elemento",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, borralo!",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch(`http://localhost/cleverclick360/api/apiRest.php/${id}`, {
          method: "DELETE",
        })
          .then((response) => response.json())
          .then((resultado) => {
            // Verificamos si se eliminó correctamente
            if (resultado.estado === 200) {
              // Muestra un mensaje de alerta con SweetAlert
              Swal.fire({
                icon: "success",
                title: "Solicitud exitosa",
                text: `${resultado.mensaje}`,
              });
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
    });
  }