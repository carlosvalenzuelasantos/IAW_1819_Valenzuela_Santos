
<!DOCTYPE html>
<?php SESSION_start();?>

    

 <?php
        

if (isset($_POST["email"])) {

    //CREATING THE CONNECTION
    $connection = new mysqli("localhost", "root", "Admin2015", "proyecto", 3316);

    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    //MAKING A SELECT QUERY
    //Password coded with md5 at the database. Lo$_POST["email"];ok for better options
    $consulta = "select * from usuario where
              email='" . $_POST["email"] . "' and password=md5('" . $_POST["password"] . "');";

    //Test if the query was correct
    //SQL Injection Possible<user"h1>Peliculas.co$_POST["email"];m</h1>
    //Check http://php.net/manual/es/mysqli.p$_POST["email"]repare.php for more security
    if ($result = $connection->query($consulta)) {

        //No rows returned
        if ($result->num_rows === 0) {
            echo '<script language="javascript">';
            echo 'alert("CONTRASEÑA INCORRECTA VUELVE A INTENTARLO")';
            echo '</script>';

        } else {

            $_SESSION["email"] = $_POST["email"];
            $obj = $result->fetch_object();
            $_SESSION["nombre"] = $obj->nombre;
            $_SESSION["apellidos"] = $obj->apellidos;
            $_SESSION["id_usuario"] = $obj->id_usuario;

            if ($_POST["email"] == "root@root.com") {
                header("Location: root.php");
            } else {
                header("Location: usuarios.php");
            }
        }
    } else {
        echo "Wrong Query";
    }
}

?>




    <html lang="en">

    <title>Peliculas.Com</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, 
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
    <h1>PELICULAS.COM</h1>
    <div class=" w3l-login-form">
        <h2>Logueate Aqui</h2>
        <form action="index.php" method="post">

            <div class=" w3l-form-group">
                <label>Usuario:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" placeholder="Username" required="required" name="email" required/>
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Contraseña:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" placeholder="Password" required="required" input name="password"/>
                </div>
            </div>
            
            <button type="submit" value="Entra">Login</button>
        </form>
        <p class=" w3l-register-p">No Tienes una Cuenta?. A que esperas:<a href="registro.php" class="register"> Registrate Aqui</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2019 Carlos Valenzuela. All Rights Reserved</p>
    </footer>

</body>

</html>