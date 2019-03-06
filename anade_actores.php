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
                      <form method="post">
                        <fieldset>
                          <legend>Añade Los Actores</legend>
                          <span>Nombre:</span><input type="text" name="nombre" required><br>
                          <span>Nacionalidad:</span><input type="text" name="nacionalidad" required><br>
                          <span>Fecha de Nacimiento:</span><input type="date" name="fecha" required><br>
                          <span><input type="submit" value="Insertar Actor"><span>
                          
                        </fieldset>
                      </form>
                  </div>
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
