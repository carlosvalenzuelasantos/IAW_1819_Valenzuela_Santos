<?php SESSION_start(); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="root.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Editar Peliculas</title>
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
            echo "No se han recibido datos de la Pelicula";
            exit();
          }


            $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
            $connection->set_charset("uft8");

            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            $query="SELECT * from peliculas where id_pelicula='".$_GET["id"]."'";
        

            if ($result = $connection->query($query))  {

              $obj = $result->fetch_object();

              if ($result->num_rows==0) {
                echo "NO EXISTE ESTA PELICULA";
                exit();
              }



              $id_pelicula = $obj->id_pelicula;
              $nombre = $obj->nombre;
              $fecha = $obj->fecha;
              $director = $obj->director;
              $genero = $obj->genero;
              $link = $obj->link;
              

            } else {
              echo "No se han recuperar los datos de la Pelicula";
              exit();
            }

          ?>

          <?php if (!isset($_POST["id_pelicula"])) : ?>

          <form method="post">
            <fieldset>
              <legend>Información de La Pelicula</legend>
              <span>ID Pelicula:</span><input value='<?php echo $id_pelicula; ?>'type="text" name="id_pelicula" required><br>
              <span>Nombre:</span><input value='<?php echo $nombre; ?>' type="text" name="nombre" required><br>
              <span>Fecha:</span><input value='<?php echo $fecha; ?>'type="text" name="fecha" required><br>
              <span>Director:</span><input value='<?php echo $director; ?>' type="text" name="director" required><br>
              <span>Genero:</span><input value='<?php echo $genero; ?>'type="text" name="genero" required><br>
              <span>Enlace:</span><input value='<?php echo $link; ?>'type="text" name="link"><br>
              
              <input type="hidden" name="id_pelicula" value='<?php echo $id_pelicula; ?>'>
              <p><input type="submit" value="Actualizar"></p>
            </fieldset>
          </form>

          <?php else: ?>

          <?php



          $id_pelicula = $_POST["id_pelicula"];
          $nombre = $_POST["nombre"];
          $fecha = $_POST["fecha"];
          $director = $_POST["director"];
          $genero = $_POST["genero"];
          $link = $_POST["link"];

          $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
          $connection->set_charset("uft8");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          $query="UPDATE peliculas set id_pelicula='$id_pelicula',
          nombre='$nombre', fecha='$fecha', director='$director', genero='$genero', link='$link'
          WHERE id_pelicula='$id_pelicula'";


          if ($result = $connection->query($query)) {
            header('Location: administrar_peliculas.php');
           
          } else {
            echo "Error al actualizar los datos <br>";
          }

          ?>
         <?php endif ?>
        

  </div>