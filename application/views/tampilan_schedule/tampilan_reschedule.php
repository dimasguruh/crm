<div class="box box-danger"> 
	<form class="form-horizontal" method="POST" action="<?php echo base_url('Schedule/reschedule').'/'.$key;?>">
	    <br>    
	        <div class="control-group">
				<label class="control-label">Next Date Meeting</label>
				<div class="input-group date" style ="width:30%;">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control pull-right" id="datepicker" name="dresche">
					</div>					
	       </div><br>
	       <div class="control-group">
				<div class="box">
			        <div class="box-header">
			            <h3 class="box-title">Reschedule Reason
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
	                	<textarea class="textarea" name="rrsche" id="rrsche" placeholder="Write Here"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>   
			        </div>
			    </div>
			</div>
			<button type="reset" class="btn btn-default">Reset</button>
			<button type="submit" id="bmorecon" class="btn btn-primary">Save</button>
	</form>
</div>