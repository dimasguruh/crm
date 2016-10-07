<script type="text/javascript">
function cekform()
{
	if(!$('#person').val())
	{
	   alertify
	  .alert("Fill Person You Meeting With!", function(){
	});
	    $('#person').focus();
	    return false;
	}
}
</script>

<br>

<div class="box box-danger"> 
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="#" onsubmit="return cekform();">

		<div class="control-group">
    		<label class="control-label">Meeting Subject</label><br>
		  	<input type="text" name="comp" id="comp" class="span1" value="<?php echo $subject; ?>" style="width: 50%;">
		</div>
		<div class="control-group">
	        <label class="control-label" for="meeting">Meeting With</label><br>
	          <select class="form-control select2" multiple="multiple" name="person[]" id="person" data-placeholder="Select Contact" style="width: 50%;">
	          <?php
	            foreach ($datacon->result() as $row) {
	          ?>    
	          <?php
	          	if($row->pId_contact == $idc)
	          	{
	          ?>
	          		<option value="<?php echo $idc ?>"><?php echo $nc?></option>
	          <?php
	      		}
	          ?>
	            <option value ="<?php echo $row->pId_contact;?>"><?php echo $row->sName_contact;?></option>
	          <?php } ?>		         
	          ?>
	          </select>
	          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal"> Add More Contact
	    </div>
		<div class="control-group">
			<div class="bootstrap-timepicker">            
				<label class="control-label">Start At</label>
				<div class="input-group date">
					<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
					</div>
					<input type="text" class= "timepicker" name="start" id="start" value="<?php echo $start; ?>">
				</div>	
			</div>
  		</div>
  		<div class="control-group">
    		<div class="bootstrap-timepicker">            
        		<label class="control-label">End At</label>
          		<div class="input-group date">
              		<div class="input-group-addon">
                		<i class="fa fa-calendar"></i>
              		</div>
              		<input type="text" class="timepicker2" class="end" name="end" id="end" value="<?php echo $end; ?>">
              	</div>
          	</div>  
    	</div>
		<div class="control-group"><br>
	<div class="box">
		<div class="box-header">
            <h3 class="box-title">Notes
                <small>Tell Evrything You Know</small>
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
            	<textarea class="textarea" placeholder="Place some text here" name="notes" id="notes" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $notes; ?></textarea>
	        </div>
		</div>
	</div>      
		<br><br>
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
	</form>
</div>