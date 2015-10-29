<?php 
	require_once "./clases/claseProducto.php";
	require_once "./clases/claseUsuario.php";
	
	if(isset($_COOKIE['cookieMail']) && isset($_COOKIE['cookieClave']))
	{
		$arrayDeProductos = Producto::TraerTodosLosProductos();
		$miUsuario = Usuario::TraerUsuarioPorMailYClave($_COOKIE['cookieMail'],$_COOKIE['cookieClave']);


		echo "<table border='1'>
			<tr>
				<td>Nombre</td>
				<td>Precio</td>
				<td>Foto</td>
				<td>Modificar</td>
				<td>Borrar</td>
			</tr>";
		foreach ($arrayDeProductos as $item) 
		{
			echo "<tr>
					<td>$item->nombre</td>
					<td>$item->precio</td>
					<td><img style='width:100px;height:100px;' src='imagenes/$item->foto'/></td>";

			if($miUsuario->tipo == 'admin')
			{
				echo "<td><input type='button' value='Modificar' onclick='TraerParaModificarProducto(".$item->id.")'/></td>";
				echo "<td><input type='button' value='Borrar' onclick='BorrarProducto(".$item->id.")'/></td>";
			}
		  	echo "</tr>";
		}
		echo "</table>";
	}else{
		echo "Debe logearse primero!";
	}
?>