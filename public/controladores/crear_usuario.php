<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Crear Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <style type="text/css " rel="stylesheet">
            .error{
                color:red;
            }
        </style>
    </head>
    <body>

        <?php
        include '../../config/conexionDB.php';
//trim corta la cadena de derecha/izquierda
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]): null;
        $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8'): null;
        $apellido = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8'): null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8'): null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
        $contrasenia = isset($_POST["contrasenia"]) ? trim($_POST["contrasenia"]): null;
        $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;  
        $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombre', '$apellido', '$direccion', '$telefono', 
        '$correo', MD5('$contrasenia'),'$fechaNacimiento', 'N', null, null)"; 
        if ($conn->query($sql)===TRUE){
            echo "<p>Se han creado los datos correctamente  </p>";
        }
        else {

            if($conn->errno ==1062){
                echo "<p class='error'> La persona con la cedula $cedula ya se encuentra registrada en el sistema</p>";

            }else{
                echo "<p class='error'>Error:".mysqli_error($conn)." </p>";
            }
        }
        $conn->close();
        echo "<a href='../vista/crear_usuario.html'>Regresar</a>"

        ?>

    </body>
</html>