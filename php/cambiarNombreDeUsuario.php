<?php 

require_once "./clases/claseUsuario.php";

Usuario::ModificarUsuario($_POST['nombre'],$_COOKIE['cookieMail'],$_COOKIE['cookieClave']);

echo "Nombre de usuario modificado!!!";
?>