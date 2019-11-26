<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>Crear Reunión</title>
    <link href="../../../public/vista/estilos.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="validar.js"></script>

</head>

<body >
    <section>
        <div>
            <?php
            $cone = $_GET["cone"];
            //echo $cone;
            ?>
            <header align="center">
                <h1>Nueva Reunión</h1>
            </header>
        </div>
        
        <div>
            <form action="../../controladores/controladorReunion.php" method="POST" align="center">
                <input type="hidden" id="remitente" name="remitente" value="<?php echo $conne ?>" />
                
                <label id="destinatario">Para :</label>
                <input type="text"  id="destinatario" name="destinatario" onkeyup="" placeholder="Ingrese el correo del usuario a invitar" required/>
                <span id="correocorrecto"></span>
                <br>
                <br>
                
                <label for="fecha">Fecha y hora</label>
                <input type="date" name="fecha" id="fecha" value="" required>
                <br>
                <br>

                <label for="lugar">Lugar</label>
                <input type="text" name="lugar" id="lugar" value="" required>
                <br>
                <br>
                
                <label for="coordenadas">Coordenadas</label>
                <input type="text" name="coordenadas" id="coordenadas" value="" required>
                <br>
                <br>

                <label id="motivo">Motivo :</label>
                <input type="text" name="motivo"  required> 
                <br>
                <br>

                <label id="Observaciones">Observaciones</label>
                <input class="pl" type="text" name="mensaje" id="nensaje" required/>
                <br>
                <br>

                <div>
                <input class="submit" id="guargar" name="guardar" type="submit" value="Enviar">&nbsp;
                <input class="reset" id="borrar" name="borrar" type="Reset" value="Borrar">
                <button type="button" class="btn btn-default"><a href="index_usuario.php?cone='<?php echo $cone; ?>'">CANCELAR</a></button>
                </div>
                <br>
            </form>
        </div>
        <footer class="inf">
     <br >&copy; Todos los derechos reservados
   </footer>
    </section>
</body>

</html>