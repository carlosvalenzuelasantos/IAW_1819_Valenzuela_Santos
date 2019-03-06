

        <?php
        $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", "3316");
         if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
        exit();
        }

        $id=$_GET['id'];
        echo $id;
        $consulta= "DELETE FROM actores WHERE id_actor='$id'";

        $result = $connection->query($consulta);

        if (!$result) {
        echo "Query Error <br>";
        } else {
            header('Location: administrar_actores_borrar.php');
        }

        ?>
      
                                
  
