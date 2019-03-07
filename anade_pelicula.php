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

if (!isset($_POST["nombre"])) : ?>

    <form method="post" enctype="multipart/form-data">
         <h3 align="center">Añade la Pelicula</h3>

         <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="colFormLabel" placeholder="Escribe el nombre de la pelicula" name="nombre" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-8">
            <input type="date" class="form-control" id="colFormLabel" name="fecha" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Director</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="colFormLabel" placeholder="Escribe del nombre del director" name="director" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Género</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="colFormLabel" placeholder="Escribe el tipo de género" name="genero" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Enlace</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="colFormLabel" placeholder="Pega la Url del trailer" name="link" required>
            </div>
        </div>

        

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Actores que participan (Si son varios Crtl+click)</label>
            <div class="col-sm-8">
                 
            <select name="actores[]" multiple required>
                
                '<?php  

                      $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
                      $connection->set_charset("uft8");

                      if ($connection->connect_errno) {
                          printf("Connection failed: %s\n", $connection->connect_error);
                          exit();
                      }


                      $query2="SELECT nombre, id_actor from actores";


                      $v=[];

                      if ($result=$connection->query($query2)) {
                                                                              
                        while($obj = $result->fetch_object()) {

                        $v[]=$obj->id_actor;
                      
                        
                        }
                      }

                            if ($result=$connection->query($query2)) {
                                  
                              while($obj = $result->fetch_object()) {

                                
                                  echo "<option value=".$obj->id_actor."'>".$obj->nombre."</option>";
                                                                        
                                    
                                
                              }
                            }             
                                                
                ?>' 
              </select>
            


            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Imagen de Portada</label>
            <div class="col-sm-8">
              <input class="form-control" type="file" name="image" required />
            </div>
        </div>
        

        <button type="submit" class="btn btn-primary my-1">Añade Pelicula</button>

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
                  echo "La portada que acabas de añadir es repetida, pero  </br>" ;
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

                  //var_dump($target_file);
                  //Put the file in its place
                  move_uploaded_file($tmp_file, $target_file);

                  //echo "PRODUCT ADDED";


                }
            ?>

  <?php
      $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
       if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
        }

   $nombre=$_POST['nombre'];
   $fecha=$_POST['fecha'];
   $director=$_POST['director'];
   $genero=$_POST['genero'];
   $link=$_POST['link'];
   $actores = $_POST["actores"];
   $portada = $target_file;

   $consulta= "INSERT INTO peliculas VALUES(NULL, '$nombre','$fecha', '$director', '$genero', '$link', '$portada')";

   if ($result=$connection->query($consulta)) {
              
                  
    for ($i=0;$i<sizeof($actores);$i++) {

    $query4="INSERT INTO participar (id_pelicula, id_actor) VALUES ($connection->insert_id,".intval($actores[$i]).")";
    //echo $query4;

    if ($result=$connection->query($query4)) {

                }

          }
      }


   if (!$result) {
      echo "Query Error <br>";
   } else {
       echo " Tu pelicula ha sido añadida ;), Gracias<br>";
       
   }

  ?>

<?php endif; ?>

                </div>       
                
                                
                        
        </div>


  </body>


</html>