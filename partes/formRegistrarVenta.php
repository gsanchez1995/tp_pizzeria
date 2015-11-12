<?php 
session_start();

require_once "./clases/claseUsuario.php";
require_once "./clases/claseProducto.php";
require_once "./clases/claseValidadora.php";

if(Validadora::ValidarSesionIniciada())
	{ 

echo "<form class='form-ingreso' method='post' id='form' name='form' onsubmit='RegistrarVenta();return false;'>
		
	   <h2 class='form-ingreso-heading'>Registro de ventas</h2></br>";

$ArrayDeProductos = Producto::TraerTodosLosProductos();
$contador=0;

foreach ($ArrayDeProductos as $item) {
	echo "<input class='form-control' type='text' name='txtPizza".$contador."' id='txtPizza".$contador."' style='width: 30px;' value='0'>
		  pizzas de $item->nombre
		  <input type='hidden' name='idPizza".$contador."' id='idPizza".$contador."' value='$item->id'/></br>";
	$contador++;
}
echo "<input type='hidden' id='hiddenPizzas' name='hiddenPizzas' value='".count($ArrayDeProductos)."'/>";		  


echo "</br></br>Provincia: <select class='form-control' name='selectProvincia' id='selectProvincia' onchange='cambiarSelectLocalidad()'>
		  <option value='Buenos Aires' default>Buenos Aires</option>
		  <option value='Capital'>Capital</option>
		</select></br>
	Localidad: <select class='form-control' name='selectLocalidad' id='selectLocalidad'>
	  	  <option value='Avellaneda' default>Avellaneda</option>
		  <option value='Quilmes'>Quilmes</option>
		  <option value='Lanus' default>Lanus</option>
		</select></br>
	Ingrese Direccíón: <input class='form-control' type='text' id='txtDireccion' name='txtDireccion' required/></br>
	Comprador: <input type='radio' name='radioTipo' id='radioTipo1' value='Particular' checked>Particular
	<input type='radio' name='radioTipo' id='radioTipo2' value='Empresa'>Empresa</br></br>
	Promoción: <input type='checkbox' name='checkPromo' id='checkPromo'><br><br>

	<button class='btn btn-lg btn-danger btn-block' type='submit' id='btnAceptar' name='btnAceptar'>Aceptar</button>
	</form>";

	}else
{
	echo "Debe logearse primero para realizar una venta";
}

?>