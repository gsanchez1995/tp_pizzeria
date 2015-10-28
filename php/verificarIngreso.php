<?php 

require_once "./clases/claseUsuario.php";

$ArrayDeUsuarios = Usuario::TraerTodosLosUsuarios();

$bandera=0;

foreach ($ArrayDeUsuarios as $item) 
{
	if($_POST['mail']==$item->mail && md5($_POST['clave'])==$item->clave)
	{
		setcookie('cookieMail',$_POST['mail']);
		setcookie('cookieClave',md5($_POST['clave']));

		$bandera=1;
		break;
	}
}

if($bandera==0)
{
	echo "no existe usuario con ese mail y clave";
	unset($_COOKIE);
}else
{
	echo "No sé porque motivo logea con la cookie anterior y no con la actual.</br></br>Logeado como: ".$_COOKIE['cookieMail'];
}
?>