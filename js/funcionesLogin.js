function VerificarIngreso()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'VerificarIngreso',
			mail: document.getElementById('txtMail').value,
			clave: document.getElementById('txtClave').value
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
			$('#Contador').html(retorno);
		}
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