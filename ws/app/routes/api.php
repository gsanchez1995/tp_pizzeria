<?php
if(!defined("SPECIALCONSTANT")) die("Acceso denegado");
// var_dump($app);

// GET: Para consultar y leer recursos
// POST: Para crear recursos
// PUT: Para editar recursos
// DELETE: Para eliminar recursos

// GET: Para consultar y leer recursos

$app->get("/usuarios/", function() use($app)
{
	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('call TraerTodosLosUsuarios()');
	
	$sentencia->execute();
	$res = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($res));
});

$app->get("/usuarios/:id", function($id) use($app)
{
	try{
		$cnn = Conexion::DameAcceso();
		$sentencia = $cnn->prepare('call TraerUsuarioPorId(?)');
		
		$sentencia->execute(array($id));
		$res = $sentencia->fetchAll(PDO::FETCH_OBJ);

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode($res));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->get("/productos/", function() use($app)
{
	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('call TraerTodosLosProductos()');
	
	$sentencia->execute();
	$res = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($res));
});

$app->get("/productos/:id", function($id) use($app)
{
	try{
		$cnn = Conexion::DameAcceso();
		$sentencia = $cnn->prepare('call TraerProductoPorId(?)');
		
		$sentencia->execute(array($id));
		$res = $sentencia->fetchAll(PDO::FETCH_OBJ);

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode($res));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->get("/ventas/", function() use($app)
{
	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('call TraerTodasLasVentas()');
	
	$sentencia->execute();
	$res = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($res));
});
























// POST: Para crear recursos
$app->post("/personas/", function() use($app)
{
	$nombre = $app->request->post("nombre");
	$dni = $app->request->post("dni");
	$apellido = $app->request->post("apellido");
	$foto = "pordefecto.png";//$app->request->post("foto");

	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('CALL InsertarPersona (?,?,?,?)');
	
	
	$status = 200;
	if ($sentencia->execute(array($nombre, $apellido, $dni, $foto)))
		$res = array("rta" => true);	
	else{
		$res = array("rta" => false);
		$status = 500;
	}
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status($status);
	$app->response->body(json_encode(json_encode($res)));
});


// PUT: Para editar recursos
$app->put("/personas/", function() use($app)
{
	$nombre = $app->request->put("nombre");
	$id = $app->request->put("id");
	$apellido = $app->request->put("apellido");
	$foto = $app->request->put("foto");

	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('CALL ModificarPersona(?,?,?,?)');
	$status = 200;
	if ($sentencia->execute(array($id, $nombre, $apellido, $foto)))
		$res = array("rta" => true);	
	else{
		$res = array("rta" => false);
		$status = 500;
	}
		
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status($status);
	$app->response->body(json_encode($res));
});
// DELETE: Para eliminar recursos
$app->delete("/personas/:id", function($id) use($app)
{
	try{
		$cnn = Conexion::DameAcceso();
		$sentencia = $cnn->prepare('CALL BorrarPersona(?)');
		
		$sentencia->execute(array($id));

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("res" => 111)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});