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

          if (empty($_GET)) {
            echo "No se han recibido datos de la Pelicula";
            exit();
          }


            $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
            $connection->set_charset("uft8");

            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            

            $query="SELECT * from peliculas where id_pelicula='".$_GET["id"]."'";


            $query2="SELECT nombre, id_actor from actores";


            $query3="SELECT id_actor from participar where id_pelicula=".$_GET["id"]."";

            

            if ($result = $connection->query($query))  {

              $obj = $result->fetch_object();

              if ($result->num_rows==0) {
                echo "NO EXISTE ESTA PELICULA";
                exit();
              }


              $id_pelicula = $obj->id_pelicula;
              $nombre = $obj->nombre;
              $fecha = $obj->fecha;
              $director = $obj->director;
              $genero = $obj->genero;
              $link = $obj->link;
              $portada = $obj->portada;

              

            } else {
              echo "No se han recuperar los datos de la Pelicula";
              exit();
            }

          ?>

          <?php if (!isset($_POST["id_pelicula"])) : ?>

          <form method="post" enctype="multipart/form-data">
            <fieldset>
              <legend>Información de La Pelicula</legend>
              <span>ID Pelicula:</span><input value='<?php echo $id_pelicula; ?>'type="text" name="id_pelicula" required><br>
              <span>Nombre:</span><input value='<?php echo $nombre; ?>' type="text" name="nombre" required><br>
              <span>Fecha:</span><input value='<?php echo $fecha; ?>'type="text" name="fecha" required><br>
              <span>Director:</span><input value='<?php echo $director; ?>' type="text" name="director" required><br>
              <span>Genero:</span><input value='<?php echo $genero; ?>'type="text" name="genero" required><br>
              <span>Enlace:</span><input value='<?php echo $link; ?>'type="text" name="link"><br>
              <span>Actores</span>
                      <select name="actores[]" multiple>
                        '<?php  

          
                                $v=[];

                                if ($result=$connection->query($query3)) {
                                                                                        
                                  while($obj = $result->fetch_object()) {

                                  $v[]=$obj->id_actor;
                                
                                  
                                  }
                                }

                                      if ($result=$connection->query($query2)) {
                                            
                                        while($obj = $result->fetch_object()) {

                                          if (in_array($obj->id_actor,$v)) {
                                            echo "<option selected value=".$obj->id_actor."'>".$obj->nombre."</option>";
                                          } else {
                                            echo "<option value=".$obj->id_actor."'>".$obj->nombre."</option>";
                                          }                                           
                                              
                                          
                                        }
                                      }             
                                                          
                          ?>' 
                        </select><br>

                        <span>Subir Imagen</span>  

          <input class="form-control" type="file" name="image" required />
              
              <input type="hidden" name="id_pelicula" value='<?php echo $id_pelicula; ?>'>
              <p><input type="submit" value="Actualizar"></p>
            </fieldset>
          </form>

          <?php else: ?>

          <?php

                    //var_dump($_FILES);

                    //Temp file. Where the uploaded file is stored temporary
                    $tmp_file = $_FILES['image']['tmp_name'];

                    //Dir where we are going to store the file
                    $target_dir = "portada/";

                    //Full name of the file.
                    $target_file = strtolower($target_dir . basename($_FILES['image']['name']));

                    //Can we upload the file
                    $valid= true;

                    //Check if the file already exists
                    if (file_exists($target_file)) {
                      echo "La portaada es repetida.";
                      $valid = false;
                    }

                    //Check the size of the file. Up to 2Mb
                    if ($_FILES['image']['size'] > (2048000)) {
                      $valid = false;
                      echo 'Oops!  Tu imagen supera los 2 mb.';
                    }

                    //Check the file extension: We need an image not any other different type of file
                    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
                    if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
                      $valid = false;
                      echo "Only JPG, JPEG, PNG & GIF files are allowed";
                    }


                    if ($valid) {

                      var_dump($target_file);
                      //Put the file in its place
                      move_uploaded_file($tmp_file, $target_file);

                      echo "PRODUCT ADDED";


                    }
                    ?>

          <?php



          $id_pelicula = $_POST["id_pelicula"];
          $nombre = $_POST["nombre"];
          $fecha = $_POST["fecha"];
          $director = $_POST["director"];
          $genero = $_POST["genero"];
          $link = $_POST["link"];
          $actores = $_POST["actores"];
          $portada = $target_file;



          $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
          $connection->set_charset("uft8");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          $query="UPDATE peliculas set id_pelicula='$id_pelicula',
          nombre='$nombre', fecha='$fecha', director='$director', genero='$genero', link='$link', portada='$portada'
          WHERE id_pelicula='$id_pelicula'";

          $query2="UPDATE participar set id_pelicula='$id_pelicula' WHERE id_pelicula='$id_pelicula'";

          $query3="DELETE from participar where id_pelicula='$id_pelicula'";

          //var_dump($actores);
             
          //echo $query3;

                if ($result=$connection->query($query3)) {
              
                  
                  for ($i=0;$i<sizeof($actores);$i++) {

                  $query4="INSERT INTO participar (id_pelicula, id_actor) VALUES (".intval($id_pelicula).",".intval($actores[$i]).")";
                  //echo $query4;

                  if ($result=$connection->query($query4)) {

                              }

                        }
                
                    
                    }

                    
                      


          if ($result = $connection->query($query)) {
            header('Location: administrar_peliculas_edita.php');
           
          } else {
            echo "Error al actualizar los datos <br>";
          }

          ?>
         <?php endif ?>

         
  
         </div>       
                
                                
                        
                </div>
        
        
          </body>
        
        
        </html>