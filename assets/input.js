$(document).ready(function()
{
	$("#btn").on("click",function()
	{
		var nPros  = $("#pros").val();
		var nComp  = $("#comp").val();
		var nPhone = $("#phone").val();
		var nInfo  = $("#info").val();
		var nDat   = $("#datepicker").val();

		$.ajax({
			url 		: "Prospecting/save",
			data		: {pros:nPros,comp:nComp,phone:nPhone,info:nInfo},
			type		: "POST",
			success		: function(data)

		});
	});

});