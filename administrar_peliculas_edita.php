<?php 
 include 'session_root.php';
?>

<html lang="en">
  
        <?php 
        include 'head.php';
        ?>


  <body>

        <div class="container">

                <?php 
                include 'plantilla_root.php';
                ?>
                

                <div class="row justify-content-center">

                        
        <?php

        $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
          $connection->set_charset("uft8");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          $query="SELECT * from peliculas";

          if ($result = $connection->query($query)) {

          ?>
              <table style="border:1px solid black" width="1000">
                <thead>
                  <tr>
                    <th>ID Pelicula</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Direccion</th>
                    <th>Genero</th>
                    <th>Enlace</th>
                
                    
                    <th>Editar</th>
                    

                </thead><br>

          <?php

              while($obj = $result->fetch_object()) {
                  echo "<tr>";
                    echo "<td>".$obj->id_pelicula."</td>";
                    echo "<td>".$obj->nombre."</td>";
                    echo "<td>".$obj->fecha."</td>";
                    echo "<td>".$obj->director."</td>";
                    echo "<td>".$obj->genero."</td>";
                    
                    echo "<td><a href='".$obj->link."' target='_blank'><img src='images/link.png' height='25' width='25'/></a></td>";
                    
                    echo "<td><a href='editar_peliculas.php?id=".$obj->id_pelicula."'><img src='images/editar.png' height='25' width='25'/></a></td>";
                    
                    

                  echo "</tr>";



              }

              $result->close();
              unset($obj);
              unset($connection);

          }

          ?>



</table>


</div>       
                
                                
                        
        </div>


  </body>


</html>