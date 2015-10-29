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
				<td>Tipo</td>
				<td>Modificar</td>
				<td>Borrar</td>
			</tr>";
		foreach ($arrayDeUsuarios as $item) 
		{
			echo "<tr>
					<td>$item->nombre</td>
					<td>$item->mail</td>";
					if($miUsuario->tipo == 'admin')
					{
						echo "<td>$item->clave</td>";
					}else{
						echo "<td>**********</td>";
					}
					echo "<td>$item->tipo</td>";

			if($miUsuario->tipo == 'admin')
			{
				echo "<td><input type='button' value='Modificar' onclick='TraerParaModificarUsuario(".$item->id.")'/></td>";
				echo "<td><input type='button' value='Borrar' onclick='BorrarUsuario(".$item->id.")'/></td>";
			}else{
				if($miUsuario->id == $item->id)
				{
					echo "<td><input type='button' value='Modificar' onclick='TraerParaModificarUsuario(".$item->id.")'/></td>";
					echo "<td><input type='button' value='Borrar' onclick='BorrarUsuario(".$item->id.")'/></td>";
				}else{
					echo "<td></td>";
					echo "<td></td>";
				}
			}
		  	echo "</tr>";
		}
		echo "</table>";
		echo "</br>Si está logeado como admin va a ver las contraseñas y va a poder modificar o borrar a todos. Si está como user no va a ver contraseñas y solo puede modificarse o borrarse a sí mismo.";
	}else
	{
		echo "Debe logearse primero!";
	}
?>