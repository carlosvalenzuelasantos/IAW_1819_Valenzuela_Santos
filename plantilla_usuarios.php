<div class="row justify-content-center align-items-center">

                <div id="1" class="col-md-4">
                <h1>PELICULAS.COM</h1>
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
                
                <h5 class="text-white">Hola Usuario: <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]; ?></h5>
                <a id="logout" href="cerrar_session.php"><img src="images/logout.png"></a>
                </div>
</div> 

        
        
     
                    
<div class="row">

            <div class="col-md-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                        <a class="navbar-brand" href="usuarios.php">USUARIO</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                            
                          

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                COMENTARIOS
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="ver_comentarios.php">Ver Comentarios</a>
                                
                                
                                </div>
                            </li>

                            <li>

                               

                            </li>


                            </ul>
                        </div>
                </nav>
            </div>

            <div class="col-md-3">

                <?php 
                include 'buscador_usuarios.php';
                ?>

            </div>
            
            
       

</div>