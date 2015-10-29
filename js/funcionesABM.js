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

function TraerParaModificarUsuario(EstaEsLaId)
{
	FinalizarModificacionUsuario();

	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'TraerParaModificarUsuario',
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

function FinalizarModificacionUsuario()
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

function ModificarUsuario()
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

function BorrarUsuario(EstaEsLaId)
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

function TraerParaModificarProducto(EstaEsLaId)
{
	FinalizarModificacionProducto();

	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'TraerParaModificarProducto',
				id: EstaEsLaId
			}
		});

		funcionAjax.done(function(retorno)
		{
			var unProducto = JSON.parse(retorno);
			$("#txtNombre").val(unProducto.nombre);
			$('#txtPrecio').val(unProducto.precio);
			$('#laImagen').attr('src','imagenes/'+unProducto.foto);
			$('#hiddenId').val(unProducto.id);
		});
}

function FinalizarModificacionProducto()
{
	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'FinalizarModificacionProducto'
			}
		});

		funcionAjax.done(function(retorno)
		{
			$('#principal').html(retorno);
		});
}

function BorrarProducto(EstaEsLaId)
{
	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'BorrarProducto',
				id: EstaEsLaId
			}
		});

		funcionAjax.done(function(retorno)
		{
			$('#principal').html(retorno);
		});
}