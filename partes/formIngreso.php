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

	echo "<form class='form-ingreso' method='post' id='form' name='form' onsubmit='VerificarIngreso();return false;'>
		  <h2 class='form-ingreso-heading'>Ingreso:</h2></br>
		  Mail: <input class='form-control' type='text' id='txtMail' name='txtMail' value='".$cookiemail."' required/></br>
		  Clave: <input class='form-control' type='password' id='txtClave' name='txtClave' required/></br>
		  Recordarme: <input type='checkbox' id='checkRecordar' name='checkRecordar'/></br>
		  <button class='btn btn-lg btn-primary btn-block' type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
		  </form></br>
		  Te olvidaste la clave? <input type='button' onclick='Recuperacion();' value='Recuperala'/>";
}else{
	echo "<h3>usted esta logeado como ".$_SESSION['loginMail']."</h3>";
	echo "<button onclick='Deslogear()' class='btn btn-lg btn-danger btn-block' type='button'><span class='glyphicon glyphicon-off'>&nbsp;</span>Deslogearme</button>";
}

	


?>