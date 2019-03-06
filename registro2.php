<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/root.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registro Nuevo Usuario</title>
  </head>
  <body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php

if (isset($_POST["nombre"])) {
 $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", 3316);

 if ($connection->connect_errno) {
     printf("Connection failed: %s\n", $connection->connect_error);
     exit();
 }

 $usuario="INSERT INTO usuario (nombre, apellidos, id_usuario, direccion, password, email)
  VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."',null,'".$_POST['direccion']."',
  md5('".$_POST['password']."'),'".$_POST['email']."');";

echo $usuario;
 if ($result =$connection->query($usuario)) {
    header("Location: index.php");
  } else {
    echo "<h1>Error en el registro</h1>";
  }
 }

  ?>

  <div class ="container">
        <div class ="titulo">
           <div class="row justify-content-center">
            <h1 class="text-white display-2">Peliculas.com</h1>
          </div>
           <div class="row justify-content-center">
           <h2 class="text-white">Registrate</h2>
           </div>
        </div>

        <form action="registro.php" method="post">
          <p style="color:red">Nombres:
          <input name="nombre" type="text" placeholder="Nombres" required></p>
          <p style="color:red">Apellidos:
          <input name="apellidos" type="text" placeholder="Apellidos" required></p>
          <p style="color:red">Direccion:
          <input name="direccion" type="text" placeholder="Tu Direccion" required></p>
          <p style="color:red">Email:
          <input name="email" type="email" placeholder="Tu email" required></p>
          <p style="color:red">Password:
          <input name="password" type="password" placeholder="Password" required></p>
          <p><input type="submit" value="Registrarse"></p>
          <a href="index.php"><input type="button" value="Salir"></a>
         
        </form>



  </div>

</body>



</html>