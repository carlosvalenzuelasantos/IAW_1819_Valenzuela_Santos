
<html lang="en">

  
        <?php 
        include 'head.php';
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


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


<form class="form-horizontal" role="form" method="POST" action="registro.php">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>Registrate</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Nombre</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="nombre" class="form-control" id="nombre"
                               placeholder="Escribe aqui tu nombre" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Apellidos</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="apellidos" class="form-control" id="apellidos"
                               placeholder="Escribe aqui tus apellidos" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Direccion</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="direccion" class="form-control" id="direccion"
                               placeholder="Calle #.." required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">E-Mail</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="nombre@example.com" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            
                        </span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Registrate</button>
            </div>
            
        </div>

    </form>
     
    <div class="row">

            <div class="col-md-9">
              
            </div>

           <div class="col-md-3">
              <a href="index.php"><button class="btn btn-success"><i class="fa fa-sign-out"></i> Salir</button></a>
            </div>
    </div>

</div>




        
                
                                
                        
        
        </div>  

        </div>     


  </body>


</html>


