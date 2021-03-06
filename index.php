<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- disable iPhone inital scale -->
<meta name="viewport" content=" initial-scale=1.0">

<title>UTN FRA</title>

<!-- main css -->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/media-queries.css" rel="stylesheet" type="text/css">
<link href="css/ingreso.css" rel="stylesheet">

<!-- media queries css -->
 <link rel="stylesheet" href="bower_components/bootstrap-css/css/bootstrap.min.css">
 <script src="bower_components/jquery/dist/jquery.min.js"></script>

 <link rel="icon" href="http://www.octavio.com.ar/favicon.ico">
<script type="text/javascript" src="js/funcionesAjax.js"></script>
<script type="text/javascript" src="js/funcionesLogin.js"></script>
<script type="text/javascript" src="js/funcionesABM.js"></script>
<script type="text/javascript" src="js/funcionesMapa.js"></script>
<script type="text/javascript" src="js/geolocalizacionCommon.js"></script>
<script type="text/javascript" src="js/moduloGeolocalizacion.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/data.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
</head>

<body background="body-background.png">

<div id="pagewrap">

	<header id="header">

		<hgroup>
			<h1 id="site-logo"><a href="#">Trabajo Práctico PIZZERÍA</a></h1>
			<h2 id="site-description">Lab 4B 2015</h2>
		</hgroup>

		<nav>
			<ul id="main-nav" class="clearfix">
				<li><a onclick="IrHacia('Ingreso')" class="btn">Ingreso</a></li>
				<li><a onclick="IrHacia('DarDeAlta')" class="btn">Alta de usuarios</a></li>
				<li><a onclick="IrHacia('Grilla')" class="btn">Listado de usuarios</a> </li>
				<li><a onclick="IrHacia('RegistrarProducto')" class="btn">Registrar producto</a> </li>
				<li><a onclick="IrHacia('GrillaProductos')" class="btn">Listado de Productos</a> </li>
				<li><a onclick="IrHacia('Venta')" class="btn">Registrar venta</a> </li>
				<li><a onclick="IrHacia('GrillaVentas')" class="btn">Listado de Ventas</a> </li>
				<li><a onclick="IrHacia('RSS')" class="btn">RSS</a> </li>
			</ul>
			<!-- /#main-nav --> 
		</nav>

		<form id="searchform">
			
		</form>

	</header>
	<!-- /#header -->
	
	<div id="content" >

		<article  class="post clearfix">

			<header  >
				<h1 class="post-title"><a href="#">Sánchez Guillermo</a></h1>
				<p class="post-meta"><time class="post-date" datetime="2011-05-08" pubdate>2015</time> <em>en</em> <a href="#">UTN FRA</a></p>
			</header>
			<hr>
			<div id="principal">

<?php

?>
			</div>		

		</article>
		<!-- /.post -->

		

	</div>
	<!-- /#content --> 
	
	
	<aside id="sidebar">

		<div id="botonesABM">
				<!--contenido dinamico cargado por ajax-->
		</div>
		<!-- /.widget -->

		<section class="widget clearfix" >
			<h4 class="widgettitle">Logeado como:</h4>
				<div id="Contador">
				<!--contenido dinamico cargado por ajax-->
				<?php
				session_start();
				if(isset($_SESSION['loginMail']))
				{
					echo $_SESSION['loginMail'];
				}
				?>
				</div>
			
		</section>
		<!-- /.widget -->

		<section class="widget clearfix" >
			<div id="RSSs">
					<?php /*
					$rss = simplexml_load_file('http://www.clarin.com/rss/lo-ultimo/');

					echo "<a href='".$rss->channel->link."'><img src='".$rss->channel->image->url."'/></a></br></br>";
					
					foreach ($rss->channel->item as $item) {
						echo "<a href='".$item->link."'>$item->title</a></br>";
						echo $item->description."</br></br>";
					} */
					?>
			</div>
		</section>

		
						
	</aside>
	<!-- /#sidebar -->

	<footer id="footer">
	
		<p>templete by <a href="http://www.octavio.com.ar">Octavio Villegas</a></p>

	</footer>
	<!-- /#footer --> 
	
</div>
<!-- /#pagewrap -->

</body>
</html>