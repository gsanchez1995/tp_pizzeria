<?php 

require_once "./clases/claseUsuario.php";

$ArrayDeUsuarios = Usuario::TraerTodosLosUsuarios();

foreach ($ArrayDeUsuarios as $item) 
{
	if($_POST['mail']==$item->mail)
	{
		mail($_POST['mail'], "Recuperación de mail", "aca iría el link");

		echo "Debería haber recibido un mail con un link para la recuperación de la clave";
	}
}
?>