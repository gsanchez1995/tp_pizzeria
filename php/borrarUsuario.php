<?php 

require_once "./clases/claseUsuario.php";

Usuario::BorrarUsuario($_POST['id']);

echo "usuario Borrado!";

?>