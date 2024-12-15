<?php include("includes/head.php") ?>
<?php include("db.php") ?>
<?php
session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: index.php");
}  
$id = $_SESSION['id_usuario'] ;
$nombreu = $_SESSION['nombres'];
$tipo_user = $_SESSION['id_rol'] ;

$nombreu = mb_convert_case($nombreu, MB_CASE_UPPER, "UTF-8");

?>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- AQUI VA EL SIDEBAR -->
        <?php include("includes/sidebar.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Aqui va el topbar -->
              <?php include("includes/topbar.php") ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                     <!-- Page Heading -->
                     <h1 class="h3 mb-2 text-gray-800">Agregar Productos</h1>
                    <p class="mb-4">Sistema de Ingreso y administración de Productos de Inventario<a target="_blank"
                            href="https://wa.link/ypcy45"> -> Asistencia Técnica</a>.</p>

                </div>
                <!-- /.container-fluid -->
                 <!-- DataTales Example -->
                 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Registro de Productos de Inventario </h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ingresar Productos</button>
                           
                           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                               <div class="modal-content">
                               <div class="modal-header">
                                   <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Productos de Inventario</h1>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                                   <form action="control_inven/createProductos.php" method="POST">
                                   <div class="mb-3">
                                       <label for="nombres">Producto:</label>
                                       <input type="text" name="producto" class="form-control" required>
                                   </div>
                                   <div class="mb-3">
                                       <label for="usuario">Descripion:</label>
                                       <input type="text" name="desc" class="form-control" required>
                                   </div>
                                   <div class="mb-3">
                                       <label for="telefono">Cantidad:</label>
                                       <input type="number" name="cantidad" class="form-control" require>
                                   </div>
                                   <div class="mb-3">
                                       <label for="telefono">Precio:</label>
                                       <input type="decimal" name="precio" class="form-control" require>
                                   </div>
                                   <div class="mb-3">
                                     <?php
                                     $query = "SELECT id_categoria, descripcion FROM categorias1"; 
                                     $result = $conn->query($query);

                                     if($result->num_rows>0){
                                        echo '<label for="Categorias">Categorias:</label>';
                                        echo ' <select name="categoria" class="form-select">';
                                        while ($row = $result->fetch_assoc()){
                                            echo '<option value="'. $row['id_categoria'] .'">'. $row['descripcion']. '</option>';
                                        }
                                        echo ' </select>';

                                     }else{
                                        echo 'No hay categorias';
                                     }
                                     ?>
                                   </div>
                                   <div class="mb-3">
                                   <?php
                                     $query = "SELECT id_proveedor, nombre FROM proveedores1"; 
                                     $result = $conn->query($query);

                                     if($result->num_rows>0){
                                        echo '<label for="Proveedores">Proveedores:</label>';
                                        echo ' <select name="proveedor" class="form-select">';
                                        while ($row = $result->fetch_assoc()){
                                            echo '<option value="'. $row['id_proveedor'] .'">'. $row['nombre']. '</option>';
                                        }
                                        echo ' </select>';

                                     }else{
                                        echo 'No hay Proveedores';
                                     }
                                     ?>
                                   </div>
                                   <div class="mb-3">
                                       <label for="usuario">Estado:</label>
                                       <input type="text" name="estado" class="form-control" required>
                                 
                                  
                                   
                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                   <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                               </div>
                               </form>
                               </div>
                           </div>
                           </div>
                       </div>

                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id producto</th>
                                            <th>Producto</th>
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Categoria</th>
                                            <th>Proveedor</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id producto</th>
                                            <th>Producto</th>
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Categoria</th>
                                            <th>Proveedor</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Estado</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php include("control_inven/selectTableInven.php") ?>
                                    </tbody>
                                </table>
                                </div>
                        </div>
                    </div>

            </div>
            <!-- End of Main Content -->

            <?php include("includes/footer.php") ?>
