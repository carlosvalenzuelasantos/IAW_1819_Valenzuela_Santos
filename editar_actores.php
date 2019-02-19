<?php 
 include 'session_root.php';
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/root.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Editar Actores</title>
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
           
          echo $query; 

          if ($result = $connection->query($query)) {
            header('Location: administrar_actores.php');
          } else {
            echo "Error al actualizar los datos <br>";
          }

          ?>
         <?php endif ?>
        <a href='administrar_actores.php'><input type='button' style='color: #FF0000' value='Volver'></a>

  </div>