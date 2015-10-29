<?php

require_once "./clases/claseProducto.php";

$unProducto = Producto::TraerProductoPorId($_POST['id']);

echo json_encode($unProducto);

?>