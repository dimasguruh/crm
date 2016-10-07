<script type="text/javascript">
	function cekform()
	{

	var ch    = $("#ch").val();
	var vtype = $("#vtype").val();
	var	type  = $("#type").val();
    var jci   = $("#jci").val();
    var vjci  = $("#vjci").val();

	    if (ch==1)
	    {
	    	if(type==1 && jci != vjci || !jci)
		    {
		    	alertify
		  		.alert("Wrong JNE Customer Id", function(){
		  		});
		        $('#jci').focus();
		        return false;
		    }

		    if(type==2 && jci == vjci || !jci)
		    {
		    	alertify
		  		.alert("Fill JNE Customer Id corretly!", function(){
		  		});
		        $('#jci').focus();	
		        return false;
		    }

		    if(type==3 && jci == vjci || !jci)
		    {
		    	alertify
		  		.alert("Fill JNE Customer Id corretly!", function(){
		  		});
		        $('#jci').focus();
		        return false;
		    }
		}
		else
		{
			if(type!= vtype)
		    {
		    	alertify
		  		.alert("You can't change Type Selling!", function(){
		  		});
		        $('#jci').focus();
		        return false;
		    }
		}
	}

</script>

<?php
foreach($dataupdate->result() as $row) {
		$row->pId_customer;
}
?>
<br>

<div class="box box-danger"> 
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('customer/save_change').'/'.$row->pId_customer?>" onsubmit="return cekform();">
		<?php
		foreach ($datapelengkap->result() as $row) {
			$row->iStatus;
			$row->sStatus;
			$row->iKnow_jne;
			$row->sKnow;
		}
		?>

		<div class="control-group">
			<label class="control-label">Do You Want To Change Type Selling?</label> : &nbsp
					<select name="ch" id="ch" style="width: 18%;">
						<option value="1">YES</option>
						<option value="2">NO</option>
					</select>
			<input type="text" name="vtype" id="vtype" value="<?php echo $row->iStatus?>" readonly hidden>
		</div>
		<br><br>
		<div class="control-group">
			<label class="control-label">Type Selling</label> : &nbsp
					<select name="type" id="type" style="width: 18%;">
						<option value="<?php echo $row->iStatus?>"><?php echo $row->sStatus;?></option>
						<option value="1">NEW BUSINESS</option>
						<option value="2">UPSELLING</option>
						<option value="3">CROSSSELLING</option>
					</select>
		</div>
		<div class="control-group">
    		<label class="control-label">Company Name</label><br>
		  	<input type="text" name="comp" id="comp" class="span1" value="<?php echo $comp; ?>" style="width: 30%;">
		</div>	
		<div class="control-group">
			<label class="control-label">Company Address</label><br>
				<input type="text" name="address" id="address"  class="span1" value="<?php echo $address; ?>" style="width: 30%;">			
		</div>
		<div class="control-group">
			<label class="control-label">Industry</label><br>
			<input type="text" name="ind" id="ind"  class="span1" value="<?php echo $ind; ?>" style="width: 30%;">
		</div>
		<div class="control-group">
			<label class="control-label">Phone Number</label><br>
			<input type="text" name="phone" id="phone"  class="span1" value="<?php echo $phone; ?>" style="width: 30%;">
		</div>
		<div class="control-group">
			<label class="control-label">Notes</label><br>
				<textarea name="notes" rows="10" cols="40" style="width: 30%;"><?php echo $notes; ?></textarea>
		</div>
		<div class="control-group">
			<label class="control-label">JNE Customer ID</label><br>
				<input type="text" name="jci" id="jci" class="span1" value="<?php echo $jci; ?>" style="width: 30%;">
				<input type="text" id="vjci" value="<?php echo $jci;?>" readonly hidden>
		</div>
		<div class="control-group">
			<label class="control-label">Know JNE From</label> : &nbsp
					<select name="know" id="know" style="width: 18%;">
						<option value="<?php echo $row->iKnow_jne;?>"><?php echo $row->sKnow;?></option>
						<option value="1">Forum</option>
						<option value="2">Blog</option>
						<option value="3">Video</option>
					</select>
		</div>
		<br><br>
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
	</form>
</div>