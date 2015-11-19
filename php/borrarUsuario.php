<?php 

session_start();

require_once "./clases/claseUsuario.php";

$unUsuario = Usuario::TraerUsuarioPorId($_POST['id']);

if($_SESSION['loginMail']==$unUsuario->mail)
{
	unset($_SESSION['loginMail']);
	setcookie("cookieMail","",time()-3600);
	setcookie("cookieClave","",time()-3600);
}

Usuario::BorrarUsuario($_POST['id']);

if(isset($_SESSION['loginMail']))
{
	echo "con session";
}else
{
	echo "sin session";
}


?>