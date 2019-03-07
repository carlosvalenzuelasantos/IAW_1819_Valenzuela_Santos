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


          <h3 align="center">Edita el Actor</h3>


                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">ID Actor</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="colFormLabel" value='<?php echo $id; ?>' name="id_actor" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nombre y Apellidos</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="colFormLabel" value='<?php echo $nombre; ?>' name="nombre" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nacionalidad</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="colFormLabel" value='<?php echo $nacionalidad; ?>' name="nacionalidad" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-8">
                    <input type="date" class="form-control" id="colFormLabel" value='<?php echo $nacionalidad; ?>' name="fecha_nacimiento" required>
                    </div>
                </div>
           


                </div>

                <input type="hidden" name="id" value='<?php echo $id; ?>'>
                <button type="submit" class="btn btn-primary my-1">Actualizar</button>

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
        