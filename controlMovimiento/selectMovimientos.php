<?php
 
                    $query = "SELECT
                                  mov.id_movimiento as movimiento,
                                  mov.id_producto,
                                  inv.producto,
                                  mov.tipo_movimiento,
                                  inv.cantidad,
                                  mov.fecha_movi,
                                  mov.observacion
                                  FROM
                                    movimientos AS mov
                                  LEFT JOIN 
                                    inventario1 AS inv ON inv.id_producto= mov.id_producto
;";                              
                    $result= $conn->query($query);

                    while($row = $result->fetch_assoc()) {
                    ?>    
                
                    <tr>
                        <!-- pendiente para asignar variables -->
                        <td><?php echo $row['movimiento']; ?></td>
                        <td><?php echo $row['id_producto']; ?></td>
                        <td><?php echo $row['producto']; ?></td>
                        <td><?php echo $row['tipo_movimiento']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['fecha_movi']; ?></td>
                        <td><?php echo $row['observacion']; ?></td>
                        
                        <!-- <td>
                           
                            
                        </td> -->
                    </tr>
                    <?php }?>
