
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="root.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Añade Actores</title>
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
        <legend>Añade Los Actores</legend>
        <span>Nombre:</span><input type="text" name="nombre" required><br>
        <span>Nacionalidad:</span><input type="text" name="nacionalidad" required><br>
        <span>Fecha de Nacimiento:</span><input type="date" name="fecha" required><br>
        <span><input type="submit" value="Insertar Actor">
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
      header('Location: administrar_actores.php');
   }

  ?>

<?php endif; ?>

</div>

</body>



</html>
