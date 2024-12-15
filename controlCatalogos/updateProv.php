<?php 
include('../db.php');

$id = $_GET['id_proveedor'];
$query = "SELECT * FROM proveedores1 WHERE id_proveedor=$id";
$result = $conn->query($query);
$proveedor = $result->fetch_assoc();

if(isset($_POST['submit'])){
    $nit =  $_POST['nit'];
    $nombre =  $_POST['nombre'];
    $telefono =  $_POST['telefono'];
    $direc = $_POST['direccion'];
   
   

    $query ="UPDATE proveedores1 SET nit='$nit', nombre='$nombre', telefono='$telefono', direccion='$direc'  where id_proveedor=$id";

    if($conn->query($query)==TRUE){
        header('Location: ../controlProveedores.php');
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
        <h1>Editar Categorias</h1>

        <!-- agregar un formulario -->
         <form action="updateProv.php?id_proveedor=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="number">NIT: </label>
                <input type="number" name="nit" class="form-control" value="<?php echo $proveedor['nit']; ?>" require>
            </div>
            <div class="mb-3">
                <label for="name">Nombre: </label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $proveedor['nombre']; ?>" require>
            </div>
            <div class="mb-3">
                <label for="name">Telefono: </label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $proveedor['telefono']; ?>" require>
            </div>
            <div class="mb-3">
                <label for="name">Direccion: </label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $proveedor['direccion']; ?>" require>
            </div>
                       <button type="submit" name="submit" class="btn btn-primary mb-3">Actualizar</button>
                       <a href="../controlProveedores.php" class="btn btn-danger mb-3">Cancelar</a>
        


         </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>