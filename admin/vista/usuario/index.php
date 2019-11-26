<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location: /SistemaDeGestion/public/vista/login.html"); }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gestión de usuarios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <<table style="width:100%">
             <tr>
                 <th>Cedula</th>
                 <th>Nombres</th>
                 <th>Apellidos</th>
                 <th>Dirección</th>
                 <th>Telefono</th>
                 <th>Correo</th>
                 <th>Contrasena</th>
                 <th>Fecha Nacimiento</th>
                 <th>Eliminar</th>
                 <th>Modificar</th>
                 <th>Cambiar</th>
             
             </tr>
            <?php
            include '../../../config/conexionDB.php';        
            $sql = "SELECT * FROM usuario";
            $result = $conn->query($sql);
                if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$row["menu_cedula"]."</td>";
                            echo "<td>".$row["menu_nombres"]."</td>";
                            echo "<td>".$row["menu_apellidos"]."</td>";
                            echo "<td>".$row["menu_direccion"]."</td>";
                            echo "<td>".$row["menu_telefono"]."</td>";
                            echo "<td>".$row["menu_correo"]."</td>";
                            echo "<td>".$row["menu_password"]."</td>";
                            echo "<td>".$row["menu_fecha_nacimiento"]."</td>";
                            echo "<td> <a href='eliminar.php?codigo=" . $row['menu_codigo'] . "'>Eliminar</a> </td>";
                            echo "<td> <a href='modificar.php?codigo=" . $row['menu_codigo'] . "'>Modificar</a> </td>";
                            echo "<td> <a href='cambiar_contrasenia.php?codigo=" . $row['menu_codigo'] . "'>Cambiar Contraseña </a> </td>";
                            echo "</tr>";
                        }                    
                }else{
                    echo "<tr>";
                    echo "<td colspan='7'>No existen usuarios registrados en el sistema</td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>

        </table>

    </body>
</html>