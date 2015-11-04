<?php 
	session_start();

	require_once "./clases/claseUsuario.php";
	require_once "./clases/claseVenta.php";
	require_once "./clases/claseValidadora.php";
	
	if(Validadora::ValidarSesionIniciada())
	{
		$arrayDeVentas = Venta::TraerTodasLasVentas();
		$miUsuario = Usuario::TraerUsuarioPorMail($_SESSION['loginMail']);

		if($miUsuario->tipo == 'admin')
		{
			echo "<table border='1'>
			<tr>
				<td>Pedido</td>
				<td>Precio</td>
				<td>Provincia</td>
				<td>Localidad</td>
				<td>Direccion</td>
				<td>Tipo</td>
				<td>Promocion</td>
				<td>Vendedor</td>
			</tr>";
		foreach ($arrayDeVentas as $item) 
		{
			echo "<tr>
					<td>$item->pedido</td>
					<td>$item->precio</td>
					<td>$item->provincia</td>
					<td>$item->localidad</td>
					<td>$item->direccion</td>
					<td>$item->tipo</td>
					<td>$item->promocion</td>
					<td>$item->vendedor</td>
					</tr>";
		}
		echo "</table>";
		}else
		{
			echo "Debe ser administrador para poder ver las ventas";
		}
		
	}else{
		echo "Debe logearse primero!";
	}
?>