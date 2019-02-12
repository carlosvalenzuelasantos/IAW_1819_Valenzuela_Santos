<?php session_start(); 

if (!isset($_SESSION["nombre"]) || $_SESSION["email"]!="root@root.com")
{
  session_destroy();
    header("Location: inicio.php");
}
 
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="root.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Editar Usuarios</title>
  </head>
  <body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php

  ?>

  <div class ="container">
        <div class ="titulo">
           <div class="row justify-content-center">
            <h1 class="text-white display-2">Peliculas.com</h1>
           </div>
           <div class="row justify-content-center">
           <h2 class="text-white">Hola Administrador: </h2>
           </div>
        </div>



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
            header('Location: administrar_usuarios.php');
          } else {
            echo "Error al actualizar los datos <br>";
          }

          ?>
         <?php endif ?>
        <a href='administrar_usuarios.php'><input type='button' style='color: #FF0000' value='Volver'></a>

  </div>
