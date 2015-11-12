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
			echo "<table class='table' style='background-color: beige;'>
			<thead>
				<tr>
					<th>Pedido</th>
					<th>Precio</th>
					<th>Provincia</th>
					<th>Localidad</th>
					<th>Direccion</th>
					<th>Tipo</th>
					<th>Promocion</th>
					<th>Vendedor</th>
					<th>Ver en Mapa</th>
				</tr>
			</thead>
			<tbody>";
		foreach ($arrayDeVentas as $item) 
		{
			 $l = '"'.$item->provincia. '"'.',"'.$item->localidad. '"'.',"'.$item->direccion. '"'.',"'.$item->pedido. '"';

			echo "<tr>
					<td>$item->pedido</td>
					<td>$item->precio</td>
					<td>$item->provincia</td>
					<td>$item->localidad</td>
					<td>$item->direccion</td>
					<td>$item->tipo</td>
					<td>$item->promocion</td>
					<td>$item->vendedor</td>
					<td><a onclick='VerEnMapa($l)' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'>&nbsp;</span>Ver en Mapa</a></td>
					
					</tr>";
		}
		echo "</tbody></table>";
		}else
		{
			echo "Debe ser administrador para poder ver las ventas";
		}
		
	}else{
		echo "Debe logearse primero!";
	}
?>