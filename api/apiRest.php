<?php

include "conexion.php";

header("Content-Type: application/json");
$metodo= $_SERVER['REQUEST_METHOD'];

$path= isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';

$buscarId = explode('/', $path);

$id= ($path!=='/') ? end($buscarId):null;

switch($metodo){
    case 'GET':
        consulta($conexion, $id);
        break;
    case 'POST':
        insertar($conexion);
        break;
    case 'PUT':
        actualizar($conexion, $id);
        break;
    case 'DELETE':
        borrar($conexion, $id);
        break;
    default:
        echo "Método no permitido";
}

function consulta($conexion, $id){
    $sql= ($id === null) ? "SELECT * FROM users" : "SELECT * FROM users WHERE id = ?";
    $stmt = $conexion->prepare($sql);

    if ($id !== null) {
        $stmt->bind_param("i", $id);
    }
    
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    $datos = array();
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }
    
    echo json_encode($datos);
    $stmt->close();
}

function insertar($conexion){
    $dato= json_decode(file_get_contents('php://input'),true);

    if (!isset($dato['nombre'], $dato['correo'], $dato['telefono'])) {
        die(json_encode(array('estado' => 400, 'mensaje' => 'Datos incompletos.')));
    }

    $stmt = $conexion->prepare("INSERT INTO users (nombre, correo, telefono) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $dato['nombre'], $dato['correo'], $dato['telefono']);

    if ($stmt->execute()) {
        $dato['id'] = $conexion->insert_id;
        die(json_encode(array('data' => $dato, 'estado' => 200, 'mensaje' => 'Usuario creado de manera exitosa.')));
    } else {
        die(json_encode(array('estado' => 500, 'mensaje' => 'Error al crear usuario: ' . $stmt->error)));
    }

    $stmt->close();
}

function borrar($conexion, $id){
    $stmt = $conexion->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        die(json_encode(array('estado' => 200, 'mensaje' => 'Usuario eliminado')));
    } else {
        die(json_encode(array('estado' => 500, 'mensaje' => 'Error al eliminar el usuario: ' . $stmt->error)));
    }

    $stmt->close();
}

function actualizar($conexion, $id){
    $dato= json_decode(file_get_contents('php://input'),true);

    if (!isset($dato['nombre'], $dato['correo'], $dato['telefono'])) {
        die(json_encode(array('estado' => 400, 'mensaje' => 'Datos incompletos.')));
    }

    $stmt = $conexion->prepare("UPDATE users SET nombre= ?, correo = ?, telefono = ? WHERE id = ?");
    
    // Comprobar si la preparación fue exitosa
    if ($stmt === false) {
        die(json_encode(array('estado' => 500, 'mensaje' => 'Error al preparar la consulta: ' . $conexion->error)));
    }

    // Enlazar los parámetros
    $stmt->bind_param("sssi", $dato['nombre'], $dato['correo'], $dato['telefono'], $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        die(json_encode(array('estado' => 200, 'mensaje' => 'Usuario actualizado de manera exitosa.')));
    } else {
        die(json_encode(array('estado' => 500, 'mensaje' => 'Error al actualizar el usuario: ' . $stmt->error)));
    }

    // Cerrar la declaración
    $stmt->close();

}

$conexion->close();

?>