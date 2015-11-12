<script type="text/javascript">
$(function () {
	    $('#container').highcharts({
	        data: {
	            table: 'datatable'
	        },
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: 'precio por producto'
	        },
	        yAxis: {
	            allowDecimals: false,
	            title: {
	                text: 'precio'
	            }
	        },
	        tooltip: {
	            formatter: function () {
	                return '<b>' + this.series.name + '</b><br/>' +
	                    this.point.y + ' ' + this.point.name.toLowerCase();
	            }
	        }
	    });
	});
</script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<?php 
	session_start();

	require_once "./clases/claseProducto.php";
	require_once "./clases/claseUsuario.php";
	require_once "./clases/claseValidadora.php";
	
	if(Validadora::ValidarSesionIniciada())
	{
		$arrayDeProductos = Producto::TraerTodosLosProductos();

		echo "<table id='datatable' border='1'>
			<thead><tr>
				<th>Nombre</th>
				<th>Precio</th>
			</tr></thead><tbody>";
		foreach ($arrayDeProductos as $item) 
		{
			echo "<tr>
					<td>$item->nombre</td>
					<td>$item->precio</td>";
		  	echo "</tr>";
		}
		echo "</tbody></table>";
		echo "<input type='button' onclick='Estadistica()' value='Estadistica'/>";
	}else{
		echo "Debe logearse primero!";
	}
?>