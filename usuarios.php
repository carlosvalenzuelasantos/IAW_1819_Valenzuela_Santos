<?php session_start(); 

if (!isset($_SESSION["nombre"])) {
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

    <title>root</title>
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
                 <h2 class="text-white">Hola Usuario: <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]; ?> </h2>
              </div>

          </div>
     
     
       
    

        <?php

        $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
            $connection->set_charset("uft8");
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $query="SELECT nombre, fecha, director, genero from peliculas";
            if ($result = $connection->query($query)) {
            ?>
                <table style="border:1px solid black">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Fecha</th>
                      <th>Director</th>
                      <th>Genero</th>

                  </thead><br>

                    <?php
                        while($obj = $result->fetch_object()) {
                            echo "<tr>";
                              echo "<td><a href='descripcionpelicula.php?id=".$obj->nombre."'>".$obj->nombre."</a></td>";
                              echo "<td>".$obj->fecha."</td>";
                              echo "<td>".$obj->director."</td>";
                              echo "<td>".$obj->genero."</td>";


                            echo "</tr>";
                        }
                        $result->close();
                        unset($obj);
                        unset($connection);
                    }
                    ?>
                </table>

  </div>


</body>
</html>
