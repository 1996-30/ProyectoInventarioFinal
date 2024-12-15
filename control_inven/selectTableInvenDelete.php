<?php include("includes/head.php") ?>
<?php include("db.php")

?>

<?php
 
                    $query = "SELECT
                                  inv.id_producto,
                                  inv.producto,
                                  inv.descripcion,
                                  inv.cantidad,
                                  inv.precio_unitario,
                                  cat.descripcion as categoria,
                                  prov.nombre as proveedor,
                                  inv.fecha_ingreso,
                                  inv.estado 
                                  FROM
                                    inventario1 AS inv
                                  LEFT JOIN 
                                    categorias1 AS cat ON inv.categoria_id = cat.id_categoria
                                  LEFT JOIN
                                    proveedores1 AS prov ON inv.proveedor_id = prov.id_proveedor;";
                    $result= $conn->query($query);

                    while($row = $result->fetch_assoc()) {
                    ?>    
                
                    <tr>
                        <!-- pendiente para asignar variables -->
                        <td><?php echo $row['id_producto']; ?></td>
                        <td><?php echo $row['producto']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['precio_unitario']; ?></td>
                        <td><?php echo $row['categoria']; ?></td>
                        <td><?php echo $row['proveedor']; ?></td>
                        <td><?php echo $row['fecha_ingreso']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td>
                           
                            <a href="control_inven/deleteProductos.php?id_producto=<?php echo $row['id_producto']; ?>" class="btn btn-danger" >Borrar</a>
                           <!--  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Editar Productos</button>
 -->
                          
                        </td> 
                    </tr>
                    <?php }?>








                    