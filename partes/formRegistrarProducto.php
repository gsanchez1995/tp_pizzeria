<?php 
session_start();

require_once "./clases/claseUsuario.php";
require_once "./clases/claseValidadora.php";
	
if(Validadora::ValidarSesionIniciada())
	{
		$arrayDeUsuarios = Usuario::TraerTodosLosUsuarios();
		$miUsuario = Usuario::TraerUsuarioPorMail($_SESSION['loginMail']);

		if($miUsuario->tipo == "admin")
		{
			echo "<form class='form-ingreso' method='post' id='form' name='form' action='registroDeProducto.php' enctype='multipart/form-data'>
			   <h2 class='form-ingreso-heading'>Registro de productos</h2></br>
			  Ingrese Nombre: <input class='form-control' type='text' id='txtNombre' name='txtNombre' required/></br>
			  Ingrese Precio: <input class='form-control' type='number' min='1' max='999' id='txtPrecio' name='txtPrecio' required/></br>
			  Ingrese Foto: <input class='form-control' type='file' id='fileFoto' name='fileFoto' required/></br>
			  <button class='btn btn-lg btn-primary btn-block' type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
			  </form>";
		}else{
			echo "Usted no es administrador y por lo tanto no puede registrar productos";		
		}
	}
else{
	echo "Debe logearse como administrador primero";
}
?>