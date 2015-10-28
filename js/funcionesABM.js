function GuardarAlta()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'GuardarAlta',
			nombre: $('#txtNombre').val(),
			mail: $('#txtMail').val(),
			clave: $('#txtClave').val(),
			tipo: $('#selectTipo').val()
			}
	});

	funcionAjax.done(function(retorno)
	{
		$('#principal').html(retorno);
	});
}

function TraerParaModificar(EstaEsLaId)
{
	FinalizarModificacion();

	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'TraerParaModificar',
				id: EstaEsLaId
			}
		});

		funcionAjax.done(function(retorno)
		{
			var unUsuario = JSON.parse(retorno);
			$("#txtNombre").val(unUsuario.nombre);
			$('#txtMail').val(unUsuario.mail);
			$('#txtClave').val(unUsuario.clave);
			$('#hiddenId').val(unUsuario.id);
		});
}

function FinalizarModificacion()
{
	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'FinalizarModificacion',
			}
		});

		funcionAjax.done(function(retorno)
		{
			$('#principal').html(retorno);
		});
}

function Modificar()
{
	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'ModificarUsuario',
				id: $('#hiddenId').val(),
				nombre: $('#txtNombre').val(),
				mail: $('#txtMail').val(),
				clave: $('#txtClave').val()
			}
		});

		funcionAjax.done(function(retorno)
		{
			$('#principal').html(retorno);
		});
}

function Borrar(EstaEsLaId)
{
	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'BorrarUsuario',
				id: EstaEsLaId
			}
		});

		funcionAjax.done(function(retorno)
		{
			$('#principal').html(retorno);
		});
}

function RegistrarProducto()
{
	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'RegistrarProducto'
			}
		});

		funcionAjax.done(function(retorno)
		{
			$('#principal').html(retorno);
		});
}

function FinalizarRegistroDeProducto()
{
	alert("JAJAAJAJ");
}
