<?php 
session_start();
require_once "clases/claseValidadora.php";

if(!Validadora::ValidarSesionIniciada())
{
	echo "<form method='post' id='form' name='form' onsubmit='VerificarIngreso();return false;'>
		  Ingreso:</br>
		  Mail: <input type='text' id='txtMail' name='txtMail'/></br>
		  Clave: <input type='password' id='txtClave' name='txtClave'/></br>
		  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
		  </form></br>
		  Te olvidaste la clave papu? <button onclick='IrHacia('Recuperacion');'>Recuperala</button>";
}else{
	echo "<h3>usted esta logeado como ".$_SESSION['loginMail']."</h3>";
	echo "<button onclick='Deslogear()' class='btn btn-lg btn-danger btn-block' type='button'><span class='glyphicon glyphicon-off'>&nbsp;</span>Deslogearme</button>";
}

	


?>