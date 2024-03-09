<?php
include("conexion_bd.php");
echo '<link href="estilo.css" rel="stylesheet">';
if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 && 
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['telefono']) >= 1 &&    
        strlen($_POST['comentario'])) {
        
        $telefono = trim($_POST['telefono']);
        $email = trim($_POST['email']);
        $consulta_existencia = "SELECT * FROM subscriptores WHERE telefono = '$telefono' OR email = '$email'";
        $resultado_existencia = mysqli_query($conex, $consulta_existencia);
        
        if (mysqli_num_rows($resultado_existencia) > 0) {
            echo "<h3 class='ok' id='mensaje'>El teléfono o correo electrónico ya están registrados. Por favor, registrese nuevamente.</h3>";
        } else {
            $nombre = trim($_POST['nombre']);
            $comentario = trim($_POST['comentario']);
            $telefono = trim($_POST['telefono']);
            $email = trim($_POST['email']);
            $fecha_reg = date("d/m/y");
            $consulta = "INSERT INTO subscriptores(nombre, telefono, email, comentario, fecha_reg) VALUES ('$nombre','$telefono','$email', '$comentario','$fecha_reg')";
            $resultado = mysqli_query($conex,$consulta);
            if ($resultado) {
                echo "<h3 class='ok' id='mensaje'>¡Se ha registrado con exito!</h3>";

            } else {
                echo "<h3 class='ok' id='mensaje'>¡Ha ocurrido un error, regístrese nuevamente!</h3>";
            }
        }
    } else {
        echo "<h3 class='ok' id='mensaje'>¡Por favor complete todos los campos correctamente!</h3>";
    }
}