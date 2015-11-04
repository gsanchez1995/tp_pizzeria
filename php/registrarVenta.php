<?php 

echo $_POST["Provincia"]." ".$_POST["Localidad"]." ".$_POST["Direccion"]." ".$_POST['Promocion']." ".$_POST['Tipo'];

foreach ($_POST["NroDePizzas"] as $item) {
	echo $item." ";
}


?>