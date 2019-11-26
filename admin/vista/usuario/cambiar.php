<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cambiar datos del usuario</title>
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
            $rlt = $_GET["cone"];
            //  echo "$rlt";
            $ft = "'" . $rlt . "'";
            //  echo $ft;
            ?>
            <header>
                <nav>
                    <ul>
                        <li> <a href="index.php?cone=<?php echo "$ft"; ?>">Atras</a> </li>
                    </ul>
                </nav>
            </header>
        </div>
 
        <?php
     
        $codigo = $_GET["codigo"];
            include '../../../config/conexionDB.php';   
           echo "<br>";
           $sql = "SELECT * FROM usuario WHERE menu_codigo=$codigo";
            $result = $conn->query($sql);
                if ($result->num_rows>0) {
                    while ($row = $result->fetch_assoc()){
                  ?>  
                  <h2>Editar datos del usuario</h2>
                  <div>
                  <form id="formularioCambiar" method="POST" action="../../controlador/usuario/cambiar.php">
                            <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo?>">
                            <input type="hidden" id="usuco" name="usuco" value="<?php echo $ft ?>" />

                            <label for="cedula">Cedula</label>
                            <input type="text" name="cedula" id= "cedula" value="<?php echo $row["menu_cedula"];?>" required placeholder="Ingrese su cedula" >
                            <br>
                             <label for="nombre">Nombres</label>
                            <input type="text" name="nombre" id= "nombre" value="<?php echo $row["menu_nombres"];?>" required placeholder="Ingrese sus dos nombres" >
                            <br>
                            <label for="apellido">Apellidos</label>
                            <input type="text" name="apellido" id= "apellido" value="<?php echo $row["menu_apellidos"];?>" required placeholder="Ingrese sus dos apellidos" >
                            <br>
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id= "direccion" value="<?php echo $row["menu_direccion"];?>" required placeholder="Ingrese su dirección" >
                            <br>
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" id= "telefono" value="<?php echo $row["menu_telefono"];?>" required placeholder="Ingrese su número de teléfono" >
                            <br>
                            <label for="fechaNacimiento">Fecha Nacimiento</label>
                            <input type="date" name="fechaNacimiento" id= "fechaNacimiento" value="<?php echo $row["menu_fecha_nacimiento"];?>" required placeholder="Ingrese su fecha de nacimiento" >
                            <br>
                            <label for="nombre">Correo Electrónico</label>
                            <input type="email" name="correo" id= "correo" value="<?php echo $row["menu_correo"];?>" required placeholder="Ingrese su correo electrónico" >
                            <br>
                            <input type="submit" name="modificar" id="modificar" value="Modificar">
                            <input type="reset" name="cancelar" id="cancelar" value="Cancelar">
    
                     </form>
                  </div> 
                 
                    <?php
                    }
                } else{

                    echo "<p> colspan='10'> Ha ocurrido un error inesperado </p>";
                    echo "<p>".mysqli_error($conn)."</p>";
                }
                $conn->close();
                ?>
    </body>
</html>