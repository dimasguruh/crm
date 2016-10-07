<section class="content"> 
	<div class="box box-danger"> 
		<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('contact/save_change').'/'.$idcon; ?>">
			<div class="control-group">
	    		<label class="control-label">Contact Name</label><br>
    		  	<input type="text" name="contact" id="contact" class="span1" value="<?php echo $contact; ?>" style="width: 24.3%;">
    		</div>	
    		<div class="control-group">
				<label class="control-label">Gender</label> : &nbsp
						<select name="gen" id="gen" style="width: 18%;">
							<option value="<?php echo $igen;?>"><?php echo $sgen;?></option>
							<option value="1">Male</option>
							<option value="2">Female</option>
						</select>
			</div>
			<div class="control-group">
				<label class="control-label">Position</label> : &nbsp
						<select name="pos" id="pos" style="width: 18%;">
							<option value="<?php echo $ipos;?>"><?php echo $spos;?></option>
							<option value="1">Direktur</option>
							<option value="2">General Manager</option>
							<option value="3">Manager</option>
							<option value="4">Secretary</option>
							<option value="5">Staff</option>
						</select>
			</div>
			<div class="control-group">
				<label class="control-label">Phone Number</label><br>
				<input type="text" name="phone" id="phone"  class="span1" value="<?php echo $phone; ?>" style="width: 30%;">
			</div>
			<div class="control-group">
				<label class="control-label">Phone Number 2</label><br>
				<input type="text" name="phone2" id="phone2" class="span1" value="<?php echo $phone2; ?>" style="width: 30%;">
			</div>
			<div class="control-group">
				<label class="control-label">Phone Number/BBM PIN</label><br>
				<input type="text" name="phone3" id="phone3" class="span1" value="<?php echo $phone3; ?>" style="width: 30%;">
			</div>
			<div class="control-group">
				<label class="control-label">Email</label><br>
				<input type="text" name="email" id="email" class="span1" value="<?php echo $email; ?>" style="width: 30%;">
			</div>
			
			<br><br>
	        <button type="reset" class="btn btn-default">Reset</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
		</form>
	</div>
</section>