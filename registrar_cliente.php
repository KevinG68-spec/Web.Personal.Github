<?php
include 'conexion.php'; // Incluir archivo de conexión

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario y prevenir inyecciones SQL
    $empresa = mysqli_real_escape_string($conexion, $_POST["empresa"]);
    $nombre_contacto = mysqli_real_escape_string($conexion, $_POST["nombre_contacto"]);
    $pais = mysqli_real_escape_string($conexion, $_POST["pais"]);

    // Verificar si la empresa ya existe en la base de datos
    $verificar_cliente = mysqli_query($conexion, "SELECT * FROM clientes WHERE empresa = '$empresa' AND nombre_contacto = '$nombre_contacto'");

    if (mysqli_num_rows($verificar_cliente) > 0) {
        echo '<script>
                alert("El cliente ya está registrado.");
                window.location.href = "index.html"; // Redirige a la página principal
              </script>';
        exit;
    }

    // Insertar los datos en la tabla clientes
    $insertar = "INSERT INTO clientes (empresa, nombre_contacto, pais) 
                VALUES ('$empresa', '$nombre_contacto', '$pais')";
    
    $resultado = mysqli_query($conexion, $insertar);

    // Verificar el resultado
    if ($resultado) {
        echo '<script>
                alert("Registro efectuado correctamente");
                window.location.href = "index.html"; // Redirige a la página principal
              </script>';
    } else {
        echo '<script>
                alert("Error al registrar el cliente: ' . mysqli_error($conexion) . '");
                window.location.href = "index.html"; // Redirige a la página principal
              </script>';
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Cliente</title>
  <link rel="stylesheet" href="css/stylesss.css"> <!-- Aquí se enlaza tu archivo CSS -->
</head>
<body>

  <a href="index.html">
    <header>
      <h1 class="titulo">Kevin Daniel Gallegos Carrillo <span style="color: rgb(227, 24, 24);"> Portafolio</span></h1>
    </header>
  </a>

  <main>
    <form method="POST" action="registrar_cliente.php">
      <fieldset>
          <legend>Registrar Cliente</legend>
          <div class="campos">
              <div class="campo">
                  <label for="empresa">Empresa</label>
                  <input class="input-text" type="text" name="empresa" id="empresa" placeholder="Nombre de la empresa" required>
              </div>
      
              <div class="campo">
                  <label for="nombre_contacto">Nombre de Contacto</label>
                  <input class="input-text" type="text" name="nombre_contacto" id="nombre_contacto" placeholder="Nombre del contacto" required>
              </div>
      
              <div class="campo">
                  <label for="pais">País</label>
                  <input class="input-text" type="text" name="pais" id="pais" placeholder="País del cliente" required>
              </div>
          </div>

          <div class="boton-margin">
              <input class="boton" type="submit" value="Registrar Cliente">
          </div>
      </fieldset>
    </form>
  </main>

</body>
</html>
