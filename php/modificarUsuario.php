<?php

require_once "./clases/claseUsuario.php";

Usuario::ModificarUsuario($_POST['id'],$_POST['nombre'],$_POST['mail'],md5($_POST['clave']));

echo "Usuario modificado!";

?>