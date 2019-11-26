<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>
    <link href="../../../public/vista/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body >
    <section>
        <div>
            <?php
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

        <div>
            <table style="width:100%" border>
                <tr>
                    <th>REMITENTE</th>
                    <th>DESTINATARIO</th>
                    <th>FECHA/HORA</th>
                    <th>LUGAR</th>
                    <th>LATITUD</th>
                    <th>LONGITUD</th>
                    <th>MOTIVO</th>
                    <th>OBSERVACIONES</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

                </tr>
                <?php
                include '../../../config/conexionDB.php';
                $conne = $_GET["conne"];
                echo 'Correo: ' . $conne;
                $vr = "NO";
                $sql = "SELECT * FROM reunion WHERE reunion_remitente ='$conne' AND reunion_eliminado = '$vr' ORDER BY reunion_fecha_hora DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "   <td>" . $row['reunion_remitente'] . "</td>";
                        echo "   <td>" . $row['reunion_destinatario'] . "</td>";
                        echo "   <td>" . $row["reunion_fecha_hora"] . "</td>";
                        echo "   <td>" . $row['reunion_lugar'] . "</td>";
                        echo "   <td>" . $row['reunion_latitud'] . "</td>";
                        echo "   <td>" . $row['reunion_longitud'] . "</td>";
                        echo "   <td>" . $row['reunion_motivo'] . "</td>";
                        echo "   <td>" . $row['reunion_observaciones'] . "</td>";
                        echo "   <td>" . "<a href='revisarEnviados.php?conne=" . $conne . "&codigo=" . $row['reunion_codigo'] . "'>Leer</a>" . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <td colspan='10'> No existe reunionsajes Enviados </td>";
                    echo "</tr>";
                }

                $conn->close();

                ?>
            </table>
        </div>
    </section>
</body>

</html>