
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="root.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Añade Peliculas</title>
  </head>
  <body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <div class ="container">
          <div class ="titulo">
             <div class="row justify-content-center">
              <h1 class="text-white display-2">Peliculas.com</h1>
            </div>
             <div class="row justify-content-center">
             <h2 class="text-white">Añade Peliculas</h2>
             </div>
          </div>



<?php

if (!isset($_POST["nombre"])) : ?>
    <form method="post">
      <fieldset>
        <legend>Añade La Pelicula</legend>
        <span>Nombre:</span><input type="text" name="nombre" required><br>
        <span>Fecha:</span><input type="date" name="fecha" required><br>
        <span>Director:</span><input type="text" name="director" required><br>
        <span>Genero:</span><input type="text" name="genero" required><br>
        <span><input type="submit" value="Insertar Pelicula">
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
   $fecha=$_POST['fecha'];
   $director=$_POST['director'];
   $genero=$_POST['genero'];

   $consulta= "INSERT INTO peliculas VALUES(NULL, '$nombre','$fecha', '$director', '$genero')";

   $result = $connection->query($consulta);

   if (!$result) {
      echo "Query Error <br>";
   } else {
       echo "Nueva Pelicula Añadida, Gracias<br>";
   }

  ?>

<?php endif; ?>

<a href='anade_pelicula.php'><input type='button' style='color: #FF0000' value='Volver a añadir Pelicula'></a>
<a href='root.php'><input type='button' style='color: #FF0000' value='Volver a Inicio'></a>

</div>



</body>



</html>
