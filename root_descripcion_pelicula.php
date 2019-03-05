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
           
          
          
          $query1="SELECT * from peliculas WHERE id_pelicula=$_GET[id]" ;
        
        
          $query2="SELECT a.nombre as nombreactor from peliculas p join participar pa on p.id_pelicula = pa.id_pelicula
                      join actores a on a.id_actor=pa.id_actor where p.id_pelicula=$_GET[id]"; 


          if ($result = $connection->query($query1)) {
          
          
          ?>
              <table style="border:1px solid black">
                <thead>
                  <tr>
                    <th>ID Pelicula</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Direccion</th>
                    <th>Genero</th>
                    <th>Actores</th>

                    <th>Caratula</th>
                  </tr>

                </thead><br>

          <?php

              while($obj = $result->fetch_object()) {

                $link = $obj->link;
                $portada = $obj->portada;
  
                echo "<tr>";
                      echo "<td>".$obj->id_pelicula."</td>";
                      echo "<td>".$obj->nombre."</td>";
                      echo "<td>".$obj->fecha."</td>";
                      echo "<td>".$obj->director."</td>";
                      echo "<td>".$obj->genero."</td>";
                      
                      echo "<td>";

                            if ($result=$connection->query($query2)) {

                              while($obj = $result->fetch_object()) {
                                echo "<p>".$obj->nombreactor."</p>";
                              }
                            }                    
                      
                      echo "</td>";

                      echo "<td><a href='$link' target='_blank'>
                      <img src='$portada' height='350' width='225'/></a></td>";
                      
                

                 echo "</tr>";

              }

              $result->close();
              unset($obj);
              unset($connection);

          }

?>

        <?php

          if (!isset($_POST["comentarios"])) : ?>
              <form method="post">
                <fieldset>
                  <legend>Valora y Comenta</legend>
                  <span>Comentarios:</span><textarea name="comentarios" required></textarea><br>
                  <span>Valoracion:</span>
                        
                  
                        <p class="clasificacion">
                              <input id="radio1" type="radio" name="valoracion" value="5"><!--
                              --><label for="radio1">★</label><!--
                              --><input id="radio2" type="radio" name="valoracion" value="4"><!--
                              --><label for="radio2">★</label><!--
                              --><input id="radio3" type="radio" name="valoracion" value="3"><!--
                              --><label for="radio3">★</label><!--
                              --><input id="radio4" type="radio" name="valoracion" value="2"><!--
                              --><label for="radio4">★</label><!--
                              --><input id="radio5" type="radio" name="valoracion" value="1"><!--
                              --><label for="radio5">★</label>
                        </p>
                  


                        <input type="submit" value="Agregar Comentario y Valoracion">
                        
                        
                 <br>
        
                </fieldset>
               </form>

  <?php else: ?>

  <?php
      $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
       if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
        }

   
          $valoracion=$_POST['valoracion'];
          $comentarios=$_POST['comentarios'];
          $id_pelicula=$_GET['id'];
          $id_usuario=$_SESSION['id_usuario'];

   

   $consulta1= "INSERT INTO comentario VALUES($valoracion,'$comentarios',$id_pelicula,$id_usuario, NULL)";
   
   //echo $consulta1;

  
   $result = $connection->query($consulta1);

   if (!$result) {
      echo "Query Error <br>";
   } else {
    echo "Comentario Añadido Correctamente <br>";
    
   }

  ?>

<?php endif; ?>



</div>       
                
                                
                        
                </div>
        
        
          </body>
        
        
        </html>
        