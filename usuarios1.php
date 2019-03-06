
                    
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

                

                <table style="border:1px solid black">
                  <thead>
                    <tr>
                      
                      <th>Nombre</th>
                     
                      <th>Director</th>

                      <th>Valoracion Media</th>
                    
                      <th>Descripcion</th>


                  </thead><br>

                    <?php
                        while($obj = $result->fetch_object()) {
                            echo "<tr>";

                              
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
                
                