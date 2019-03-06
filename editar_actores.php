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
            echo "No se han recibido datos del usuario";
            exit();
          }


            $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
            $connection->set_charset("uft8");

            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            $query="SELECT * from actores where id_actor='".$_GET["id"]."'";

            if ($result = $connection->query($query))  {

              $obj = $result->fetch_object();

              if ($result->num_rows==0) {
                echo "NO EXISTE ESE ACTOR";
                exit();
              }



              $id = $obj->id_actor;
              $nombre = $obj->nombre;
              $nacionalidad = $obj->nacionalidad;
              $fecha_nacimiento = $obj->fecha_nacimiento;
            

            } else {
              echo "No se han recuperar los datos del usuario";
              exit();
            }

          ?>

          <?php if (!isset($_POST["id_actor"])) : ?>

          <form method="post">
            <fieldset>
              <legend>Información del Usuario</legend>
              <span>ID Actor</span><input value='<?php echo $id; ?>'type="text" name="id_actor" required><br>
              <span>Nombre y Apellidos:</span><input value='<?php echo $nombre; ?>' type="text" name="nombre" required><br>
              <span>Nacionalidad:</span><input value='<?php echo $nacionalidad; ?>'type="text" name="nacionalidad" required><br>
              <span>Fecha de Nacimiento:</span><input value='<?php echo $fecha_nacimiento; ?>' type="text" name="fecha_nacimiento" required><br>
              
              <input type="hidden" name="id" value='<?php echo $id; ?>'>
              <p><input type="submit" value="Actualizar"></p>
            </fieldset>
          </form>

          <?php else: ?>

          <?php



          $id_actor = $_POST["id"];
          $nombre = $_POST["nombre"];
          $nacionalidad = $_POST["nacionalidad"];
          $fecha_nacimiento = $_POST["fecha_nacimiento"];
          

          $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
          $connection->set_charset("uft8");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          $query="UPDATE actores set id_actor='$id',
          nombre='$nombre', nacionalidad='$nacionalidad', fecha_nacimiento='$fecha_nacimiento' WHERE id_actor='$id'";
           
          ///echo $query; 

          if ($result = $connection->query($query)) {
            header('Location: administrar_actores.php');
            echo "Tu Actor ha sido editado, Gracias<br>";
          } else {
            echo "Error al actualizar los datos <br>";
          }

          ?>
         <?php endif ?>
        

        </div>       
                
                                
                        
                </div>
        
        
          </body>
        
        
        </html>
        