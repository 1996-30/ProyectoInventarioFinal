<?php

    require('fpdf/fpdf.php');
    include('db.php');

    $query = "SELECT 
                  id_usuario,
                  nombres,
                  usuario,
                  email,
                  telefono,
                  rol.nombre as rol
                  FROM 
                    usuariosweb AS usu
                  LEFT JOIN 
                    roles AS rol ON(usu.id_rol=rol.id_rol)";
                  
                $result = $conn->query($query);

    // Instancia para fpdf

    $pdf = new FPDF();
    $pdf ->AddPage('L');
    $pdf ->SetFont('Arial','B',14);

// Titulo

    $pdf->Cell(0, 10, 'Listado de Usuarios del Sistema', 1, 1, 'C');
    $pdf->Ln(5);

// Encabezado

  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(15, 10, 'Codigo', 1);
  $pdf->Cell(45, 10, 'Nombres', 1);
  $pdf->Cell(45, 10, 'Usuario', 1);
  $pdf->Cell(45, 10, 'Email', 1);
  $pdf->Cell(20, 10, 'Telefono', 1);
  $pdf->Cell(40, 10, 'Rol de usuario', 1);

  $pdf->Ln();


// tbody

  $pdf->SetFont('Arial','',8);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $pdf->Cell(15, 10, $row['id_usuario'], 1);
        $pdf->Cell(45, 10, $row['nombres'], 1);
        $pdf->Cell(45, 10, $row['usuario'], 1);
        $pdf->Cell(45, 10, $row['email'], 1);
        $pdf->Cell(20, 10, $row['telefono'], 1);
        $pdf->Cell(40, 10, $row['rol'], 1);
      
        $pdf->Ln();
      }
    } else{
      $pdf->Cell(0,10,'No se encontraron registros', 1, 1, 'C');
    }


// Salida archivo PDF

  $pdf->Output('I', 'reporte.pdf')

  //Colocar el D para descargar


?>