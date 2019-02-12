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

    <title>Editar Comentarios</title>
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

            $query="SELECT * from comentar where id_usuario='".$_GET["id"]."'";

            if ($result = $connection->query($query))  {

              $obj = $result->fetch_object();

              if ($result->num_rows==0) {
                echo "NO EXISTE ESE USUARIO";
                exit();
              }



              $valoracion = $obj->valoracion;
              $comentarios = $obj->comentarios;
              $id_pelicula = $obj->id_pelicula;
              $id = $obj->id_usuario;
              

            } else {
              echo "No se han recuperar los datos del usuario";
              exit();
            }

          ?>

          <?php if (!isset($_POST["id_usuario"])) : ?>

          <form method="post">
            <fieldset>
              <legend>Información del Usuario</legend>
              <span>Valoracion:</span><input value='<?php echo $valoracion; ?>'type="text" name="valoracion" required><br>
              <span>Comentarios:</span><input value='<?php echo $comentarios; ?>' type="text" name="comentarios" required><br>
              <span>ID Pelicula:</span><input value='<?php echo $id_pelicula; ?>'type="text" name="id_pelicula" required><br>
              <span>ID Usuario:</span><input value='<?php echo $id; ?>' type="text" name="id_usuario" required><br>
              
              <p><input type="submit" value="Actualizar"></p>
            </fieldset>
          </form>

          <?php else: ?>

          <?php



          $valoracion = $_POST["valoracion"];
          $comentarios = $_POST["comentarios"];
          $id_pelicula = $_POST["id_pelicula"];
          $id = $_POST["id_usuario"];
         

          $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
          $connection->set_charset("uft8");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          $query="UPDATE comentar set valoracion='$valoracion',
          comentarios='$comentarios', id_pelicula='$id_pelicula', id_usuario='$id' WHERE id_usuario='$id'";

          echo $query;

          if ($result = $connection->query($query)) {
            echo "Usuario actualizado <br>";
          } else {
            echo "Error al actualizar los datos <br>";
          }

          ?>
         <?php endif ?>
        <a href='administrar_comentarios.php'><input type='button' style='color: #FF0000' value='Volver'></a>

  </div>