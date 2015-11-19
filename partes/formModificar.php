<?php

echo "<form class='form-ingreso' method='post' id='form' name='form' onsubmit='ModificarUsuario();return false;'>
		  <h2 class='form-ingreso-heading'>Modificar Usuario</h2>
		  Cambiar Nombre de Usuario: <input class='form-control'type='text' id='txtNombre' name='txtNombre' required/></br>
		  Cambiar Mail: <input class='form-control' type='mail' id='txtMail' name='txtMail' required/></br>
		  Cambiar clave: <input class='form-control' type='password' id='txtClave' name='txtClave'/></br>
		  <input type='hidden' name='hiddenId' id='hiddenId'/>
		  <input type='hidden' name='hiddenMail' id='hiddenMail'/>
		  <button type='submit' class='btn btn-lg btn-primary btn-block' id='btnAceptar' name='btnAceptar'>Aceptar</button>
		  </form>";

?>