<?php 

require_once "./clases/claseUsuario.php";

$ArrayDeUsuarios = Usuario::TraerTodosLosUsuarios();

foreach ($ArrayDeUsuarios as $item) 
{
	if($_POST['mail']==$item->mail)
	{
		$cadena = $_POST['mail'].rand(1,9999999).date('Y-m-d');
   		$token = md5($cadena);

   		$enlace = 'localhost:8080/tp_pizzeria/php/restablecerPassword.php?token='.$token;
      
      	echo $enlace;

      	Usuario::InsertarReseteo(md5($_POST['mail']),$token);

		mail($_POST['mail'], "Recuperación de mail", $enlace);

		$bandera=1;

		break;
	}
}

if($bandera==1)
{
	echo "Debería haber recibido un mail con un link para la recuperación de la clave";
}else
{
	echo "Error";
}
?>