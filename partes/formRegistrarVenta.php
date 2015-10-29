<?php 

require_once "./clases/claseUsuario.php";

if(isset($_COOKIE['cookieMail']) && isset($_COOKIE['cookieClave']))
	{
		echo "<form method='post' id='form' name='form' action='registroDeProducto.php' enctype='multipart/form-data'>
			  Registro de ventas</br></br>
			  Ingrese Nombre: <input type='text' id='txtNombre' name='txtNombre'/></br>
			  Ingrese Precio: <input type='text' id='txtPrecio' name='txtPrecio'/></br>
			  Ingrese Foto: <input type='file' id='fileFoto' name='fileFoto'/></br>
			  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
			  </form>";
}

?>