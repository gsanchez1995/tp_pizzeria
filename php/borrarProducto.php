<?php 

require_once "./clases/claseProducto.php";

$miProducto = Producto::TraerProductoPorId($_POST['id']);

unlink("imagenes/".$miProducto->foto);

Producto::BorrarProducto($_POST['id']);

echo "Producto Borrado!";

?>