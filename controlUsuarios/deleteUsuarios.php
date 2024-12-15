<?php

include('../db.php');

$id = $_GET['id_usuario'];

/* Consulta de la base de datos */
$query ="DELETE FROM usuariosweb WHERE id_usuario=$id";
if($conn->query($query)==TRUE){
    header('Location: ../controlUsuarios.php');
}else {
    echo "Error de consulta";
}


?>