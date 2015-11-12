<?php

echo "<form method='post' id='form' name='form' onsubmit='ModificarUsuario();return false;'>
		  Cambiar Nombre de Usuario: <input type='text' id='txtNombre' name='txtNombre' required/></br>
		  Cambiar Mail: <input type='mail' id='txtMail' name='txtMail' required/></br>
		  Cambiar clave: <input type='password' id='txtClave' name='txtClave'/></br>
		  <input type='hidden' name='hiddenId' id='hiddenId'/>
		  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
		  </form>";

?>