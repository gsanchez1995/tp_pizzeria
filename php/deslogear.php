<?php 
session_start();

	$_SESSION['registrado']=null;

	echo "usted ha sido deslogeado";

session_destroy();
 ?>