<?php

session_start();

require_once "./clases/claseUsuario.php";
$miUsuario = Usuario::TraerUsuarioPorMail($_SESSION['loginMail']);

if($_POST['id']==$miUsuario->id)
{
	$_SESSION['loginMail'] = $_POST['mail'];
}

if($_POST['clave'] == "")
{
	Usuario::ModificarUsuario($_POST['id'],$_POST['nombre'],$_POST['mail'],$miUsuario->clave);
}else
{
	Usuario::ModificarUsuario($_POST['id'],$_POST['nombre'],$_POST['mail'],md5($_POST['clave']));
}


echo "Usuario modificado!";

?>