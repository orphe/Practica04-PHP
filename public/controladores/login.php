<?php
session_start();

include '../../config/conexionDB.php';

$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
$contrasenia = isset($_POST["contrasenia"]) ? trim($_POST["contrasenia"]): null;

$sql = "SELECT * FROM usuario WHERE menu_correo ='$usuario' and menu_password = MD5('$contrasenia')and menu_eliminado = 'N'";

$result = $conn->query($sql);
$rol = mysqli_fetch_assoc($result);
$rolt = $rol["menu_rol"];

    if($result->num_rows>0){
        $_SESSION["isLogged"] = TRUE;
        if($rolt == "Admin"){
            header("Location: ../../admin/vista/admin/index.php?=conne='$usuario'");
        }else {
            header("Location: ../../admin/vista/usuario/indexUser.php?conne='$usuario'"); 
        }
    }
    else {
        
       header ("Location: ../vista/login.html");
    }
    $conn->close();
?>