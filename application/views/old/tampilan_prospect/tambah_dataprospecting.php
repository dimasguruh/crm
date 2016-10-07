<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('prospecting/save')?>" onsubmit="return cekform();">
	<div class="control-group">
		<label class="control-label">Prospect Name</label>
		<div class="controls">
		<input type="text" name="nik" id="nik" placeholder="Prospect Name" class="span1">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Company Name</label>
		<div class="controls">
		<input type="text" name="name" id="name" placeholder="Company Name" class="span1">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Phone Number</label>
		<div class="controls">
		<input type="text" name="phone" id="phone" placeholder="Phone Number" class="span1">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Infomation</label>
		<div class="controls">
			<textarea name="message" rows="10" cols="40"></textarea>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Date Meeting</label>
		<div class="controls">
		<input type="password" name="pwd" id="pwd" placeholder="Password" class="span1">
		</div>
	<div class="box-footer">
        <button type="reset" class="btn btn-default">Reset</button>
        <button id="btn" class="btn btn-info pull-right">Simpan</button>
	</div>
</form>

<?php
          $info=$this->session->flashdata('info');
          if(!empty($info))
          {
            echo $info;
          }
?>