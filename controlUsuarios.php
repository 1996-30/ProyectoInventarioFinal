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
                    <h1 class="h3 mb-2 text-gray-800">Control de usuarios</h1>
                    <p class="mb-4">Sistema de integración y administración de usuarios<a target="_blank"
                            href="https://wa.link/pqddme"> -> Asistencia Técnica</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de usuarios activos</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ingresar usuarios</button>
                           
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuarios</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="controlUsuarios/createUsuarios.php" method="POST">
                                    <div class="mb-3">
                                        <label for="nombres">Nombres:</label>
                                        <input type="text" name="nombres" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" name="usuario" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Correo Electrónico:</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono">Telefono:</label>
                                        <input type="number" name="telefono" class="form-control" require>
                                    </div>
                                    <!-- <div class="mb-3">
                                        <label for="name">Correo Electrónico</label>
                                        <input type="email" name="email" class="form-control" require>
                                    </div> -->

                                    <div class="mb-3">
                                        <label for="password">Contraseña</label>
                                        <input type="password" name="pass" class="form-control" require>
                                    </div>

                                    <?php
                                     // Consulta para obtener los roles
                                     $queryRoles = "SELECT * FROM roles"; 
                                     $resultRoles = $conn->query($queryRoles);
                                     $roles = []; 
                                     if ($resultRoles->num_rows > 0) {
                                         while ($rol = $resultRoles->fetch_assoc()) {
                                             $roles[] = $rol; 
                                         }
                                     }
 
                                    ?>
                                   
                                    <div class="mb-3">
                                        <label for="rol">Rol de Usuario:</label>
                                        <!-- <input type="text" name="rol" class="form-control" require> -->
                                        <select name="rol" class="form-control" required>
                                            <?php foreach ($roles as $rol): ?> 
                                                <option value="<?php echo $rol['id_rol']; ?>"> 
                                                    <?php echo htmlspecialchars($rol['nombre']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
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
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Acciones</th>
                                    </tr>  
                                    </thead>
                                    <tbody>
                                    <?php include("selectTable.php") ?>

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
