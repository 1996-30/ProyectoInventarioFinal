<?php
 
                    $query = "SELECT *FROM proveedores1";
                    $result= $conn->query($query);

                    while($row = $result->fetch_assoc()) {
                    ?>    
                
                    <tr>
                        <!-- pendiente para asignar variables -->
                        <td><?php echo $row['id_proveedor']; ?></td>
                        <td><?php echo $row['nit']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['fechac']; ?></td>
                      
                        <td>
                           
                            <a href="controlCatalogos/updateProv.php?id_proveedor=<?php echo $row['id_proveedor']; ?>" class="btn btn-primary" >actualizar</a>
                            <?php if ($tipo_user == 1){?>
                            <a href="controlCatalogos/deleteProv.php?id_proveedor=<?php echo $row['id_proveedor']; ?>" class="btn btn-danger">eliminar</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php }?>