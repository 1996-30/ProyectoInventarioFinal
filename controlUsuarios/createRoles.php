<?php 
include('../db.php');





//Datos del Formulario 

if(isset($_POST['submit'])){
    $rol =  $_POST['rol'];
   
    
    $query = "INSERT INTO roles(nombre)
              VALUES ('$rol');";

    if($conn->query($query)==TRUE){
        header('Location: ../controlRoles.php');
    }else{
        echo "Error de procedimiento de ingreso de datos";
    }

}

?>

