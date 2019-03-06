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

          $query="SELECT p.nombre as nompeli, c.comentarios as comentarios, c.valoracion as valoracion, u.nombre as nomusu
                  from usuario u join comentario c 
                  on u.id_usuario=c.id_usuario 
                  join peliculas p on p.id_pelicula=c.id_pelicula";

          if ($result = $connection->query($query)) {

          ?>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nombre de Pelicula</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col">Valoracion</th>
                    <th scope="col">Nombre de Usuario</th>
                    <th scope="col">Borrar</th>

                </thead>

                <tbody>

          <?php

              while($obj = $result->fetch_object()) {
                  echo "<tr>";
                    echo "<td>".$obj->nompeli."</td>";
                    echo "<td>".$obj->comentarios."</td>";
                    echo "<td>".$obj->valoracion."</td>";
                    echo "<td>".$obj->nomusu."</td>";
                    
                    echo "<td><a href='borrar_comentarios.php?id=".$obj->comentarios."'><img src='images/delete.png' height='25' width='25'/></a></td>";
                    

                  echo "</tr>";

              }

              $result->close();
              unset($obj);
              unset($connection);

          }

          ?>

</tbody>

</div>       
                
                                
                        
        </div>


  </body>


</html>
