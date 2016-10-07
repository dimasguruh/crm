<script type="text/javascript">

function cekform()
{
    if(!$('#oppor').val().trim())
    {
        alertify
  		.alert("Fill The Opportunity Name!", function(){
  		});
        $('#oppor').focus();
        return false;
    }

    if(!$('#esti').val().trim())
    {
        alertify
  		.alert("Fill The Estimation Value!", function(){
  		});
        $('#esti').focus();
        return false;
    }

    if(!$('#info').val())
    {
        alertify
  		.alert("Fill The Information!", function(){
  		});
        $('#info').focus();
        return false;
    }


    if(!$('#datepicker').val().trim())
    {
        alertify
  		.alert("Fill The Estimation Date Transaction!", function(){
  		});
        $('#datepicker').focus();
        return false;
    }

    var stat = $("#stat").val()
    if(stat == 0)
    {
        alertify
  		.alert("Fill The Opportunity Status", function(){
  		});
        $('#stat').focus();
        return false;
    }

    var pic = $("#cont").val()
    if(pic == 0)
    {
        alertify
  		.alert("Fill The PIC Of This Opportunity", function(){
  		});
        $('#cont').focus();
        return false;
    }
}

</script>



<br><br>
<div class="box box-success">
	<div class="box-header">
		<div class="box-title">
			<h2>Table Opportunity</h2><i>List Opportunity of <?php echo $op; ?></i>
		</div>
	</div>
	<div class="box-body">
		<table class="table table-bordered nowrap" id="tblData">
			<thead>
				<tr>
					<th>Number</th>
					<th>Opportunity Name</th>
					<th>PIC</th>
					<th>Service Type</th>
					<th>Product Type</th>
					<th>Forecast Amount</th>
					<th>Sales Cycle</th>
					<th>Forecast Start Running</th>
					<th>Information</th>
					<th>Competitor</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				'<tr>';
				$no=1;
					foreach ($datapros->result() as $row) {		
				?>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->sOpportunity_name; ?></td>
					<td><a href="<?php echo base_url('contact/show').'/'.$row->iId_customer; ?>"><?php echo $row->sName_contact; ?></a></td>
					<td><?php echo $row->sProduct ?></td>
					<td><?php echo $row->sService ?></td>
					<?php $m = uang($row->dForecast_amount);?>
					<td><?php echo $m;?></td>
					<td><?php echo $row->sStatus_opp; ?></td>
					<?php 
						$dm = $row->dForecast_running;
						$dme = date('d M Y',strtotime($dm)) 
					?>
					<td><?php echo $dme ?></td>
					<td><?php echo $row->sInformation; ?></td>
					<td><?php echo $row->sCompetitor; ?></td>
					<td><a href="<?php echo base_url('schedule/get_dataschedule').'/'.$row->pId_opportunity;?>">Schedule</a></td>
					<td><a href= "<?php echo base_url('opportunity/edit').'/'. $row->pId_opportunity;?>" class="btn btn-default">EDIT/UPDATE</a></td> 
				</tr>
					<?php } ?> 
			
			</tbody>
		</table>
	</div>
	<div class="box-footer"> 
		<p>
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal"> Add New Opportunity
		</button>
		</p>
	</div>
</div>
<?php 
	foreach ($datacus->result() as $row) {
		$row->pId_customer;
	}
?>


<!-- 		Modal Input Prospect			 -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add New Opportunity of <?php echo $row->sName_company; ?></h4> 
	      	</div>
			<div class="modal-body">       
					<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url()?>opportunity/save/<?php echo $row->pId_customer;?>" onsubmit="return cekform();">
						<div class="control-group">
							<label class="control-label">Opportunity Name</label>
							<div class="controls">
							<input type="text" name="oppor" id="oppor" placeholder="Opportunity Name" class="span1">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Forecast Amount</label>
							<div class="controls">
							<input type="text" name="esti" id="esti" placeholder="Estimation" class="span1">
							</div>
						</div><br>
						<div class="control-group">
							<label class="control-label">Forecast Start Running</label>
							<div class="controls">
								<div class="form-group">
	                				<div class="input-group date">
	                  					<div class="input-group-addon">
	                   						<i class="fa fa-calendar"></i>
	                   					</div>
	                   					<input type="text" class="form-control pull-right" id="datepicker" name="run">
	                 				 </div>	
	               				</div>
	               			</div>
	               		</div>
	               		<div class="control-group">
	               		<table>
	               		<tr>
	               		<td><label class="control-label">Product Type</label><td>
						<td><label class="control-label">Service Type</label><td>
						<td><label class="control-label">PIC</label></td>
						<td>&nbsp&nbsp&nbsp</td>
						<td><label class="control-label">Sales Cycle</label></td>
						</tr>
						<tr>
						<td>
							<select name="prod" id="prod">
								<option value="0">- Select Product -</option>
								<option value="1">Document</option>
								<option value="2">Package</option>
							</select>
						</td>
						<td>&nbsp&nbsp</td>
						<td>
							<select name="serv" id="serv">
								<option value="0">- Select Service -</option>
								<option value="1">Logistic</option>
								<option value="2">Express</option>
								<option value="3">Trucking</option>
								<option value="4">Warehouse</option>
								<option value="5">Intenational</option>
							</select>
						</td>
						<td>&nbsp&nbsp</td>
						<td>	
						<select name="cont" id="cont">
								<option value="0">-Select PIC-</option>
								<?php
								$no= 1;
									foreach ($datacon->result() as $row) {
								?>
										<option value="<?php echo $row->pId_contact; ?>"><?php echo $row->sName_contact; ?></option>		
								<?php } ?>
							</select>
						</td>
						<td>&nbsp&nbsp</td>
						<td>
							<select name="cycle" id="cycle">
								<option value="0">- Select Cycle -</option>
								<option value="1">Pre-Call Intelligence</option>
								<option value="2">Needs Assessment</option>
								<option value="3">Developing Actions</option>
								<option value="4">Obtaining Commitment</option>
								<option value="5">Account Development</option>
							</select>
						</td>
						</tr>
						</table>	
						</div><br>
						<div class="control-group">
							<div class="box">
						        <div class="box-header">
						            <h3 class="box-title">Information
						                <small>What DO you need to CLOSE the business in 30 DAYS</small>
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
				                	<textarea class="" name="info" id="info" placeholder="Write Here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>   
						        </div>
						    </div>
						</div>
						<div class="control-group">
							<label class="control-label">Competitor</label>
							<div class="controls">
							<input type="text" name="compt" id="compt" placeholder="Competitor Name" class="span1">
							</div>
						</div>
	        </div>					
	      	<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="reset" class="btn btn-default">Reset</button>
			        <button type="submit" id="btn" class="btn btn-primary">Save Opportunity</button>
			        </form>
	     	</div>

	    </div>
  	</div>
</div>
<!-- 		Modal Input Contact			 -->