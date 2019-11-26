<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>
    <script type="text/javascript" src="ajax.js"></script>
    <link href="../../../public/vista/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body >
    <section>
        <div class="en">
            <header>
                <?php
                include '../../../config/conexionDB.php';
                $conne = $_GET["conne"];
          
                $tm = strlen($conne);
                //   echo "mensaje- --- --";
                $ref = substr($conne, 1, $tm - 2);
                //   echo $ref;
                $sqlusu = "SELECT * FROM usuario WHERE reunion_correo ='$ref'";
                $result = $conn->query($sqlusu);
                $rl = mysqli_fetch_assoc($result);
                $nm =  $rl["menu_nombres"];
                $ap =  $rl["menu_apellidos"];
                ?>

                <nav>
                    <ul>
                        <li> <a href="../../../config/cerrar_sesion.php">Inicio</a> </li>
                        <li> <a href="crearReunion.php?conne=<?php echo $ref; ?>">Nuevo Mensaje</a> </li>
                        <li> <a href="reunionEnviada.php?conne=<?php echo $ref; ?>">Mensajes Enviados</a> </li>
                        <li> <a href="Cuenta.php?conne=<?php echo $ref; ?>">Mi Cuenta</a> </li>
                    </ul>
                </nav>
             
            </header>
        </div>
        <br>
        <input type="text" id="correobus" name="correobus" value=""  placeholder="Buscar por Remitente ..." >
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarMotivo()">
        <br>
        <div>
            <h2>Reuniones Recibidas</h2>
            <table style="width:100%" border="3px" >
                <tr>
                    <th>REMITENTE</th>
                    <th>DESTINATARIO</th>
                    <th>FECHA/HORA</th>
                    <th>LUGAR</th>
                    <th>LATITUD</th>
                    <th>LONGITUD</th>
                    <th>MOTIVO</th>
                    <th>OBSERVACIONES</th>
                    <th></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
                <?php
                include '../../../config/conexionDB.php';
                $vr = "NO";
                $sql = "SELECT * FROM reunion WHERE reunion_destinatario ='$ref' AND reunion_eliminado = '$vr' ORDER BY reunion_fecha_hora DESC;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "   <td>" . $row['reunion_remitente'] . "</td>";
                        echo "   <td>" . $row['reunion_destinatario'] . "</td>";
                        echo "   <td>" . $row['reunion_fecha_hora'] . "</td>";
                        echo "   <td>" . $row['reunion_lugar'] . "</td>";
                        echo "   <td>" . $row['reunion_latitud'] . "</td>";
                        echo "   <td>" . $row['reunion_longitud'] . "</td>";
                        echo "   <td>" . $row['reunion_motivo'] . "</td>";
                        echo "   <td>" . $row['reunion_observaciones'] . "</td>";
                        echo "   <td>" . "<a href='leer_mensaje.php?conne=" . $ref . "&codigo=" . $row['reunion_codigo'] . "'> Leer </a>" . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <td colspan='4'> No existen Mensajes Recibidos</td>";
                    echo "</tr>";
                }

                $conn->close();
                ?>
            </table>
        </div>

    </section>

</body>

</html>