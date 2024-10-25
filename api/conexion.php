<?php

$host="localhost";
$usuario="root";
$password="";
$basededatos="cleverclick360";
$tabla = "users";

$conexion= new mysqli($host,$usuario,$password);

if($conexion->connect_error){
    die("Conexión no establecida". $conexion->connect_error);
}

// Verificar si la base de datos existe
$result = $conexion->query("SHOW DATABASES LIKE '$basededatos'");

if ($result->num_rows == 0) {
    // Crear base de datos si no existe
    $sql = "CREATE DATABASE $basededatos";
    if ($conexion->query($sql) !== TRUE) {
        die("Error al crear la base de datos: " . $conexion->error);
    }
}

// Seleccionar la base de datos
$conexion->select_db($basededatos);

// Crear tabla si no existe
$sql = "CREATE TABLE IF NOT EXISTS $tabla (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(100),
    telefono VARCHAR(12) NOT NULL
)";
$conexion->query($sql);

?>