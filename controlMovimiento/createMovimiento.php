<?php 
include('../db.php');
//Datos del Formulario 

if(isset($_POST['submit'])){
    $productos =  $_POST['productos'];
    $movimientos =  $_POST['movimientos'];
    $cantidad =  $_POST['cantidad'];
    $desc =  $_POST['descripcion'];
   
        
    $query = "INSERT INTO movimientos(id_producto, tipo_movimiento, cantidad, observacion)
              VALUES ('$productos','$movimientos','$cantidad', '$desc');";

    if($conn->query($query)==TRUE){
        header('Location: ../controlMovimientos.php');
    }else{
        echo "Error de procedimiento de ingreso de datos";
    }

}

?>

