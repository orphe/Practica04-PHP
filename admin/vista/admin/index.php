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
         <!-- 
            creando conexión hacia la base de datos para extraer la información del usuario  -->
        <?php
            include '../../../config/conexionDB.php';
                $conne = $_GET["conne"];
                echo $conne;
                $tm = strlen($conne);
                echo $tm;
              $ref = substr($conne, 1, $tm - 2);
        echo $ref;
         $sqlusu = "SELECT * FROM usuario WHERE usu_correo ='$ref'";
         $result = $conn->query($sqlusu);
         $rl = mysqli_fetch_assoc($result);
         $nm =  $rl["menu_nombres"];
         $ap =  $rl["menu_apellidos"];
        ?>
        <!-- 
            navegacion hacia la pagina index admin  -->
        <header>
                <nav>
                    <ul>
                        <li> <a href="indexAdmin.php?conne=<?php echo "$conne";?>">Atras</a> </li>
                    </ul>
                </nav>
        </header>

        <h2>Usuarios Existentes</h2>
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
            $conne = $_GET["conne"];
            include '../../../config/conexionDB.php';        
            $sql = "SELECT * FROM usuario  WHERE menu_eliminado = 'N' and menu_rol= 'User';";
            $result = $conn->query($sql);
                if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo " <td>".$row["menu_cedula"]."</td>";
                            echo " <td>".$row["menu_nombres"]."</td>";
                            echo " <td>".$row["menu_apellidos"]."</td>";
                            echo " <td>".$row["menu_direccion"]."</td>";
                            echo " <td>".$row["menu_telefono"]."</td>";
                            echo " <td>".$row["menu_correo"]."</td>";
                            echo " <td>".$row["menu_password"]."</td>";
                            echo " <td>".$row["menu_fecha_nacimiento"]."</td>";
                            echo " <td> <a href='eliminar.php?codigo=" . $row['menu_codigo'] . "& conne=". $ref ."'>Eliminar</a> </td>";
                            echo " <td> <a href='cambiar.php?codigo=" . $row['menu_codigo'] . "& conne=". $ref ."'>Modificar</a> </td>";
                            echo " <td> <a href='modificar_contrasenia.php?codigo=" . $row['menu_codigo'] . "& conne=". $ref ."'>Cambiar Contraseña </a> </td>";
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