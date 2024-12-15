<?php 
include('../db.php');





//Datos del Formulario 

if(isset($_POST['submit'])){
    $producto =  $_POST['producto'];
    $desc =  $_POST['desc'];
    $cantidad =  $_POST['cantidad'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    //$proveedor = intval($_POST['rol']); 
    $proveedor = $_POST['proveedor'];
    $estado = $_POST['estado'];

    
    $query = "INSERT INTO inventario1(producto, descripcion, cantidad, precio_unitario, categoria_id, proveedor_id, estado)
              VALUES ('$producto','$desc','$cantidad', '$precio' ,'$categoria','$proveedor','$estado');";

    if($conn->query($query)==TRUE){
        header('Location: ../nuevoProducto.php');
    }else{
        echo "Error de procedimiento de ingreso de datos";
    }

}

?>

