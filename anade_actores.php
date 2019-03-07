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
                

                



                  <?php

                  if (!isset($_POST["nombre"])) : ?>

                   <form method="post">


                          <h3 align="center">Añade al Actor</h3>

  
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Nombre del Actor</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="colFormLabel" placeholder="Escribe el nombre del actor" name="nombre" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Nacionalidad</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="colFormLabel" placeholder="Escribe su nacionalidad" name="nacionalidad" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-8">
                                <input type="date" class="form-control" id="colFormLabel" name="fecha" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary my-1">Añade Actor</button>

                            
                            
                    </form>



                    <?php else: ?>

                    <?php
                        $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
                        if ($connection->connect_errno) {
                          printf("Connection failed: %s\n", $connection->connect_error);
                          exit();
                          }

                    $nombre=$_POST['nombre'];
                    $nacionalidad=$_POST['nacionalidad'];
                    $fecha=$_POST['fecha'];

                    $consulta= "INSERT INTO actores VALUES(NULL, '$nombre','$nacionalidad', '$fecha')";

                    $result = $connection->query($consulta);

                    if (!$result) {
                        echo "Query Error <br>";
                    } else {
                        echo " Tu Actor ha sido añadido, Gracias<br>";
                        header('Location: administrar_actores.php');
                    }

                    ?>

                  <?php endif; ?>

                          
                                  
                                                  
                        
        </div>


  </body>


</html>
