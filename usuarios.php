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

    <title>Usuarios_Registrados</title>
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


                    if (isset($_POST["buscador"]) && isset($_POST['opcion'])) {
                      
                        if ($_POST["opcion"]=="nombre") {
                          $querya="SELECT distinct nombre as nombrepelicula, id_pelicula 
                                  from peliculas 
                                  
                                  where nombre like '%".$_POST["buscador"]."%'";

                         //echo $querya;

                         

                        
                        if ($result = $connection->query($querya)) {
            
                            ?>
                
                                <table style="border:1px solid black">
                                  <thead>
                                    <tr>
                                      
                                      <th>Nombre Pelicula</th>
                                     
                                      <th>Valoracion Media</th>
                                    
                                      <th>Descripcion</th>
                
                
                                  </thead><br>
                
                                    <?php

                                        while($obj = $result->fetch_object()) {
                                            echo "<tr>";
                
                                              echo "<td>".$obj->nombrepelicula."</a></td>";
                                                  
                                              
                
                  
                                                $query2="SELECT TRUNCATE(AVG (valoracion),2) as media from comentario where id_pelicula='$obj->id_pelicula'";
                  
                                                    if ($result1 = $connection->query($query2)) {
                
                                                      while($obj1 = $result1->fetch_object()) {
                                                      echo "<td>".$obj1->media."</td>";
                
                                                      }
                                                    }
                                 
                                              echo "<td><a href='descripcion_pelicula.php?id=".$obj->id_pelicula."'><img src='images/link.png' height='25' width='25'/></td>";
                
                
                                            echo "</tr>";
                                        }
                                        $result->close();
                                        unset($obj);
                                        unset($connection);
                                    }

                                  }
 
                                    elseif ($_POST["opcion"]=="actor") {
                                      $queryb="SELECT distinct a.nombre as nombreactor, p.nombre as nombrepelicula, p.id_pelicula 
                                              from peliculas p
                                              join participar pa on p.id_pelicula = pa.id_pelicula
                                              join actores a on a.id_actor = pa.id_actor
                                              where a.nombre like '%".$_POST["buscador"]."%'";

                                   // echo $queryb;
                                    

                                    if ($result = $connection->query($queryb)) {
            
                                      ?>
                          
                                          <table style="border:1px solid black">
                                            <thead>
                                              <tr>
                                                
                                                <th>Nombre Pelicula</th>
                                               
                                                <th>Nombre Actor</th>
                          
                                                <th>Valoracion Media</th>
                                              
                                                <th>Descripcion</th>
                          
                          
                                            </thead><br>
                          
                                              <?php

                                                  while($obj = $result->fetch_object()) {
                                                      echo "<tr>";
                          
                                                        echo "<td>".$obj->nombrepelicula."</a></td>";
                                                        echo "<td>".$obj->nombreactor."</td>";     
                                                        
                          
                            
                                                          $query2="SELECT TRUNCATE(AVG (valoracion),2) as media from comentario where id_pelicula='$obj->id_pelicula'";
                            
                                                              if ($result1 = $connection->query($query2)) {
                          
                                                                while($obj1 = $result1->fetch_object()) {
                                                                echo "<td>".$obj1->media."</td>";
                          
                                                                }
                                                              }
                                           
                                                        echo "<td><a href='descripcion_pelicula.php?id=".$obj->id_pelicula."'><img src='images/link.png' height='25' width='25'/></td>";
                          
                          
                                                      echo "</tr>";
                                                  }
                                                  $result->close();
                                                  unset($obj);
                                                  unset($connection);
                                              }
                                            }

                      }  
                    

                                    ?>
          



        <?php

        if(!isset($_POST['buscador'])) {

        $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
            $connection->set_charset("uft8");
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
   
              
      
            $query="SELECT * from peliculas";

            if ($result = $connection->query($query)) {
            
              
            
            ?>

                <form class="" method="post">
                
                  <input type="text" name="buscador" required>
                  <input type="submit" name="" value="Buscar">
                  
                  <input type="radio" name="opcion" value="nombre"><label> Por Nombre</label>
                  <input type="radio" name="opcion" value="actor"><label> Por Actor</label><br><br>
          
          
                </form>

                <table style="border:1px solid black">
                  <thead>
                    <tr>
                      <th>ID Pelicula</th>
                      <th>Nombre</th>
                     
                      <th>Director</th>

                      <th>Valoracion Media</th>
                    
                      <th>Descripcion</th>


                  </thead><br>

                    <?php
                        while($obj = $result->fetch_object()) {
                            echo "<tr>";

                              echo "<td>".$obj->id_pelicula."</a></td>";
                              echo "<td>".$obj->nombre."</td>";     
                              echo "<td>".$obj->director."</td>";

                
                                $query2="SELECT TRUNCATE(AVG (valoracion),2) as media from comentario where id_pelicula='$obj->id_pelicula'";
  
                                    if ($result1 = $connection->query($query2)) {

                                      while($obj1 = $result1->fetch_object()) {
                                      echo "<td>".$obj1->media."</td>";

                                      }
                                    }
                 
                              echo "<td><a href='descripcion_pelicula.php?id=".$obj->id_pelicula."'><img src='images/link.png' height='25' width='25'/></td>";


                            echo "</tr>";
                        }
                        $result->close();
                        unset($obj);
                        unset($connection);
                    }

                  }
                    ?>
                </table>
                
                <table>
                   <tr>
  
                     <td><form action='inicio.php'><input type='submit' style='color: #FF0000' value='Salir'></form></td>
                     <td><form action='usuarios.php'><input type='submit' style='color: #FF0000' value='Volver a Buscar'></form></td>

                   </tr>
  </table>

  </div>


</body>
</html>
