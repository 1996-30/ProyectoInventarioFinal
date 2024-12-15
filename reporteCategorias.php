<?php

    require('fpdf/fpdf.php');
    include('db.php');

    $query = "SELECT 
                  id_categoria,
                  descripcion,
                  fecha_creacion
                    FROM 
                    categorias1";
                $result = $conn->query($query);

    // Instancia para fpdf

    $pdf = new FPDF();
    $pdf ->AddPage('L');
    $pdf ->SetFont('Arial','B',14);

// Titulo

    $pdf->Cell(0, 10, 'Listado de Categorias de Inventario', 1, 1, 'C');
    $pdf->Ln(5);

// Encabezado

  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(15, 10, 'Codigo', 1);
  $pdf->Cell(45, 10, 'categoria', 1);
  $pdf->Cell(35, 10, 'Fecha Creacion', 1);
  
  $pdf->Ln();


// tbody

  $pdf->SetFont('Arial','',8);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $pdf->Cell(15, 10, $row['id_categoria'], 1);
        $pdf->Cell(45, 10, $row['descripcion'], 1);
        $pdf->Cell(35, 10, $row['fecha_creacion'], 1);
        
        $pdf->Ln();
      }
    } else{
      $pdf->Cell(0,10,'No se encontraron registros', 1, 1, 'C');
    }


// Salida archivo PDF

  $pdf->Output('I', 'reporte.pdf')

  //Colocar el D para descargar


?>