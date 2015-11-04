function VerificarIngreso()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'VerificarIngreso',
			mail: $('#txtMail').val(),
			clave: $('#txtClave').val(),
			recordar: $("#checkRecordar").is(':checked')
		}
	});

	funcionAjax.done(function(retorno)
	{
		if(retorno == 'no existe usuario con ese mail y clave')
		{
			$('#principal').html(retorno);
			$('#Contador').html("");
		}else
		{
			$('#principal').html("Usuario Logeado!");
			$('#Contador').html("");
			$('#Contador').html(retorno);
		}
	});
}

function Deslogear()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'Deslogear'
		}
	});

	funcionAjax.done(function(retorno)
	{
			$('#principal').html(retorno);
			$('#Contador').html("");
	});
}

function RecuperarClave()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'RecuperarClave',
			mail: document.getElementById('txtMail').value
		}
	});

	funcionAjax.done(function(retorno)
	{
			$('#principal').html(retorno);
	});
}