<?php 

switch ($_POST['queHacer']) {
	case 'DarDeAlta':
		include 'partes/formAlta.php';
		break;
	case 'GuardarAlta':
		include 'php/guardarAlta.php';
		break;
	case 'Ingreso':
		include 'partes/formIngreso.php';
		break;
	case 'VerificarIngreso':
		include 'php/verificarIngreso.php';
		break;
	case 'Recuperacion':
		include 'partes/formRecuperacion.php';
		break;
	case 'RecuperarClave':
		include 'php/recuperacion.php';
		break;
	case 'MiPerfil':
		include 'partes/formPerfil.php';
		break;
	case 'CambiarNombreDeUsuario':
		include 'php/cambiarNombreDeUsuario.php';
		break;
	case 'Grilla':
		include 'partes/formGrilla.php';
		break;
	case 'BorrarUsuario':
		include 'php/borrarUsuario.php';
		break;
	default:
		# code...
		break;
}



?>