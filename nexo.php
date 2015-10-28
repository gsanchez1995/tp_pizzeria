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
	case 'Grilla':
		include 'partes/formGrilla.php';
		break;
	case 'TraerParaModificar':
		include 'php/traerParaModificar.php';
		break;
	case 'FinalizarModificacion':
		include 'partes/formModificar.php';
		break;
	case 'ModificarUsuario':
		include 'php/modificarUsuario.php';
		break;
	case 'BorrarUsuario':
		include 'php/borrarUsuario.php';
		break;
	case 'RegistrarProducto':
		include 'partes/formRegistrarProducto.php';
		break;
	default:
		# code...
		break;
}



?>