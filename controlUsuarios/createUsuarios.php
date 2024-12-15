<?php 
include('../db.php');





//Datos del Formulario 

if(isset($_POST['submit'])){
    $nombres =  $_POST['nombres'];
    $usuario =  $_POST['usuario'];
    $email =  $_POST['email'];
    $password = $_POST['pass'];
    $telefono = $_POST['telefono'];
    $rol_id = intval($_POST['rol']); 

    
    $query = "INSERT INTO usuariosweb(nombres, usuario, id_rol, clave, email, telefono)
              VALUES ('$nombres','$usuario','$rol_id', '$password' ,'$email','$telefono');";

    if($conn->query($query)==TRUE){
        header('Location: ../controlUsuarios.php');
    }else{
        echo "Error de procedimiento de ingreso de datos";
    }

}

?>

