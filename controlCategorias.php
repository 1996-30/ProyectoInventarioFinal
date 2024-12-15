<?php include("db.php"); ?>

<?php include("includes/head.php") ?>
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
                    <h1 class="h3 mb-2 text-gray-800">Control de Categorias</h1>
                    <p class="mb-4">Sistema de integración y administración de Categorias<a target="_blank"
                            href="https://wa.link/ypcy45"> -> Asistencia Técnica</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de Categorias</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ingresar Categorias</button>
                           
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Categorias</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="controlCatalogos/createCat.php" method="POST">
                                    <div class="mb-3">
                                        <label for="categoria">Descripcion:</label>
                                        <input type="text" name="categoria" class="form-control" required>
                                    </div>
                                    
                                   
                                    
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
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Fecha_Creacion</th>
                                        <th>Acciones</th>
                                      
                                    </tr>  
                                    </thead>
                                    <tbody>
                                    <?php include("controlCatalogos/selectCat.php") ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include("includes/footer.php") ?>
