<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/plantilla.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div class="container">

        <div class="row justify-content-center">

        <div id="carrusel" class="col-md-4">
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

                <div id="carrusel" class="col-md-4">
        </div>
        </div> 
        
       
</div>      
                    
        <div class="row">

            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="root.php">ADMINISTRADOR</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                PELICULAS   
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="anade_pelicula.php">Añade</a>
                                <a class="dropdown-item" href="administrar_peliculas.php">Edita-Borra</a>
                                
                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ACTORES
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="anade_actores.php">Añade</a>
                                <a class="dropdown-item" href="administrar_actores.php">Edita-Borra</a>
                                
                                </div>
                            </li>



                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                USUARIOS
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="administrar_usuarios.php">Edita-Borra</a>
                                <a class="dropdown-item" href="administrar_comentarios.php">Comentarios</a>
                                
                                </div>
                            </li>

                    

                            <li>

                            <a id="logout" href="cerrar_session.php"><img src="images/logout.png"></a>   

                            </li>


                            </ul>
                        </div>
                </nav>
            </div>   
                

    
            
        </div>


     
     
        
</div>
            







    
    
    </body>



</html>