<script type="text/javascript">

function cekform()
{
    var gender = $("#gender").val()
    if(gender == 0)
      {
        alertify
  		.alert("Fill The Gender!", function(){
  		});
        $('#gender').focus();
        return false;
      }

	if(!$('#nik').val().trim())
	  {
	    alertify
			.alert("Fill NIK!", function(){
			});
	    $('#nik').focus();
	    return false;
	  }
}
</script>

<div class="box box-danger">
	<div class="box-body"> 
		<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('sales/simpan')?>" onsubmit="return cekform();">
			<div class="control-group">
				<label class="control-label">NIK</label>
				<div class="controls">
				<input type="text" class="form-control input-sm" name="nik" id="nik" placeholder="NIK" style="width: 50%;">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Sales Name</label>
				<input type="text" name="name" id="name" placeholder="Sales Name" class="form-control input-sm" style="width: 50%;">
			</div>
			<div class="control-group">
				<label class="control-label">Gender</label>
				<select name="gender" id="gender" class="form-control input-sm" style="width: 50%;">
					<option value="0">-Select Gender-</option>
					<option value="1">Male</option>
					<option value="2">Female</option>
				</select>
			</div>	
			<div class="control-group">
				<label class="control-label">Phone Number</label>
				<input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control input-sm" style="width: 50%;">
			</div>
			<div class="control-group">
				<label class="control-label">Username</label>
				<input type="text" name="un" id="un" placeholder="Username" class="form-control input-sm" style="width: 50%;">
			</div>
			<div class="control-group">
				<label class="control-label">Password</label>
				<input type="password" name="pwd" id="pwd" placeholder="Password" class="form-control input-sm" style="width: 50%;">
			</div>
			<div class="control-group">
				<label class="control-label">Images</label>
				<div class="controls">
				<input type="file" name="userfile" size="30"/>
				<br /><br />
				Max Size 100kb
				</div>	
			</div>
			<div class="box-footer">
		        <button type="reset" class="btn btn-default">Reset</button>
		        <button type="submit" class="btn btn-info pull-right">Simpan</button>
			</div>
		</form>
	</div>
</div>

        <?php
          $info=$this->session->flashdata('info');
          if(!empty($info))
          {
            echo $info;
          }
        ?>