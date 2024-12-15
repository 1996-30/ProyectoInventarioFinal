<?php 
include('../db.php');





//Datos del Formulario 

if(isset($_POST['submit'])){
    $nit =  $_POST['nit'];
    $nombre =  $_POST['nombre'];
    $telefono =  $_POST['telefono'];
    $direc = $_POST['direccion'];
   

    
    $query = "INSERT INTO proveedores1(nombre, direccion, telefono, nit)
              VALUES ('$nombre','$direc','$telefono', '$nit');";

    if($conn->query($query)==TRUE){
        header('Location: ../controlProveedores.php');
    }else{
        echo "Error de procedimiento de ingreso de datos";
    }

}

?>