<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cambiar contraseña</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $codigo = $_GET["codigo"];
            
        ?>
            <form id="formularioContrasenia" method="POST" action="../../controlador/usuario/modificar_contrasenia.php">
                <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo ?>">
                <label for="contrasenia">Contraseña actual</label>
                 <input type="password"  name="contrasenia" id="contrasenia" value="" requied placeholder="Ingrese su contrasena actual  ">
            <br>
                <label for="contrasenia">Contraseña Nueva</label>
                <input type="password" name="contrasenia2" id="contrasenia2" value="" requied placeholder="Ingrese la nueva contrasena  ">
            
            <br>
            <input type="submit" name="cambiar" id="cambiar" value="Cambiar">
            <input type="reset" name="cancelar"  id="cancelar" value="Cancelar">
            </form>


    </body>
</html>