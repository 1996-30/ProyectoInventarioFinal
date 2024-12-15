<?php
 
                    $query = "SELECT *FROM categorias1";
                    $result= $conn->query($query);

                    while($row = $result->fetch_assoc()) {
                    ?>    
                
                    <tr>
                        <!-- pendiente para asignar variables -->
                        <td><?php echo $row['id_categoria']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['fecha_creacion']; ?></td>
                      
                        <td>
                           
                            <a href="controlCatalogos/updateCat.php?id_categoria=<?php echo $row['id_categoria']; ?>" class="btn btn-primary" >actualizar</a>
                            <?php if ($tipo_user == 1){?>
                            <a href="controlCatalogos/deleteCat.php?id_categoria=<?php echo $row['id_categoria']; ?>" class="btn btn-danger">eliminar</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php }?>