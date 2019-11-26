<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI CUENTA</title>
    <link href="" rel="stylesheet" type="text/css" />
</head>

<body>
    <section>
        <h2 align="center">MI CUENTA</h2>
        <div>
            <?php
            session_start();
            $conne = $_GET["conne"];
            ?>
            <header>
                <nav>
                    <ul>
                        <li> <a href="indexUser.php?conne='<?php echo $conne; ?>'">ATRAS</a> </li>
                    </ul>
                </nav>

            </header>
        </div>
        <?php

        $conne = $_GET["conne"];
      
        include '../../../config/conexionDB.php';
        echo "</br>";
        $sql = "SELECT * FROM usuario WHERE menu_correo = '$conne' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <form id="formulario01" method="POST" action="../../controlador/usuario/controlador_actualizar.php?codigo=<?php echo $row["usu_codigo"]; ?>& conne=<?php echo $conne; ?>" align="center">

                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $row["menu_codigo"]; ?>" />
                    <br>
                    <input type="hidden" id="usuco" name="usuco" value="<?php echo $conne ?>" />
                    <br>
                    
                    <label for='cedula'>Cedula (*)</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["menu_cedula"]; ?>" />
                    <br>
                    <br>
                    <label for='nombres'>Nombres (*)</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["menu_nombres"]; ?>" />
                    <br>
                    <br>

                    <label for="apellidos">Apellidos (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["menu_apellidos"]; ?>" />
                    <br>
                    <br>

                    <label for="direccion">Dirección (*)</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["menu_direccion"]; ?>" />
                    <br>
                    <br>
                    <label for="telefono">Teléfono (*)</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["menu_telefono"]; ?>" />
                    <br>
                    <br>
                    <label for="fecha">Fecha Nacimiento (*)</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["menu_fecha_nacimiento"]; ?>" />
                    <br>
                    <br>
                    <label for="correo">Correo electrónico (*)</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["menu_correo"]; ?>" />
                    <br>
                    <br>
                    <?php echo "   <td> <a href='modificar_contrasenia.php?codigo=" . $row['menu_codigo'] . "&conne=". $conne ."'>Cambiar contraseña</a> </td>"?>
                    <br>
                    <br>

                    <div>
                        <input class="btn" type="submit" id="modificar" name="modificar" value="Modificar" />
                    </div>

                </form>


            <?php

        }
    } else {
        echo " <p> colspan='10'> EROORRRRR!!!!!! </p>";
        echo "<p>" . mysqli_error($conn) . "</p>";
    }

    $conn->close();
    ?>
    </section>
</body>