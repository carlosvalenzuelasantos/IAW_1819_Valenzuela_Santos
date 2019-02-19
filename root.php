<?php 
 include 'session_root.php';
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/root.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                        
                        
                        
                        
                        
                        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php

  ?>

  <div class ="container">
        <div class ="titulo">
           <div class="row justify-content-center">
            <h1 class="text-white display-2">Peliculas.com</h1>
           </div>
           <div class="row justify-content-center">
           <h2 class="text-white">Hola Administrador: <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]; ?></h2>
           </div>
        </div>

      <div>
        <table border="2">
          <thead>
            <tr>
              <th>Administrador</th>
            </tr>
          </thead>
            <tr>
              <td><a href="anade_pelicula.php">Añade una Pelicula</a></td>
            </tr>

            <tr>
              <td><a href="administrar_peliculas.php">Administrar Pelicula</a></td>
            </tr>

            <tr>
              <td><a href="anade_actores.php">Añade un Actor</a></td>
            </tr>

            <tr>
              <td><a href="administrar_actores.php">Administrar un Actor</a></td>
            </tr>
            
            <tr>
              <td><a href="administrar_usuarios.php">Administrar Usuarios</a></td>
            </tr>

            <tr>
              <td><a href="administrar_comentarios.php">Administrar Comentarios</td>
            </tr>

            <tr>
              <td><a href="root_usuarios.php">Vista Usuario</td>
            </tr>         
            
            <tr>
              <td>
            <a href='cerrar_session.php'><input type='button' style='color: #FF0000' value='LOGOUT'></a>

              </td>
            </tr>
            

          <tbody>
          </tbody>

        </table>
      </div>

  </div>

</body>



</html>
