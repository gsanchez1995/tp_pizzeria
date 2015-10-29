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