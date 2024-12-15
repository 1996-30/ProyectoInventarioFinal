<?php 
include('../db.php');

$id = $_GET['id_usuario'];
$query = "SELECT * FROM usuariosweb WHERE id_usuario=$id";
$result = $conn->query($query);
$usuario = $result->fetch_assoc();

if(isset($_POST['submit'])){
    /* $email= $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone']; */

    /**/
    $nombres =  $_POST['nombres'];
    $usuario =  $_POST['usuario'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $rol_id = intval($_POST['rol']); 

    $query ="UPDATE usuariosweb SET nombres='$nombres', usuario='$usuario', email='$email', clave='$password',
    telefono='$telefono' where id_usuario=$id";

    if($conn->query($query)==TRUE){
        header('Location: ../controlUsuarios.php');
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
        <h1>Editar usuarios</h1>

        <!-- agregar un formulario -->
         <form action="updateusuarios.php?id_usuario=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="nombres" class="form-control" value="<?php echo $usuario['nombres']; ?>" require>
            </div>
            <div class="mb-3">
                <label for="name">Usuario</label>
                <input type="text" name="usuario" class="form-control" value="<?php echo $usuario['usuario']; ?>" require>
            </div>
            <div class="mb-3">
                <label for="name">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" value="<?php echo $usuario['clave']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="phone">Teléfono</label>
                <input type="number" name="telefono" class="form-control" value="<?php echo $usuario['telefono']; ?>"require>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-3">Modificar</button>
            <a href="../controlUsuarios.php" class="btn btn-danger mb-3">Cancelar</a>
        


         </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>