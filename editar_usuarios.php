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

            $query="SELECT * from usuario where id_usuario='".$_GET["id"]."'";

            if ($result = $connection->query($query))  {

              $obj = $result->fetch_object();

              if ($result->num_rows==0) {
                echo "NO EXISTE ESE USUARIO";
                exit();
              }



              $nombre = $obj->nombre;
              $apellidos = $obj->apellidos;
              $id = $obj->id_usuario;
              $direccion = $obj->direccion;
              $password = $obj->password;
              $email = $obj->email;

            } else {
              echo "No se han recuperar los datos del usuario";
              exit();
            }

          ?>

          <?php if (!isset($_POST["nombre"])) : ?>



          <form method="post">

          <h3 align="center">Edita el Usuario</h3>

          
          
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="colFormLabel" value='<?php echo $nombre; ?>' name="nombre" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Apelllidos</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="colFormLabel" value='<?php echo $apellidos; ?>' name="apellidos" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">ID Usuario</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="colFormLabel" value='<?php echo $id; ?>' name="id_usuario" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Dirección</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="colFormLabel" value='<?php echo $direccion; ?>' name="direccion" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">ID Pelicula</label>
                    <div class="col-sm-8">
                    <input type="password" class="form-control" id="colFormLabel" value='<?php echo $password; ?>' name="password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="colFormLabel" value='<?php echo $email; ?>' name="email" required>
                    </div>
                </div>
                </div>

                <input type="hidden" name="id" value='<?php echo $id; ?>'>
                <button type="submit" class="btn btn-primary my-1">Actualizar</button>





           
          </form>

          <?php else: ?>

          <?php



          $nombre = $_POST["nombre"];
          $apellidos = $_POST["apellidos"];
          $id = $_POST["id"];
          $direccion = $_POST["direccion"];
          $password = md5($_POST["password"]);
          $email = $_POST["email"];

          $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
          $connection->set_charset("uft8");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          $query="update usuario set nombre='$nombre',
          apellidos='$apellidos', id_usuario='$id', direccion='$direccion', password='$password',
          email='$email' WHERE id_usuario='$id'";

          if ($result = $connection->query($query)) {
            header('Location: administrar_usuarios_editar.php');
            echo "Tu Usuario ha sido Editado, Gracias";
          } else {
            echo "Error al actualizar los datos <br>";
          }

          ?>
         <?php endif ?>
        

        </div>       
                
                                
                        
                </div>
        
        
          </body>
        
        
        </html>
