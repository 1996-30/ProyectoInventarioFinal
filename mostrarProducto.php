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
                    <h1 class="h3 mb-4 text-gray-800">Mostrar Producto</h1>

                </div>
                <!-- /.container-fluid -->
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Consulta de Productos</h6>
                            <form action="generador_pdf.php" method="POST">
                                <button type="submit" class="btn btn-primary">Generar PDF</button>
                            </form>
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
