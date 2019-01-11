
<!DOCTYPE html>
<?php SESSION_start(); ?>

    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="inicio.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>inicio</title>
      </head>
      <body>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <?php
            //FORM SUBMITTEDroot.php
            if (isset($_POST["email"])) {

              //CREATING THE CONNECTION
              $connection = new mysqli("localhost", "root", "Admin2015", "proyecto",3316);

              //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }

              //MAKING A SELECT QUERY
              //Password coded with md5 at the database. Lo$_POST["email"];ok for better options
              $consulta="select * from usuario where
              email='".$_POST["email"]."' and password=md5('".$_POST["password"]."');";

              //Test if the query was correct
              //SQL Injection Possible<user"h1>Peliculas.co$_POST["email"];m</h1>
              //Check http://php.net/manual/es/mysqli.p$_POST["email"]repare.php for more security
              if ($result = $connection->query($consulta)) {

                  //No rows returned
                  if ($result->num_rows===0) {
                    echo "LOGIN INVALIDO";
                  }  else {

                      $_SESSION["email"]=$_POST["email"];
                      $obj = $result->fetch_object();
                      $_SESSION["nombre"]=$obj->nombre;
                      $_SESSION["apellidos"]=$obj->apellidos;

                      if ($_POST["email"]=="root@root.com"){
                         header("Location: root.php");
                     }  else {
                       header("Location: usuarios.php");
                     }
                }
              }
               else {
                echo "Wrong Query";
             }
           }

        ?>


        <div class ="container">

            <div class ="titulo">
               <div class="row justify-content-center">
                <h1 class="text-white display-2">Peliculas.com</h1>
               </div>
            </div>

            <div class="login">
              <div class="row justify-content-center">
                  <form action="inicio.php" method="post">
                    <h4 class ="text-white">Usuario (email): </h4>
                    <p><input name="email" required></p>
                    <h4 class ="text-white">Contraseña :</h4>
                    <p><input name="password" type="password" required></p>
                    <p><input type="submit" value="Entra"></p>
                    <p>Si no estas Registrado, Pincha <a href="registro.php">AQUI</a></p>

                  </form>
                </div>
            </div>

        </div>


      </body>



    </html>
