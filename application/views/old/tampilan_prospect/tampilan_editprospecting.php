<?php
foreach ($data_p->result() as $row) {
	$row->pId_prospect;
}
?>
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('prospecting/save_changeprospect').'/'.$row->pId_prospect?>">
					<div class="control-group">
						<label class="control-label">Prospect Name</label>
						<div class="controls">
						<input type="text" name="pros" id="pros" placeholder="Prospect Name" class="span1" value="<?php echo $pros; ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Company Name</label>
						<div class="controls">
						<input type="text" name="comp" id="comp" placeholder="Company Name" class="span1" value="<?php echo $comp; ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Phone Number</label>
						<div class="controls">
						<input type="text" name="phone" id="phone" placeholder="Phone Number" class="span1" value="<?php echo $phone; ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Infomation</label>
						<div class="controls">
							<textarea name="info" id="info" rows="10" cols="40"><?php echo $info; ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Date Meeting</label>
						<div class="controls">
							<div class="form-group">
                				<div class="input-group date">
                  					<div class="input-group-addon">
                   						<i class="fa fa-calendar"></i>
                   					</div>
                   					<input type="text" class="form-control pull-right" id="datepicker" name="meet" value="<?php echo $meet; ?>">
                 				 </div>	
               				</div>
               			</div>
               		</div>
     				
		        <button type="reset" class="btn btn-default">Reset</button>
		        <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
