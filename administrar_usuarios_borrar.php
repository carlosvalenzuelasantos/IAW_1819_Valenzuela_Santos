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

          $query="SELECT * from usuario";

          if ($result = $connection->query($query)) {

          ?>
              <table style="border:1px solid black">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Id_Usuario</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Borrar</th>


                </thead><br>

          <?php

              while($obj = $result->fetch_object()) {
                  echo "<tr>";
                    echo "<td>".$obj->nombre."</td>";
                    echo "<td>".$obj->apellidos."</td>";
                    echo "<td>".$obj->id_usuario."</td>";
                    echo "<td>".$obj->direccion."</td>";
                    echo "<td>".$obj->email."</td>";
                    echo "<td><a href='borrar_usuarios.php?id=".$obj ->id_usuario."'><img src='images/delete.png' height='25' width='25'/></a></td>";
                    

                  echo "</tr>";

              }

              $result->close();
              unset($obj);
              unset($connection);

          }

          ?>

</div>       
                
                                
                        
                </div>
        
        
          </body>
        
        
        </html>