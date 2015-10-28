<?php

if(isset($_COOKIE['cookieMail']) && isset($_COOKIE['cookieClave']))
{

	echo "<form method='post' id='form' name='form' onsubmit='Modificar();return false;'>
		  Cambiar Nombre de Usuario: <input type='text' id='txtNombre' name='txtNombre'/></br>
		  Cambiar Mail: <input type='text' id='txtMail' name='txtMail'/></br>
		  Cambiar clave: <input type='password' id='txtClave' name='txtClave'/></br>
		  <input type='hidden' name='hiddenId' id='hiddenId'/>
		  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
		  </form>";
}
else
{
	echo "Debe logearse primero!";
}

?>