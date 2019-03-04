<?php session_start(); 

if (!isset($_SESSION["nombre"]) || $_SESSION["email"]!="root@root.com")
{
  session_destroy();
    header("Location: index.php");
}
 
?>