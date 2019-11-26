<!DOCTYPE html>
<html lang="es">

<head>
</head>

<body>
    <table style="width:100%" border>
        <tr>
            <th>REMITENTE</th>
            <th>DESTINATARIO</th>
            <th>FECHA</th>
            <th>LUGAR</th>
            <th>LATITUD</th>
            <th>LONGITUD</th>
            <th>MOTIVO</th>
            <th>OBSERVACIONES</th>

            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

        </tr>
        <?php
        include '../../config/conexionDB.php';
        
        $conne = $_GET["motivo"];
        //   echo $cone;
        $tm = strlen($conne);
        //   echo "mensaje- --- --";
        $ref = substr($conne, 1, $tm - 2);
        //   echo $ref;
        $sql = "SELECT * FROM mensaje WHERE men_destinatario ='$ref' AND men_eliminado = '$vr' ORDER BY men_fecha DESC;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row['reunion_remitente'] . "</td>";
                echo "   <td>" . $row['reunion_destinatario'] . "</td>";
                echo "   <td>" . $row["reunion_fecha"] . "</td>";
                echo "   <td>" . $row['reunion_lugar'] . "</td>";
                echo "   <td>" . $row['reunion_latitud'] . "</td>";
                echo "   <td>" . $row['reunion_longitud'] . "</td>";
                echo "   <td>" . $row['reunion_motivo'] . "</td>";
                echo "   <td>" . $row['reunion_observaciones'] . "</td>";
                echo "   <td>" . "<a href='../../../public/vista/revisarReunion.php?conne=" . $ref . "&codigo=" . $row['reunion_codigo'] . "'>Leer</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existe Usuarios </td>";
            echo "</tr>";
        }

        $conn->close();

        ?>
    </table>
</body>

</html>