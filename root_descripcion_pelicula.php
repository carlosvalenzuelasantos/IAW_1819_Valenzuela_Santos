<?php 
 include 'session_root.php';
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/descripcion_pelicula.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Descripcion Peliculas</title>
  </head>
  <body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  <div class ="container">
        <div class ="titulo">

              <div class="row justify-content-center">
                  <h1 class="text-white display-2">Peliculas.com</h1>
              </div>

              <div class="row justify-content-center">
                  <h2 class="text-white">Hola Usuario: <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]; ?> </h2>
              </div>

        </div> 

        <?php

        $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
          $connection->set_charset("uft8");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
           
          
          
          $query1="SELECT * from peliculas WHERE id_pelicula='".$_GET["id"]."'" ;
        
        
          $query2="SELECT a.nombre as nombreactor from peliculas p join participar pa on p.id_pelicula = pa.id_pelicula
                      join actores a on a.id_actor=pa.id_actor where p.id_pelicula='".$_GET["id"]."'"; 


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

                    <td>Caratula</td>
                  </tr>

                </thead><br>

          <?php

              while($obj = $result->fetch_object()) {

                $link = $obj->link;
  
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
                      <img src='images/star_wars.jpg' height='100' width='100'/></a></td>";
                      
                

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
                        
                        <a href='root_ver_comentarios.php'><input type='button' style='color: #FF0000' value='Ver todos los Comentarios'>
                        <a href='root_usuarios.php'><input type='button' style='color: #FF0000' value='Volver Atras'></a>
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
    echo "<a href='root_ver_comentarios.php'><input type='button' style='color: #FF0000' value='Ver Comentarios'></a>";
   }

  ?>

<?php endif; ?>



  </div>

</body>



</html>