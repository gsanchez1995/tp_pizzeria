function IrHacia(DondeVoy)
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: DondeVoy
		}
	});

	funcionAjax.done(function(retorno)
	{
		$('#principal').html(retorno);
	});
}

function Recuperacion()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'Recuperacion'
		}
	});

	funcionAjax.done(function(retorno)
	{
		$('#principal').html(retorno);
	});
}