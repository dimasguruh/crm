<?php
foreach($dataedit->result() as $row) {
		$row->pId_schedule;
}
?>
<br>
<div class="box box-danger"> 
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('schedule/save_change').'/'.$row->pId_schedule; ?>">
				<div class="control-group">
		    		<label class="control-label">Subject</label><br>
		    		<input type="text" name="subject" id="subject" placeholder="Subject" class="span1" value="<?php echo $subject ;?>" style="width: 30%;">
	    		</div>
				<div class="control-group">
						<label class="control-label">Location</label><br>
						<input type="text" name="location" id="location" placeholder="Location" class="span1" value="<?php echo $location;?>" style="width: 30%;">			
				</div>
				<div class="control-group">
						<label class="control-label">Date Meeting</label>
        				<div class="input-group date" style ="width:30%;">
          					<div class="input-group-addon">
           						<i class="fa fa-calendar"></i>
           					</div>
           					<input type="text" class="form-control pull-right" id="datepicker" name="meet" value="<?php echo $meet;?>">
         				</div>	
               	</div> <br>
               	<div class="control-group">
						<div class="control-group">
						<div class="box">
					        <div class="box-header">
					            <h3 class="box-title">Information
					                <small></small>
					            </h3>
					              <!-- tools box -->
					            <div class="pull-right box-tools">
					                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					                  <i class="fa fa-minus"></i></button>
					                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
					                  <i class="fa fa-times"></i></button>
					        </div>
					              <!-- /. tools -->
					            </div>
					            <!-- /.box-header -->
					        <div class="box-body pad">
			                	<textarea class="textarea" placeholder="Place some text here" name="noted" id="noted" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $noted ;?></textarea>
					        </div>
					    </div>
					</div>
				</div>
 			<br>
	        <button type="reset" class="btn btn-default">Reset</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	</form>
</div>