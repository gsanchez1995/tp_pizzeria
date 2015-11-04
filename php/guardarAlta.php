<?php 

require_once "./clases/claseUsuario.php";

$arrayDeUsuarios = Usuario::TraerTodosLosUsuarios();

$bandera = 0;

foreach ($arrayDeUsuarios as $item) 
{
	if($item->mail == $_POST['mail'])
	{
		$bandera = 1;
		break;
	}
}

if($bandera==0)
{
	Usuario::InsertarUsuario($_POST['nombre'],$_POST['mail'],md5($_POST['clave']),$_POST['tipo']);
	echo "usuario creado!";
}else
{
	echo "Ya existe un usuario con ese mail ";
	echo "<input type='button' onclick=\"IrHacia('Ingreso')\" value='Logearse'/>";
}
?>