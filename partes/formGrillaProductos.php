<?php 
	session_start();

	require_once "./clases/claseProducto.php";
	require_once "./clases/claseUsuario.php";
	require_once "./clases/claseValidadora.php";
	
	if(Validadora::ValidarSesionIniciada())
	{
		$arrayDeProductos = Producto::TraerTodosLosProductos();
		$miUsuario = Usuario::TraerUsuarioPorMail($_SESSION['loginMail']);


		echo "<table class='table' style='background-color: beige;' id='datatable'>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Foto</th>
					<th>Modificar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>";
		foreach ($arrayDeProductos as $item) 
		{
			echo "<tr>
					<td>$item->nombre</td>
					<td>$item->precio</td>
					<td><img style='width:100px;height:100px;' src='imagenes/$item->foto'/></td>";

			if($miUsuario->tipo == 'admin')
			{
				echo "<td><a onclick='TraerParaModificarProducto(".$item->id.")' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'>&nbsp;</span>Modificar</a></td>";
				echo "<td><a onclick='BorrarProducto(".$item->id.")' class='btn btn-danger'><span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>";
			}
		  	echo "</tr>";
		}
		echo "</tbody></table>";
		echo "<input type='button' onclick='Estadistica()' value='Estadistica'/>";
	}else{
		echo "Debe logearse primero!";
	}
?>