
<?php

include 'db.php';
$sql = "SELECT p.nombre,
  		sum(i.cantidad) AS Total
	    FROM inventario1 as i
		INNER JOIN proveedores1 AS p ON (i.proveedor_id=p.id_proveedor)
		GROUP by p.nombre
" ;
$result = $conn->query($sql);
$num = $result->num_rows;

$data = [];

if($num > 0){
    $data[]=['Producto','Cantidad'];
    while ($row = $result->fetch_assoc()){
       $data[] = [$row['nombre'], (int)$row['Total']]; 
      
    }
}

echo json_encode($data);

?>