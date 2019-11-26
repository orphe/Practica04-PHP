<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Modificar contrasenia del usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
            include '../../../config/conexionDB.php';
            
            $codigo = $_POST["codigo"];
            $contrasenia = isset($_POST["contrasenia"]) ? trim($_POST["contrasenia"]): null; 
            $contrasenia2 = isset($_POST["contrasenia2"]) ? trim($_POST["contrasenia2"]): null; 
                $sqlContrasenia = "SELECT * FROM usuario WHERE menu_codigo = $codigo and menu_password = MD5O('$contrasenia')";
                $result = $conn->query($sqlContrasenia);    
                if ($result->num_rows>0) {
                       default_time_zones("America/Guayaquil");
                        $fecha = date('Y-m-d H:i:s', time());

                        $sqlContrasenia2 = "UPDATE usuario".
                        "SET menu_password = MD5($contrasena2), " . "menu_fecha_modificacion = '$fecha' " . "WHERE menu_codigo = $codigo";
                    
                            if ($conn->query($sqlContrasenia2)===TRUE) {
                                echo "Se ha actualizado la contrasenia  <br>";
                            }else{
                                echo "<p>Error:".mysqli_error($conn)."</p>";
                            }
                    }else {
                        echo "<p> Ingrese bien su contrasenia </p>";
                    }
                    echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
                    $conn->close();
            ?>
    </body>
</html>