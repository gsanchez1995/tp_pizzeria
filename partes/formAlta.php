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

echo "<form method='post' id='form' name='form' onsubmit='GuardarAlta();return false;'>
	  Nombre: <input type='text' id='txtNombre' name='txtNombre' required/></br>
	  Mail: <input type='email' id='txtMail' name='txtMail' required/></br>
	  Clave: <input type='password' id='txtClave' name='txtClave' required/></br>
	  Tipo:
	  <select name='selectTipo' id='selectTipo' ";

	  if($bandera == 0)
	  {
	  		echo "disabled";
	  }

	  echo ">
	      <option value='admin'>Administrador</option>
	      <option value='user' selected>Usuario común</option>
	  </select></br></br>Nota: Solo va a poder modificar el select si está logeado como administrador. O sea, que solo los admins dan de alta admins.</br>
	  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
	  </form>";


?>