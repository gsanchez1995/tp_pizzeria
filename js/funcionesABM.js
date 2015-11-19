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
			$('#hiddenId').val(unUsuario.id);
			$('#hiddenMail').val(unUsuario.mail);
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
				hiddenMail: $('#hiddenMail').val(),
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

function ModificarUsuarioPorReseteo()
{
	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'ModificarUsuarioPorReseteo',
				id: $('#hiddenId').val(),
				clave: $('#txtClave').val()
			}
		});

		funcionAjax.done(function(retorno)
		{
			$('#principal').html(retorno);
			window.location.href = 'index.php';
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
			if(retorno == "con session")
			{
				$('#principal').html("Usuario borrado!!!");
			}else
			{
				$('#principal').html("Usuario borrado!!!");
				$('#Contador').html("");
			}
			
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

function RegistrarVenta()
{
	var cantidad = $("#hiddenPizzas").val();

	var ArrayNroPizzas = [];
	var ArrayIdPizzas = [];

	for (var i = 0; i < cantidad; i++) 
	{
		ArrayNroPizzas[i] = $("#txtPizza"+i).val();
		ArrayIdPizzas[i] = $("#idPizza"+i).val();
	};

	if($("#radioTipo1").is(':checked'))
	{
		var ElTipo = $("#radioTipo1").val();
	}else
	{
		var ElTipo = $("#radioTipo2").val();
	}

	var funcionAjax = $.ajax({
			url: 'nexo.php',
			type: 'post',
			data: {
				queHacer: 'RegistrarVenta',
				NroDePizzas: ArrayNroPizzas,
				IdDePizzas: ArrayIdPizzas,
				Provincia: $("#selectProvincia").val(),
				Localidad: $("#selectLocalidad").val(),
				Direccion: $("#txtDireccion").val(),
				Tipo: ElTipo,
				Promocion: $("#checkPromo").is(':checked')
			}
		});

		funcionAjax.done(function(retorno)
		{
			$('#principal').html(retorno);
		});
}

function cambiarSelectLocalidad()
	{
		if(document.getElementById('selectProvincia').value == "Buenos Aires")
		{
			var select = document.getElementById('selectLocalidad');
			select.options.length = 0;

			var opcion1 = document.createElement("option");
			opcion1.text = "Avellaneda";
			opcion1.value = "Avellaneda";
			select.add(opcion1);

			var opcion2 = document.createElement("option");
			opcion2.text = "Quilmes";
			opcion2.value = "Quilmes";
			select.add(opcion2);

			var opcion3 = document.createElement("option");
			opcion3.text = "Lanus";
			opcion3.value = "Lanus";
			select.add(opcion3);

		}else
		{
			var select = document.getElementById('selectLocalidad');
			select.options.length = 0;
			
			var opcion1 = document.createElement("option");
			opcion1.text = "Barracas";
			opcion1.value = "Barracas";
			select.add(opcion1);

			var opcion2 = document.createElement("option");
			opcion2.text = "La Boca";
			opcion2.value = "La Boca";
			select.add(opcion2);

			var opcion3 = document.createElement("option");
			opcion3.text = "Microcentro";
			opcion3.value = "Microcentro";
			select.add(opcion3);
		}
}