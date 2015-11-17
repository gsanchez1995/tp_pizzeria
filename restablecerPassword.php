<link rel="stylesheet" href="bower_components/bootstrap-css/css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/media-queries.css" rel="stylesheet" type="text/css">
<link href="css/ingreso.css" rel="stylesheet">
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="js/funcionesABM.js"></script>

<?php

require_once "clases/claseUsuario.php";
require_once "clases/claseReseteo.php";

$ArrayDeReseteos = Reseteo::TraerTodosLosReseteos();

foreach ($ArrayDeReseteos as $item) 
{
	if($item->token == $_GET['token'])
	{
		$unUsuario =  Usuario::TraerUsuarioPorMail($item->mail);
	}
}

echo "<center><form class='form-ingreso' method='post' id='form' name='form' onsubmit='ModificarUsuarioPorReseteo();return false;'>
		  <h2 class='form-ingreso-heading'>Cambiar clave: </h2>
		  <input class='form-control' type='password' id='txtClave' name='txtClave' required/></br>
		  <input type='hidden' name='hiddenId' id='hiddenId' value='$unUsuario->id'/>
		  <button class='btn btn-lg btn-primary btn-block' type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
		  </form></center>";

?>