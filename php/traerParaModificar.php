<?php

require_once "./clases/claseUsuario.php";

$unUsuario = Usuario::TraerUsuarioPorId($_POST['id']);

echo json_encode($unUsuario);

?>