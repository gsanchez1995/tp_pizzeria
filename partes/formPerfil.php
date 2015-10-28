<?php

if(isset($_COOKIE['cookieMail']) && isset($_COOKIE['cookieClave']))
{

	echo "
	  Mail:".$_COOKIE['cookieMail']."
	  <form method='post' id='form' name='form' onsubmit='CambiarNombreDeUsuario();return false;'>
	  Cambiar Nombre de Usuario: <input type='text' id='txtNombre' name='txtNombre'/></br>
	  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
	  </form>";
}
else
{
	echo "Debe logearse primero!";
}



?>