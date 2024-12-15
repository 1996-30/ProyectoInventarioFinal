<?php

    require('fpdf/fpdf.php');
    include('db.php');

    $query = "SELECT 
                  id_proveedor,
                  nombre,
                  direccion,
                  telefono,
                  nit, 
                  fechac
                    FROM 
                    proveedores1";
                $result = $conn->query($query);

    // Instancia para fpdf

    $pdf = new FPDF();
    $pdf ->AddPage('L');
    $pdf ->SetFont('Arial','B',14);

// Titulo

    $pdf->Cell(0, 10, 'Listado de Proveedores de Inventario', 1, 1, 'C');
    $pdf->Ln(5);

// Encabezado

  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(15, 10, 'Codigo', 1);
  $pdf->Cell(45, 10, 'Nombre', 1);
  $pdf->Cell(35, 10, 'Direccion', 1);
  $pdf->Cell(35, 10, 'Telefono', 1);
  $pdf->Cell(35, 10, 'Nit', 1);
  $pdf->Cell(35, 10, 'Fecha Creacion', 1);
  
  $pdf->Ln();


// tbody

  $pdf->SetFont('Arial','',8);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $pdf->Cell(15, 10, $row['id_proveedor'], 1);
        $pdf->Cell(45, 10, $row['nombre'], 1);
        $pdf->Cell(35, 10, $row['direccion'], 1);
        $pdf->Cell(35, 10, $row['telefono'], 1);
        $pdf->Cell(35, 10, $row['nit'], 1);
        $pdf->Cell(35, 10, $row['fechac'], 1);
        
        $pdf->Ln();
      }
    } else{
      $pdf->Cell(0,10,'No se encontraron registros', 1, 1, 'C');
    }


// Salida archivo PDF

  $pdf->Output('I', 'reporte.pdf')

  //Colocar el D para descargar


?>