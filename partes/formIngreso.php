<?php 

echo "<form method='post' id='form' name='form' onsubmit='VerificarIngreso();return false;'>
	  Ingreso:</br>
	  Mail: <input type='text' id='txtMail' name='txtMail'/></br>
	  Clave: <input type='password' id='txtClave' name='txtClave'/></br>
	  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
	  </form></br>
	  Te olvidaste la clave papu? <button onclick='Recuperacion();'>Recuperala</button>";


?>