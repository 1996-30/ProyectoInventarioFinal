<?
session_start();
 $id = $_SESSION['id_usuario'] ;
 $nombreu = $_SESSION['nombres'];
 $tipo_user = $_SESSION['id_rol'] ;

 $nombreu = mb_convert_case($nombreu, MB_CASE_UPPER, "UTF-8");

?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas  fa-solid fa-binoculars"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Sistema de Inventarios</div>
</a>



<!-- Divider -->
<hr class="sidebar-divider my-0">


<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="home.php">
        <i class="fas fa-gauge-high"></i>
        <span>Soluciones Informaticas</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Gestión de productos
</div>

<!-- Nav Item - Gestion de inventario -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu1"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-store"></i>
        <span>Gestión de inventario</span>
    </a>
    <div id="menu1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Inventario</h6>
            <a class="collapse-item" href="nuevoProducto.php">Nuevo Producto</a>
            <a class="collapse-item" href="mostrarProducto.php">Mostrar Productos</a>
            <?php if ($tipo_user == 1){?>
            <a class="collapse-item" href="EditarProducto.php">Editar Productos</a>
            <a class="collapse-item" href="EliminarProducto.php">Eliminar Productos</a>
            <?php }?>
           
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu2"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-solid fa-user-tag"></i>
        <span>Categoría y Proveedores</span>
    </a>
    <div id="menu2" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestión de inventario</h6>
            <a class="collapse-item" href="ControlCategorias.php">Control de categorías</a>
            <a class="collapse-item" href="controlProveedores.php">Control de proveedores</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Movimientos inventario
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu3"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-up-down-left-right"></i>
        <span>Movimientos</span>
    </a>
    <div id="menu3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestiones de movimientos</h6>
            <a class="collapse-item" href="ControlMovimientos.php">Entrada de productos</a>
           <!--  <a class="collapse-item" href="#">Salida de productos</a> -->
            <a class="collapse-item" href="consultaMovimientos.php">Consulta de moviemientos</a>                                        
        </div>
    </div>
</li>

<!-- Usuarios -->
<?php if ($tipo_user == 1){?>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu4"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-up-down-left-right"></i>
        <span>Control de Usuarios</span>
    </a>
    <div id="menu4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestiones de Usuarios</h6>
            <a class="collapse-item" href="controlUsuarios.php">Ingresar Usuarios</a>
            <a class="collapse-item" href="ControlRoles.php">Ingresar Roles de Usuario</a>
                                                 
        </div>
    </div>
</li>
<?php }?>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu5"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-up-down-left-right"></i>
        <span>Reportes Generales del Sistema</span>
    </a>
    <div id="menu5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reportes</h6>
            <a class="collapse-item" href="generador_pdf.php">Reporte de Inventario</a>
            <a class="collapse-item" href="reporteUsuarios.php">Reporte de Usuarios</a>
            <a class="collapse-item" href="reporteCategorias.php">Reporte de Categorias</a>
            <a class="collapse-item" href="reporteProveedores.php">Reporte de Proveedores</a>
           
                                                 
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Reportes</span></a>
</li>
 -->
<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
    <a class="nav-link" href="controlUsuarios.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Control de usuarios</span></a>
</li>
 -->
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->
