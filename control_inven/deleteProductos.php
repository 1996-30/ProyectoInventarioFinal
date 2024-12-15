<?php

include('../db.php');

$id = $_GET['id_producto'];

/* Consulta de la base de datos */
$query ="DELETE FROM inventario1 WHERE id_producto=$id";
if($conn->query($query)==TRUE){
    header('Location: ../EliminarProducto.php');
}else {
    echo "Error de consulta";
}


?>