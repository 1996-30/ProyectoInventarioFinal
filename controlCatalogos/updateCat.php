<?php 
include('../db.php');

$id = $_GET['id_categoria'];
$query = "SELECT * FROM categorias1 WHERE id_categoria=$id";
$result = $conn->query($query);
$categoria = $result->fetch_assoc();

if(isset($_POST['submit'])){
    $desc =  $_POST['categoria'];
   

    $query ="UPDATE categorias1 SET descripcion='$desc' where id_categoria=$id";

    if($conn->query($query)==TRUE){
        header('Location: ../controlCategorias.php');
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
         <form action="updateCat.php?id_categoria=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="name">Categoria: </label>
                <input type="text" name="categoria" class="form-control" value="<?php echo $categoria['descripcion']; ?>" require>
            </div>
                       <button type="submit" name="submit" class="btn btn-primary mb-3">Actualizar</button>
                       <a href="../controlCategorias.php" class="btn btn-danger mb-3">Cancelar</a>
        


         </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>