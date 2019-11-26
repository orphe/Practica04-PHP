<?php
session_start();

include '../../config/conexionDB.php';

$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
$contrasenia = isset($_POST["contrasenia"]) ? trim($_POST["contrasenia"]): null;

$sql = "SELECT * FROM usuario WHERE menu_correo ='$usuario' and menu_password = MD5('$contrasenia')";

$result = $conn->query($sql);

    if($result->num_rows>0){
        $_SESSION["isLogged"] = TRUE;
        header("Location: ../../admin/vista/usuario/index.php");
    }
    else {
        
       header ("Location: ../vista/login.html");
    }
    $conn->close();
?>