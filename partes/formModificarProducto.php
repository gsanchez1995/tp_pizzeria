<?php

echo "<form method='post' id='form' name='form' action='modificacionDeProducto.php' enctype='multipart/form-data'>
		  Cambiar Nombre: <input type='text' id='txtNombre' name='txtNombre'/></br>
		  Cambiar Precio: <input type='text' id='txtPrecio' name='txtPrecio'/></br>
		  Foto: <img style='width:100px;height:100px;' id='laImagen' name='laImagen'/></br>
		  Cambiar: <input type='file' id='fileFoto' name='fileFoto' required/></br>
		  <input type='hidden' name='hiddenId' id='hiddenId'/>
		  <button type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
		  </form>";
		  
?>