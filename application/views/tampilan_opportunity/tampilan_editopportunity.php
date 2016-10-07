<script type="text/javascript">
function cekform()
	{
		var ch    = $("#ch").val();
		var vcycle = $("#vcycle").val();
		var	cycle  = $("#cycle").val();

		if(ch==1 && Cycle==vCycle)
		{
			alertify
	  		.alert("Why You Didn't Update Sales Cycle? ", function(){
	  		});
	        $('#Cycle').focus();
	        return false;
		}

		if(ch==2 && Cycle!=vCycle)
		{
			alertify
	  		.alert("You Can't Update Sales Cycle", function(){
	  		});
	        $('#Cycle').focus();
	        return false;
		}
	}
</script>


<?php
foreach($dataedit->result() as $row) {
		$row->pId_opportunity;
}
?>
<br>

<div class="box box-danger"> 
	<div class="box-body">
		<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('opportunity/save_change').'/'.$row->pId_opportunity?>" onsubmit="return cekform();">

							<div class="control-group">
								<label class="control-label">Do You Want To Update Sales Cycle ?</label> : &nbsp
										<select class="form-control input-sm" name="ch" id="ch" style="width: 18%;">
											<option value="1">YES</option>
											<option value="2">NO</option>
										</select>
							</div>
							<div class="control-group">
					    		<label class="control-label">Opportunity Name</label><br>
				    		  	<input type="text" class="form-control input-sm" name="oppor" id="oppor" value="<?php echo $oppor; ?>" style="width: 30%;">
				    		</div>
							<div class="control-group">
								<label class="control-label">Forecast Amount</label><br>
								<input type="text" class="form-control input-sm" name="esti" id="esti"	 value="<?php echo $esti; ?>" style="width: 30%;">
							</div>
							<div class="control-group">
									<label class="control-label">Forecast Start Running</label>
									
			                				<div class="input-group date" style ="width:30%;">
			                  					<div class="input-group-addon">
			                   						<i class="fa fa-calendar"></i>
			                   					</div>
			                   					<input type="text" class="form-control pull-right" id="datepicker" name="run" value="<?php echo $run; ?>">
			                 				 </div>					
			               	</div>
			               	<?php
			               		foreach ($datapelengkap->result() as $row) {
									$row->sProduct;
									$row->sService;
									$row->sStatus_opp;
			               		}
			               	?>
			               	<div class="control-group">
								<label class="control-label">Product Type</label>			
									<select class="form-control input-sm" name="prod" id="prod" style="width: 15%;">
										<option value="<?php echo $prod; ?>"><?php echo $row->sProduct?></option>
										<option value="1">Document</option>
										<option value="2">Package</option>
									</select>
							</div>
							<div class="control-group">
								<label class="control-label">Service Type</label>		
									<select class="form-control input-sm" name="serv" id="serv" style="width: 15%;">
										<option value="<?php echo $serv; ?>"><?php echo $row->sService;?></option>
										<option value="1">Logistic</option>
										<option value="2">Express</option>
										<option value="3">Trucking</option>
										<option value="4">Warehouse</option>
										<option value="5">International</option>
									</select>
							</div>
							<div class="control-group">
								<label class="control-label">Sales Cycle</label>			
									<select class="form-control input-sm" name="cycle" id="cycle" style="width: 15%;">
										<option value="<?php echo $cycle ?>"><?php echo $row->sStatus_opp; ?></option>
										<option value="1">Pre-Call Intelligence</option>
										<option value="2">Needs Assessment</option>
										<option value="3">Developing Actions</option>
										<option value="4">Obtaining Commitment</option>
										<option value="5">Account Development</option>>
									</select>
									<input type="text" name="vcycle" id="vcycle" value="<?php echo $cycle ?>" readonly hidden>
							</div>
							<div class="control-group">
									<label class="control-label">PIC</label>
										<select class="form-control input-sm" name="cont" id="cont" style="width: 15%;">
											<option value="<?php echo $cont; ?>"><?php echo $namecon; ?></option>
											<?php
												foreach ($datacon->result() as $row) {
											?>
													<option value="<?php echo $row->pId_contact; ?>"><?php echo $row->sName_contact; ?></option>		
											<?php } ?>
										</select>	
							</div>
							<br>
							<div class="control-group">
					    		<div class="box">
					    			  <div class="box-header box-success">
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
				                	<textarea class="form-control input-sm" placeholder="Place some text here" name="info" id="info" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $info; ?></textarea>
						    </div>
					        <div class="control-group">
								<label class="control-label">Competitor</label><br>
								<input type="text" class="form-control input-sm" name="compt" id="compt"  class="span1" value="<?php echo $compt; ?>" style="width: 30%;">
							</div><br>
					    	</div>
		     			<br><br>
				        <button type="reset" class="btn btn-default">Reset</button>
				        <button type="submit" class="btn btn-primary">Save Changes</button>
		</form>
	</div><!-- ./box-body -->
</div>