<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cambiar datos del menuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
    <?php
   
    include '../../../config/conexionDB.php';

    $codigo = $_POST["codigo"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]): null;
    $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8'): null;
    $apellido = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8'): null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8'): null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE menuario". "SET menu_cedula = '$cedula', " .
    "menu_nombres = '$nombre', " . "menu_apellidos = '$apellido', " . "menu_direccion = '$direccion', " .
    "menu_telefono = '$telefono', " .
    "menu_correo = '$correo', " . "menu_fecha_nacimiento = '$fechaNacimiento', " . "menu_fecha_modificacion = '$fecha' " .
    "WHERE menu_codigo = $codigo"; 

        if ($conn->query($sql)===TRUE) {
            echo "<p> Se han actualizado los datos correctamente </p>";
        } else{
            echo "<p> Error:".$sql."<br>".mysqli_error($conn) ."</p>";
        }
        echo "<a href='../../vista/usuario/index.php'> Regresar </a>";
        $conn->close();
    ?>

    </body>
</html>