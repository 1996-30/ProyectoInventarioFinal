<?php 
include('../db.php');





//Datos del Formulario 

if(isset($_POST['submit'])){
    $descripcion =  $_POST['categoria'];
   

    
    $query = "INSERT INTO categorias1(descripcion)
              VALUES ('$descripcion');";

    if($conn->query($query)==TRUE){
        header('Location: ../controlCategorias.php');
    }else{
        echo "Error de procedimiento de ingreso de datos";
    }

}

?>
