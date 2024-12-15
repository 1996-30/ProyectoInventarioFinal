<?php

    require('fpdf/fpdf.php');
    include('db.php');

    $query = "SELECT 
                  inv.id_producto,
                  inv.producto,
                  inv.descripcion,
                  inv.cantidad,
                  inv.precio_unitario,
                  inv.fecha_ingreso,
                  inv.estado,
                  cat.descripcion AS categoria,
                  prov.nombre AS proveedor
                  FROM 
                    inventario1 AS inv
                  LEFT JOIN 
                    categorias1 AS cat ON(inv.categoria_id=cat.id_categoria)
                  LEFT JOIN
                    proveedores1 AS prov ON (inv.proveedor_id=prov.id_proveedor)";
                $result = $conn->query($query);

    // Instancia para fpdf

    $pdf = new FPDF();
    $pdf ->AddPage('L');
    $pdf ->SetFont('Arial','B',14);

// Titulo

    $pdf->Cell(0, 10, 'Inventario Disponible', 1, 1, 'C');
    $pdf->Ln(5);

// Encabezado

  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(10, 10, 'Cod', 1);
  $pdf->Cell(45, 10, 'Producto', 1);
  $pdf->Cell(68, 10, 'descripcion', 1);
  $pdf->Cell(13, 10, 'Cant', 1);
  $pdf->Cell(20, 10, 'Precio', 1);
  $pdf->Cell(40, 10, 'categoria', 1);
  $pdf->Cell(38, 10, 'proveedor', 1);
  $pdf->Cell(30, 10, 'fecha de ingreso', 1);
  $pdf->Cell(13, 10, 'estado', 1);
  $pdf->Ln();


// tbody

  $pdf->SetFont('Arial','',8);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $pdf->Cell(10, 10, $row['id_producto'], 1);
        $pdf->Cell(45, 10, $row['producto'], 1);
        $pdf->Cell(68, 10, $row['descripcion'], 1);
        $pdf->Cell(13, 10, $row['cantidad'], 1);
        $pdf->Cell(20, 10, $row['precio_unitario'], 1);
        $pdf->Cell(40, 10, $row['categoria'], 1);
        $pdf->Cell(38, 10, $row['proveedor'], 1);
        $pdf->Cell(30, 10, $row['fecha_ingreso'], 1);
        $pdf->Cell(13, 10, $row['estado'], 1);
        $pdf->Ln();
      }
    } else{
      $pdf->Cell(0,10,'No se encontraron registros', 1, 1, 'C');
    }


// Salida archivo PDF

  $pdf->Output('I', 'reporte.pdf')

  //Colocar el D para descargar


?>