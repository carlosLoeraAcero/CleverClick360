const obtenerRegistros = () => {
    const url = 'http://localhost/cleverclick360/api/apiRest.php';
    fetch(url)
    .then((response) => response.json())
    .then((elementos) => {
        mostrarRegistros(elementos);
    })
}

obtenerRegistros();

const mostrarRegistros = (elementos) => {
    // limpiar tabla
    document.getElementById('lista-elementos').innerHTML = "";

    // agrega elementos a la tabla
    elementos.forEach((elemento) => {
        document.getElementById('lista-elementos').innerHTML += `
        <tr>
            <td>${elemento.id}</td>
            <td>${elemento.nombre}</td>
            <td>${elemento.correo}</td>
            <td>${elemento.telefono}</td>
            <td>
                <button class="btn btn-primary" onclick="editarModal(${elemento.id})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger" onclick="eliminarModal(${elemento.id})">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        `;
    })
}