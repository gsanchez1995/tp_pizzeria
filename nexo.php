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
	case 'Deslogear':
		include 'php/deslogear.php';
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
	case 'TraerParaModificarUsuario':
		include 'php/traerParaModificarUsuario.php';
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
	case 'GrillaProductos':
		include 'partes/formGrillaProductos.php';
		break;
	case 'TraerParaModificarProducto':
		include 'php/traerParaModificarProducto.php';
		break;
	case 'FinalizarModificacionProducto':
		include 'partes/formModificarProducto.php';
		break;
	case 'BorrarProducto':
		include 'php/borrarProducto.php';
		break;
	case 'Venta':
		include 'partes/formRegistrarVenta.php';
		break;
	case 'RegistrarVenta':
		include 'php/registrarVenta.php';
		break;
	case 'GrillaVentas':
		include 'partes/formGrillaVentas.php';
		break;
	case 'VerEnMapa':
        include 'partes/formMapa.php';
		break;
	case 'Estadistica':
		include 'partes/formEstadistica.php';
		break;
	default:
		# code...
		break;
}



?>