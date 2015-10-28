<?php 

require_once "./clases/claseUsuario.php";

Usuario::BorrarUsuario($_POST['id']);

setcookie("cookieMail","",time()-3600);
setcookie("cookieClave","",time()-3600);

echo "usuario Borrado!";

?>