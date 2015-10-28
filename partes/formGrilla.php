<?php 
	require_once "./clases/claseUsuario.php";
	
	if(isset($_COOKIE['cookieMail']) && isset($_COOKIE['cookieClave']))
	{
		$arrayDeUsuarios = Usuario::TraerTodosLosUsuarios();
		$miUsuario = Usuario::TraerUsuarioPorMailYClave($_COOKIE['cookieMail'],$_COOKIE['cookieClave']);

		echo "<table border='1'>
			<tr>
				<td>Nombre</td>
				<td>Mail</td>
				<td>Clave</td>
				<td>Tipo</td>";
		if($miUsuario->tipo == 'admin')
		{
			echo "<td>Borrar</td>";
		}
		echo "</tr>";
		foreach ($arrayDeUsuarios as $item) 
		{
			echo "<tr>
					<td>$item->nombre</td>
					<td>$item->mail</td>
					<td>$item->clave</td>
					<td>$item->tipo</td>";

			if($miUsuario->tipo == 'admin')
			{
				echo "<td><input type='button' value='Borrar' onclick='Borrar(".$item->id.")'/></td>";
			}
		  	echo "</tr>";
		}
		echo "</table>";
	}else
	{
		echo "Debe logearse primero!";
	}
?>