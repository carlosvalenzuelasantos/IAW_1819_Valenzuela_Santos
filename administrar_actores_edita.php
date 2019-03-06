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

          $query="SELECT * from actores";

          if ($result = $connection->query($query)) {

          ?>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID Actore</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nacionalidad</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Edita</th>

                </thead>

                <tbody>

          <?php

              while($obj = $result->fetch_object()) {
                  echo "<tr>";
                    echo "<td>".$obj->id_actor."</td>";
                    echo "<td>".$obj->nombre."</td>";
                    echo "<td>".$obj->nacionalidad."</td>";
                    echo "<td>".$obj->fecha_nacimiento."</td>";
                    
                    
                    echo "<td><a href='editar_actores.php?id=".$obj->id_actor."'><img src='images/editar.png' height='25' width='25'/></a></td>";

                  echo "</tr>";

              }

              $result->close();
              unset($obj);
              unset($connection);

          }

          ?>


</tbody>
  
  </table>

  </div>       
                
                                
                        
        </div>


  </body>


</html>
