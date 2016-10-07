<center>
<fieldset style='width:330px;'>
<legend><b>Reschedule</b></legend>
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('meeting/t_update').'/'.$datasche;?>">
		<div class="control-group">
				<label class="control-label">Reschedule Date Meeting</label>
			<div class="controls">
				<div class="form-group">
					<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
								<input type="text" id="datepicker4" name="meet_resche">
							</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="control-group">
				<label class="control-label">Location</label>
				<div class="controls">
				<input type="text" name="location_resche" id="location" placeholder="Location" class="span1">
				</div>
		</div>
		<div class="control-group">
				<div class="control-group">
					<div class="box">
				        <div class="box-header">
				            <h3 class="box-title">Notes
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
		                	<textarea class="textarea" placeholder="Place some text here" name="notes_resche" id="notes" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
				        </div>
				    </div>
				</div>
		</div>
		<div class="control-group">
		<input type="submit" class="btn btn-primary" name="mit" id="mit" value="SUBMIT">
		</div>
	</form>		
</fieldset>
</center>
<br>
<script type="text/javascript">
   $('#datepicker4').datepicker({
      autoclose: true,
      format:'yyyy/mm/dd'
    });
</script>

<script type="text/javascript">
	$("#mit").click(function(){
		var scheid		 = $("#scheid").val();
		var subject 	 = $("#subject").val();
		var start 		 = $("#start").val();
		var end 		 = $("#end").val();
		var location 	 = $("#location").val();
		var notes  		 = $("#notes").val();
		var person 		 = $("#person").val();
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url(); ?>meeting/reschedule",
			data : {scheidj:scheid,subjectj:subject,startj:start,endj:end,locationj:location,notesj:notes,personj:person},
			datatype : "json",
			success : function(data){
				document.write("Data saved");
			}

		})
	})
</script>