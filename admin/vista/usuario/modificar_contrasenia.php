<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cambiar contraseña</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

    <div>
            <?php
            session_start();
            $cedula = $_GET["codigo"];
            // echo "$cedula";
            include '../../../config/conexionBD.php';
            echo "</br>";
            $sql = "SELECT * FROM usuario WHERE menu_codigo = '$cedula' ";
            $result = $conn->query($sql);
            $rl = mysqli_fetch_assoc($result);
            $rlt = $_GET["conne"];
            //  echo "$rlt";
            $ft = "'" . $rlt . "'";
            //  echo $ft;
            ?>
            <header>
                <nav>
                    <ul>
                        <li> <a href="index.php?conne=<?php echo "$ft"; ?>">Atras</a> </li>
                    </ul>
                </nav>
            </header>
        </div>

        <?php
            $codigo = $_GET["codigo"];
            
        ?>
            <form id="formularioContrasenia" method="POST" action="../../controlador/usuario/modificar_contrasenia.php">
                <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo ?>">
               
                <input type="hidden" id="usuco" name="usuco" value="<?php echo $ft ?>" />
                <br>
                <br>

                <label for="contrasenia">Contraseña actual</label>
                 <input type="password"  name="contrasenia" id="contrasenia" value="" requied placeholder="Ingrese su contrasena actual  ">
                 <br>
                <label for="contrasenia">Contraseña Nueva</label>
                <input type="password" name="contrasenia2" id="contrasenia2" value="" requied placeholder="Ingrese la nueva contrasena  ">
            
                 <br>
                <input type="submit" name="cambiar" id="cambiar" value="Cambiar">
                <button type="button" class="btn btn-default"> <a href="indexUser.php?conne=<?php echo "$ft"; ?>">Cancelar</a></button>

            </form>


    </body>
</html>