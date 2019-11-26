<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Eliminar datos del usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
    <?php

     include '../../../config/conexionDB.php';

    $codigo = $_POST["codigo"];

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE usuario SET menu_eliminado = 'S', menu_fecha_modificacion = '$fecha' WHERE menu_codigo = $codigo";
        if ($conn->query($sql)===TRUE) {
            echo "<p> Se ha eliminado los datos correctamente </p>";
        } else{
            echo "<p> Error:".$sql."<br>".mysqli_error($conn) ."</p>";
        }
        echo "<a href='../../vista/usuario/index.php'> Regresar </a>";
        $conn->close();
    ?>
    </body>
</html>