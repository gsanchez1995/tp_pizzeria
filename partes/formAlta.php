<?php 

require_once "./clases/claseUsuario.php";

$bandera = 0;

if(isset($_COOKIE['cookieMail']) && isset($_COOKIE['cookieClave']))
{
	$miUsuario = Usuario::TraerUsuarioPorMailYClave($_COOKIE['cookieMail'],$_COOKIE['cookieClave']);
	
	if($miUsuario->tipo == 'admin')
	{
		$bandera = 1;
	}
}

echo "<form method='post' id='form' name='form' onsubmit='GuardarAlta();return false;'>
	  Nombre: <input type='text' id='txtNombre' name='txtNombre'/></br>
	  Mail: <input type='text' id='txtMail' name='txtMail'/></br>
	  Clave: <input type='password' id='txtClave' name='txtClave'/></br>
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