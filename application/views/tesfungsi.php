

<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>


<select name="con" id="con">
	<option value='0'>1</option>
	<option value='1'>2</option>
</select>

<div id="tampil">

</div>
<script type="text/javascript">
$(document).ready(function()
{
	$("#con").on("change" ,function(){
		var pilihan = $("#con").val();

		$.ajax({
			url  :"../../ajaxfile/loaddata.php"
			type : "POST",
			data : pilihan,
			success : function(data){
				$("#tampil").html(data)
			}
		})
	})
})
</script>