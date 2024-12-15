<?php include("includes/head.php") ?>
<?php include("db.php") ?>



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
                            <h6 class="m-0 font-weight-bold text-primary">Consulta de Movimientos</h6>
                            <form action="generador_pdf.php" method="POST">
                                <button type="submit" class="btn btn-primary">Generar PDF</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Movimiento</th>
                                            <th>Codigo</th>
                                            <th>Producto</th>
                                            <th>Tipo Movimiento</th>
                                            <th>Cantidad</th>
                                            <th>fecha</th>
                                            <th>Observaciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id Movimiento</th>
                                            <th>Codigo</th>
                                            <th>Producto</th>
                                            <th>Tipo Movimiento</th>
                                            <th>Cantidad</th>
                                            <th>fecha</th>
                                            <th>Observaciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php include("controlMovimiento/selectMovimientos.php") ?>
                                    </tbody>
                                </table>
                                </div>
                        </div>
                    </div>
 

            </div>
            <!-- End of Main Content -->

            <?php include("includes/footer.php") ?>
