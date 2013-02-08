//alert('plop');
jQuery().ready(function()
{
	$('#connect').click(function()
	{
		if($("#connection").is(":hidden") && $("#inscription").is(":hidden"))
			$("#connection").slideDown();
		else
			$("#connection").slideUp();
	});
	$('#inscript').click(function()
	{
		if($("#inscription").is(":hidden") && $("#connection").is(":hidden"))
			$("#inscription").slideDown();
		else
			$("#inscription").slideUp();
	});
});