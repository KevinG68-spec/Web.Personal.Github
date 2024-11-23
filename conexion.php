<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "clientes_db");

// Verificar la conexión
if (!$conexion) {
    die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
}
// Aquí solo realizas la conexión y el archivo no debería hacer nada más.
?>
