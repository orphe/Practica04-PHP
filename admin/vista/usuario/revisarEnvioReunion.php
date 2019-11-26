<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>MI CUENTA</title>

    <link href="" rel="stylesheet" type="text/css" />


</head>

<body>
    <section>
        <?php
        session_start();
        $conne = $_GET["conne"];
        ?>
        <div>
            <header>
                <nav>
                    <ul>
                        <li> <a href="reunionEnviada.php?conne=<?php echo $conne; ?>">ATRAS</a> </li>
                    </ul>
                </nav>

            </header>
        </div>
        <?php
        $conne = $_GET["conne"];
        echo $conne;
        $codi = $_GET["codigo"];
        echo $codi;
        include '../../../config/conexionBD.php';
        echo "</br>";
        $sql = "SELECT * FROM reunion WHERE reunion_codigo = '$codi'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php">

                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $cedula ?>" />

                    <label for='remitente'>Remitente (*)</label>
                    <input type="text" id="remitente" name="remitente" value="<?php echo $row["reunion_remitente"]; ?>" disabled />
                    <br>
                    <label for='destinatario'>Destinatario (*)</label>
                    <input type="text" id="destinatario" name="destinatario" value="<?php echo $row["reunion_destinatario"]; ?>" disabled />
                    <br>

                    <label for="Fecha">Fecha (*)</label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo $row["reunion_fecha_hora"]; ?>" disabled />
                    <br>

                    <label for='lugar'>Lugar (*)</label>
                    <input type="text" id="lugar" name="lugar" value="<?php echo $row["reunion_lugar"]; ?>" disabled />
                    <br>
                    <label for='latitud'>Latitud (*)</label>
                    <input type="text" id="latitud" name="latitud" value="<?php echo $row["reunion_latitud"]; ?>" disabled />
                    <br>
                    <label for='longitud'>Longitud (*)</label>
                    <input type="text" id="longitud" name="longitud" value="<?php echo $row["reunion_longitud"]; ?>" disabled />
                    <br>
                    <label for="motivo">Motivo (*)</label>
                    <input type="text" id="motivo" name="motivo" value="<?php echo $row["reunion_motivo"]; ?>" disabled />
                    <br>
                    <label for="observaciones">Observaciones (*)</label>
                    <input type="text" id="observaciones" name="observaciones" value="<?php echo $row["reunion_observaciones"]; ?>" disabled />
                    <br>
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
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