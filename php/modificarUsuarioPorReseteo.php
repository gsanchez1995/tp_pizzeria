<?php

session_start();

require_once "./clases/claseUsuario.php";
$miUsuario = Usuario::TraerUsuarioPorId($_POST['id']);

Usuario::ModificarUsuario($_POST['id'],$miUsuario->nombre,$miUsuario->mail,md5($_POST['clave']));

echo "Contraseña modificada!";

?>