<?php 
session_start();

require_once "./clases/claseUsuario.php";

$ArrayDeUsuarios = Usuario::TraerTodosLosUsuarios();

$bandera=0;

foreach ($ArrayDeUsuarios as $item) 
{
	if($_POST['mail']==$item->mail && md5($_POST['clave'])==$item->clave)
	{
		$_SESSION['loginMail']=$_POST['mail'];
		$_SESSION['loginTiempo']=date("Y-M-d H:i:s");

		$bandera=1;
		break;
	}
}

if($bandera==0)
{
	echo "no existe usuario con ese mail y clave";
}else
{
	echo "Logeado como: ".$_SESSION['loginMail'];
}
?>