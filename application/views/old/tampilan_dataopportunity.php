<script type="text/javascript">

function cekform()
{
	var compa = $("#comp").val()
    if(compa == 0)
      {
        alertify
  		.alert("Fill The Company!", function(){
  		});
        $('#comp').focus();
        return false;
      }

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
<table id="example1" class="footable table table-bordered table-striped" data-show-toggle="true" data-expand-first="false" data-paging="true" data-filtering="true">
	<thead>
		<tr>
			<th data-breakpoints="all" data-title="Number">Number</th>
			<th>Opportunity Name</th>
			<th>Company Name</th>
			<th>Information</th>
			<th>Estimation Value</th>
			<th>On Running</th>
			<th data-type="html">PIC</th>
			<th>Status</th>
			<th data-type="html"></th>
			<th data-type="html"></th>
			
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
			<td><?php echo $row->sName_company; ?></td>
			<td><?php echo $row->sInformation; ?></td>
			<td><?php echo $row->dForecast_amount; ?></td>
			<td><?php echo $row->dForecast_running; ?></td>
			<td><a href="<?php echo base_url('contact/show').'/'.$row->iId_customer; ?>"><?php echo $row->iContact; ?></a></td>
			<td><?php echo $row->sStatus_opp; ?></td>
			<td><a href= "<?php echo base_url('opportunity/edit').'/'. $row->pId_opportunity;?>">Edit</td>
			<td><a href= "<?php echo base_url('Schedule/get_dataschedule').'/'. $row->pId_opportunity;?>">Schedule</td>
		</tr>
			<?php } ?> 
	
	</tbody>
</table>

<!--<?php /* echo anchor('prospecting/add', 'Add New', 'class="btn btn-info pull-right" name="tamdat"'); */?>-->

<p>
<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal"> Add New Opportunity
</button>
</p>



<!-- 		Modal Input Prospect			 -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add New Opportunity</h4> 
	      	</div>
			<div class="modal-body">       
					<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('opportunity/save_easy')?>" onsubmit="return cekform();">
					<table>
					<div class="controls">
							<select name="comp" id="comp">
								<option value="0">- Select Company -</option>
								<?php
								    if($datacomp->num_rows()>0)
								    {
								    foreach($datacomp->result() as $row){ ?>
								    <option value="<?php echo $row->pId_customer;?>"><?php echo $row->sName_company; ?></option>
								    <?php } ?>
								<?php
								    }
								    else
								    {
								        echo "<option>- Data Belum Tersedia -</option>";
								    }
								?>
								
							</select>
						</div>
						<div class="control-group">
							<label class="control-label">Opportunity Name</label>
							<div class="controls">
							<input type="text" name="oppor" id="oppor" placeholder="Opportunity Name" class="span1">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Estimation Value</label>
							<div class="controls">
							<input type="text" name="esti" id="esti" placeholder="Estimation" class="span1">
							</div>
						</div><br>
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
				                	<textarea class="textarea" name="info" id="info" placeholder="Write Here" name="noted" id="noted" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>   
						        </div>
						    </div>
						</div>
						<div class="control-group">
							<label class="control-label">Estimation Transaction Start On</label>
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
						<label class="control-label">Status</label>				
						<div class="controls">
							<select name="stat" id="stat">
								<option value="0">- Select Status -</option>
								<option value="1">Success</option>
								<option value="2">On Process</option>
								<option value="3">Failed</option>
							</select>
						</div>
						</div>
						<div class="control-group" id="plcontact">
							
						</div>
	               	</table>
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