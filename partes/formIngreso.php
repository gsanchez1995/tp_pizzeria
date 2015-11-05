<?php 
session_start();
require_once "clases/claseValidadora.php";

if(!Validadora::ValidarSesionIniciada())
{
	if(isset($_COOKIE['cookieMail']))
	{
		$cookiemail = $_COOKIE['cookieMail'];
	}else{
		$cookiemail = "";
	}



	echo "<form method='post' id='form' name='form' onsubmit='VerificarIngreso();return false;'>
		  Ingreso:</br>
		  Mail: <input type='text' id='txtMail' name='txtMail' value='".$cookiemail."' required/></br>
		  Clave: <input type='password' id='txtClave' name='txtClave' required/></br>
		  Recordarme: <input type='checkbox' id='checkRecordar' name='checkRecordar'/></br>
		  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
		  </form></br>
		  Te olvidaste la clave? <input type='button' onclick='Recuperacion();' value='Recuperala'/>";
}else{
	echo "<h3>usted esta logeado como ".$_SESSION['loginMail']."</h3>";
	echo "<button onclick='Deslogear()' class='btn btn-lg btn-danger btn-block' type='button'><span class='glyphicon glyphicon-off'>&nbsp;</span>Deslogearme</button>";
}

	


?>