<?php

include('../db.php');

$id = $_GET['id_proveedor'];

/* Consulta de la base de datos */
$query ="DELETE FROM proveedores1 WHERE id_proveedor=$id";
if($conn->query($query)==TRUE){
    header('Location: ../controlProveedores.php');
}else {
    echo "Error de consulta";
}


?>