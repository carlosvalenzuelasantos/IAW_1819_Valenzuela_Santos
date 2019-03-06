
<html lang="en">

  
        <?php 
        include 'head.php';
        ?>


  <body>

        <div class="container">


        <div class="row justify-content-center align-items-center">

                <div id="1" class="col-md-4">
                </div>
         
                <div id="carrusel" class="col-md-4">

                    <header>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active" data-interval="2000">
                              <img src="images/carrousel/plex.jpeg" class="d-block" alt="...">
                            </div>

                            <div class="carousel-item" data-interval="2000">
                              <img src="images/carrousel/netflix.jpg" class="d-block" alt="...">
                            </div>

                            <div class="carousel-item" data-interval="2000">
                              <img src="images/carrousel/hbo.png" class="d-block" alt="...">
                            </div>

                            <div class="carousel-item" data-interval="2000">
                              <img src="images/carrousel/amazon.png" class="d-block" alt="...">
                            </div>
                        </div>
                    </div>
                            
                        
                </div>

                <div id="3" class="col-md-4">
                
                <h5 class="text-black">Hola nuevo usuario, rellena todos los campos y disfruta del contenido</h5>

                </div>
</div> <br><br>

<div class="row justify-content-center">

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
        </div>  


  </body>


</html>


