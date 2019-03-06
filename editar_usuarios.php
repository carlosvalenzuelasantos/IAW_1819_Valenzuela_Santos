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
            <fieldset>
              <legend>Información del Usuario</legend>
              <span>Nombre:</span><input value='<?php echo $nombre; ?>'type="text" name="nombre" required><br>
              <span>Apellidos:</span><input value='<?php echo $apellidos; ?>' type="text" name="apellidos" required><br>
              <span>ID Usuario:</span><input value='<?php echo $id; ?>'type="text" name="id_usuario" required><br>
              <span>Direccion:</span><input value='<?php echo $direccion; ?>' type="text" name="direccion" required><br>
              <span>Password:</span><input value='<?php echo $password; ?>'type="password" name="password" required><br>
              <span>Email:</span><input value='<?php echo $email; ?>'type="text" name="email" required><br>
              <input type="hidden" name="id" value='<?php echo $id; ?>'>
              <p><input type="submit" value="Actualizar"></p>
            </fieldset>
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
