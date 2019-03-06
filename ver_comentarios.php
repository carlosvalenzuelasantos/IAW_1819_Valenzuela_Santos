<?php 
 include 'session_usuario.php';
?>

<html lang="en">
  
        <?php 
        include 'head.php';
        ?>


  <body>

        <div class="container">

                <?php 
                include 'plantilla_usuarios.php';
                ?>
                

                <div class="row justify-content-center">
       
    

        <?php

        $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
            $connection->set_charset("uft8");
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $query="SELECT p.nombre as nompeli, valoracion, comentarios, u.nombre as nomusu 
                    from comentario c join usuario u on c.id_usuario = u.id_usuario 
                    join peliculas p on c.id_pelicula = p.id_pelicula;";
            
            

            if ($result = $connection->query($query)) {
            ?>
                <table style="border:1px solid black">
                  <thead>
                    <tr>
                      <th>Nombre de Pelicula</th>
                      <th>Valoracion</th>
                      <th>Comentarios</th>
                      <th>Nombre de Usuario</th>
                      


                  </thead><br>

                    <?php
                        while($obj = $result->fetch_object()) {
                            echo "<tr>";

                              echo "<td>".$obj->nompeli."</a></td>";
                              echo "<td>".$obj->valoracion."</a></td>";
                              echo "<td>".$obj->comentarios."</td>";
                              echo "<td>".$obj->nomusu."</td>"; 
                              
                            echo "</tr>";
                        }
                        $result->close();
                        unset($obj);
                        unset($connection);
                    }
                    ?>
                </table>
                
                <table>
                   <tr>
  
                     <td><form action='usuarios.php'><input type='submit' style='color: #FF0000' value='Volver Atras'></form></td>

                   </tr>
  </table>


  </div>       
                
                                
                        
        </div>


  </body>


</html>