<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Eliminar datos del usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>       
        <br>
        <?php
        session_start();
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario WHERE menu_codigo=$codigo";
        include '../../../config/conexionDB.php';

        $result=$conn->query($sql);
            if ($result->num_rows>0) {
                while($row = $result->fetch_assoc()){
        ?>  
                <form id="formularioEliminar" method="POST" action="../../controlador/usuario/eliminar.php"> 
                    <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo?>">
                    <label for="cedula">Cedula</label>
                    <input type="text" name="cedula" id="cedula" value="<?php echo $row["menu_cedula"];?>" disabled>
                    <br>

                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $row["menu_nombres"];?>" disabled>
                    <br>

                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" value="<?php echo $row["menu_apellidos"];?>" disabled>
                    <br>
                    
                    <label for="apellido">Dirección</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $row["menu_direccion"];?>" disabled>
                    <br>
                    
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $row["menu_telefono"];?>" disabled>
                    <br>

                    <label for="fechaNacimiento">Fecha Nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $row["menu_fecha_nacimiento"];?>" disabled>
                    <br>

                    <label for="apellido">Correo</label>
                    <input type="email" name="correo" id="correo" value="<?php echo $row["menu_correo"];?>" disabled>
                    <br>
                    <input type="submit" name="eliminar" id="eliminar" value="Eliminar">
                    <input type="reset" name="cancelar" id="cancelar"   value="Cancelar">

                </form>
                    <?php
                }
            }else {
                echo "<p>Ha ocurrido un error inesperado</p>";
                echo "<p>" .mysqli_error($conn)."</p>";
            }
            $conn->close();
            ?>
    </body>
</html>