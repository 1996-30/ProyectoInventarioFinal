<?php 
include('../db.php');

$id = $_GET['id_rol'];
$query = "SELECT * FROM roles WHERE id_rol=$id";
$result = $conn->query($query);
$rol = $result->fetch_assoc();

if(isset($_POST['submit'])){
    $nombre =  $_POST['nombre'];
   

    $query ="UPDATE roles SET nombre='$nombre' where id_rol=$id";

    if($conn->query($query)==TRUE){
        header('Location: ../controlRoles.php');
    }else{
        echo "Error de consulta";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   

</head>
<body>
    <div class="container mt-5">
        <h1>Editar Roles</h1>

        <!-- agregar un formulario -->
         <form action="updateRoles.php?id_rol=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="name">Rol: </label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $rol['nombre']; ?>" require>
            </div>
                       <button type="submit" name="submit" class="btn btn-primary mb-3">Actualizar</button>
                       <a href="../controlRoles.php" class="btn btn-danger mb-3">Cancelar</a>
        


         </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>