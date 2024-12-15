
<?php 
include('../db.php');

$id = $_GET['id_producto'];
$query = "SELECT * FROM inventario1 WHERE id_producto=$id";
$result = $conn->query($query);
$productos = $result->fetch_assoc();

if(isset($_POST['submit'])){
    /* $email= $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone']; */

    /**/
    $producto =  $_POST['producto'];
    $desc =  $_POST['desc'];
    $cantidad =  $_POST['cantidad'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    //$proveedor = intval($_POST['rol']); 
    $proveedor = $_POST['proveedor'];
    $estado = $_POST['estado'];

    $query ="UPDATE inventario1 SET producto='$producto', descripcion='$desc', cantidad='$cantidad', precio_unitario='$precio',
    categoria_id='$categoria', proveedor_id = '$proveedor', estado = '$estado' where id_producto =$id";

    if($conn->query($query)==TRUE){
        header('Location: ../EditarProducto.php');
    }else{
        echo "Error de consulta";
    }
}


// Consulta para obtener las categorias
$query = "SELECT * FROM categorias1"; 
$result = $conn->query($query);
$categorias = []; 
if ($result->num_rows > 0) {
    while ($categoria = $result->fetch_assoc()) {
        $categorias[] = $categoria; 
    }
}

// Consulta para obtener los proveedores
$query = "SELECT * FROM proveedores1"; 
$result = $conn->query($query);
$proveedores = []; 
if ($result->num_rows > 0) {
    while ($proveedor = $result->fetch_assoc()) {
        $proveedores[] = $proveedor; 
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
        <h1>Modificar  Productos de Inventarios</h1>

        <!-- agregar un formulario -->
         <form action="updateProductos.php?id_producto=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="name">Producto</label>
                <input type="text" name="producto" class="form-control" value="<?php echo $productos['producto']; ?>" require>
            </div>
            <div class="mb-3">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="desc" class="form-control" value="<?php echo $productos['descripcion']; ?>" require>
            </div>
            <div class="mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="<?php echo $productos['cantidad']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="Precio">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo $productos['precio_unitario']; ?>" require>
            </div>
<!-- 
            <div class="mb-3">
                <label for="phone">Categoria</label>
                <input type="text" name="categoria" class="form-control" value="<?php echo $productos['categoria']; ?>"require>
            </div> -->

            <div class="mb-3">
            <label for="categoria">Categorias de Inventario, seleccione si desea modificar</label>
                <select name="categoria" class="form-control" required>
                    <option value="" disabled>Selecciona una Categoria</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id_categoria']; ?>" <?php echo ($categoria['id_categoria'] == $productos['categoria_id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($categoria['descripcion']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="mb-3">
                <label for="proveedor">proveedor</label>
                <input type="text" name="proveedor" class="form-control" value="<?php echo $productos['proveedor']; ?>"require>
            </div> -->

            <div class="mb-3">
            <label for="categoria">Proveedores, seleccione si desea modificar</label>
                <select name="proveedor" class="form-control" required>
                    <option value="" disabled>Selecciona un Proveedor</option>
                    <?php foreach ($proveedores as $proveedor): ?>
                        <option value="<?php echo $proveedor['id_proveedor']; ?>" <?php echo ($proveedor['id_proveedor'] == $productos['proveedor_id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($proveedor['nombre']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="phone">Estado</label>
                <input type="text" name="estado" class="form-control" value="<?php echo $productos['estado']; ?>"require>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-3">Modificar</button>
            <a href="../EditarProducto.php" class="btn btn-danger mb-3">Cancelar</a>
        


         </form>

    </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 

