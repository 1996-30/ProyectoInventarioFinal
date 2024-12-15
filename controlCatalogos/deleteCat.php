<?php

include('../db.php');

$id = $_GET['id_categoria'];

/* Consulta de la base de datos */
$query ="DELETE FROM categorias1 WHERE id_categoria=$id";
if($conn->query($query)==TRUE){
    header('Location: ../controlCategorias.php');
}else {
    echo "Error de consulta";
}


?>