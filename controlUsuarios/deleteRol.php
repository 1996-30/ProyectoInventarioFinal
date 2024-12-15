<?php

include('../db.php');

$id = $_GET['id_rol'];

/* Consulta de la base de datos */
$query ="DELETE FROM roles WHERE id_rol=$id";
if($conn->query($query)==TRUE){
    header('Location: ../ControlUsuarios.php');
}else {
    echo "Error de consulta";
}


?>