<?php
 
                    $query = "SELECT *FROM roles";
                    $result= $conn->query($query);

                    while($row = $result->fetch_assoc()) {
                    ?>    
                
                    <tr>
                        <!-- pendiente para asignar variables -->
                        <td><?php echo $row['id_rol']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['fechac']; ?></td>
                      
                        <td>
                           
                            <a href="controlUsuarios/updateRoles.php?id_rol=<?php echo $row['id_rol']; ?>" class="btn btn-primary" >actualizar</a>
                            <a href="ControlUsuarios/deleteRol.php?id_rol=<?php echo $row['id_rol']; ?>" class="btn btn-danger">eliminar</a>
                        </td>
                    </tr>
                    <?php }?>