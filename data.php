
<?php

include 'db.php';
$sql = "SELECT c.descripcion, SUM(i.cantidad*i.precio_unitario) as total_prod FROM inventario1 i
        INNER JOIN categorias1 c ON (i.categoria_id=c.id_categoria) GROUP BY c.descripcion	ORDER BY total_prod ASC" ;
$result = $conn->query($sql);
$num = $result->num_rows;

$data = [];

if($num > 0){
    $data[]=['Producto','Cantidad'];
    while ($row = $result->fetch_assoc()){
       $data[] = [$row['descripcion'], (int)$row['total_prod']]; 
      
    }
}

echo json_encode($data);

?>