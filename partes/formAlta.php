<?php 
session_start();

require_once "./clases/claseUsuario.php";
require_once "./clases/claseValidadora.php";

$bandera = 0;

if(Validadora::ValidarSesionIniciada())
{
	$miUsuario = Usuario::TraerUsuarioPorMail($_SESSION['loginMail']);
	
	if($miUsuario->tipo == 'admin')
	{
		$bandera = 1;
	}
}

echo "<form class='form-ingreso' method='post' id='form' name='form' onsubmit='GuardarAlta();return false;'>
	  Nombre: <input class='form-control' type='text' id='txtNombre' name='txtNombre' required/></br>
	  Mail: <input class='form-control' type='email' id='txtMail' name='txtMail' required/></br>
	  Clave: <input class='form-control' type='password' id='txtClave' name='txtClave' required/></br>
	  Tipo:
	  <select class='form-control' name='selectTipo' id='selectTipo' ";

	  if($bandera == 0)
	  {
	  		echo "disabled";
	  }

	  echo ">
	      <option value='admin'>Administrador</option>
	      <option value='user' selected>Usuario común</option>
	  </select></br>
	  <button class='btn btn-lg btn-danger btn-block' type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
	  </form>";


?>