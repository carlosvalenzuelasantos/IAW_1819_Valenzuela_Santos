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
           
          
          
          $query1="SELECT * from peliculas WHERE id_pelicula=$_GET[id]" ;
        
        
          $query2="SELECT a.nombre as nombreactor from peliculas p join participar pa on p.id_pelicula = pa.id_pelicula
                      join actores a on a.id_actor=pa.id_actor where p.id_pelicula=$_GET[id]"; 


          if ($result = $connection->query($query1)) {
          
          
          ?>

              

                    <table class="table" >
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Caratula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Actores</th>

                            
                        </tr>

                        </thead>    

                        <tbody>

          <?php

              while($obj = $result->fetch_object()) {

                $link = $obj->link;
                $portada = $obj->portada;

                
  
                echo "<tr>";

                      echo "<td><a href='$link' target='_blank'>
                            <img src='$portada' height='350' width='225'/></a></td>";
                      
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

                      
                      
                

                 echo "</tr>";

              }

              $result->close();
              unset($obj);
              unset($connection);

          }

?>

        </tbody>
        

        <?php

          if (!isset($_POST["comentarios"])) : ?>
              
              <div class="row justify-content-center align-items-center">
              <div id="coment" class="col-md-12">

              <form method="post">
                
                  
                  <table width="950" border="2" cellspacing="3" cellpadding="3">
                      <tr>
                  <td><span>Comentarios:</span><textarea name="comentarios" required cols="30" rows="5" style="resize: both;"></textarea></td>
                  <td><span>Valoracion:</span></td>
                        
                  
                  <td>   <p class="clasificacion">
                              <input id="radio1" type="radio" name="valoracion" value="1"><!--
                              --><label for="radio1">★1</label><!--
                              --><input id="radio2" type="radio" name="valoracion" value="2"><!--
                              --><label for="radio2">★2</label><!--
                              --><input id="radio3" type="radio" name="valoracion" value="3"><!--
                              --><label for="radio3">★3</label><!--
                              --><input id="radio4" type="radio" name="valoracion" value="4"><!--
                              --><label for="radio4">★4</label><!--
                              --><input id="radio5" type="radio" name="valoracion" value="5"><!--
                              --><label for="radio5">★5</label>
                        </p>
                  
                        </td>

                        <td>  <input type="submit" value="Agregar Comentario y Valoracion"></td>
                        
                      
                        <tr>
                 <table> 
                
               </form>
        </div>
        </div>

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