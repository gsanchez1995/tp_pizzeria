function DarDeAlta()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'DarDeAlta'
		}
	});

	funcionAjax.done(function(retorno)
	{
		$('#principal').html(retorno);
	});
}

function Ingreso()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'Ingreso'
		}
	});

	funcionAjax.done(function(retorno)
	{
		$('#principal').html(retorno);
	});
}

function Grilla()
{
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		data: {
			queHacer: 'Grilla'
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
