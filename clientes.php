<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "clientes_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener los datos
$sql = "SELECT empresa, nombre_contacto, pais FROM clientes";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="css/styless.css"> <!-- Archivo CSS para estilos -->
</head>
<body>

    <a href="index.html"><header>
        <h1 class="titulo">Kevin Daniel Gallegos Carrillo <span style="color: rgb(227, 24, 24);"> Portafolio</span></h1>
     </header></a>
     
    <div class="container">
        <h1 class="titulo">Listado de Clientes</h1>
        <table class="tabla-clientes">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Nombre de Contacto</th>
                    <th>País</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["empresa"] . "</td>";
                        echo "<td>" . $fila["nombre_contacto"] . "</td>";
                        echo "<td>" . $fila["pais"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay datos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conexion->close();
?>
