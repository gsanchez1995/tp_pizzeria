<?php 
session_start();

require_once("./clases/claseVenta.php");
require_once("./clases/claseUsuario.php");
require_once("./clases/claseProducto.php");

$miUsuario = Usuario::TraerUsuarioPorMail($_SESSION['loginMail']);

if($_POST['Promocion'] == "true")
{
	$laPromocion = "si";
	$elPrecio = 30;
}else{
	$laPromocion = "no";
	$elPrecio = 0;
}

$ArrayDePizzas = $_POST['NroDePizzas'];
$ArrayDeIds = $_POST['IdDePizzas'];

$elPedido = "";

for ($i=0; $i < count($ArrayDePizzas); $i++) 
{
	$miProducto=Producto::TraerProductoPorId($ArrayDeIds[$i]);

	$elPrecio = $elPrecio + $ArrayDePizzas[$i]*$miProducto->precio;

	if($i==0)
	{
		if($ArrayDePizzas[$i]!=0)
		{
			$elPedido = $elPedido.$ArrayDePizzas[$i]." de ".$miProducto->nombre;
		}
	}else
	{
		if($ArrayDePizzas[$i]!=0)
		{
			$elPedido = $elPedido.", ".$ArrayDePizzas[$i]." de ".$miProducto->nombre;
		}
	}
}

if($elPrecio==0)
{
	echo "no puede insertar una venta en la que no se venda nada";
}else
{
	Venta::InsertarVenta($elPedido,$elPrecio,$_POST["Provincia"],$_POST["Localidad"],$_POST["Direccion"],$_POST['Tipo'],$laPromocion,$miUsuario->id);

	echo "venta insertada!";
}


?>