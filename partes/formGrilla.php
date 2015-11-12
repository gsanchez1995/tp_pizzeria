<?php 
	session_start();
	
	require_once "./clases/claseUsuario.php";
	require_once "./clases/claseValidadora.php";
	
	if(Validadora::ValidarSesionIniciada())
	{
		$arrayDeUsuarios = Usuario::TraerTodosLosUsuarios();
		$miUsuario = Usuario::TraerUsuarioPorMail($_SESSION['loginMail']);

		echo "<table class='table' style='background-color: beige;'>
			<thead>
				<tr>
					<th>NOMBRE</th>
					<th>MAIL</th>
					<th>TIPO</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>";
		foreach ($arrayDeUsuarios as $item) 
		{
			echo "<tr>
					<td>$item->nombre</td>
					<td>$item->mail</td>
					<td>$item->tipo</td>";

			if($miUsuario->tipo == 'admin')
			{
				echo "<td><a onclick='TraerParaModificarUsuario(".$item->id.")' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'>&nbsp;</span>Modificar</a></td>";
				echo "<td><a onclick='BorrarUsuario(".$item->id.")' class='btn btn-danger'><span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>";
			}else{
				if($miUsuario->id == $item->id)
				{
					echo "<td><a onclick='TraerParaModificarUsuario(".$item->id.")' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'>&nbsp;</span>Modificar</a></td>";
					echo "<td><a onclick='BorrarUsuario(".$item->id.")' class='btn btn-danger'><span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>";
				}else{
					echo "<td></td>";
					echo "<td></td>";
				}
			}
		  	echo "</tr>";
		}
		echo "</tbody></table>";
		echo "</br>Si está logeado como admin va a poder modificar o borrar a todos. Si está como user no va a ver contraseñas y solo puede modificarse o borrarse a sí mismo.";
	}else
	{
		echo "Debe logearse primero!";
	}
?>