<?php 

require_once "./clases/claseUsuario.php";

Usuario::InsertarUsuario($_POST['nombre'],$_POST['mail'],md5($_POST['clave']),$_POST['tipo']);

echo "usuario creado!";
?>