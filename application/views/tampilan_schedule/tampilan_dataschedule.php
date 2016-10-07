<style type="text/css">
	a.disabled {
   pointer-events: none;
   cursor: default;
}
</style>

<script type="text/javascript">

function cekform()
{

	var opp = $("#opp").val()
    if(opp == 0)
	{
	    alertify
			.alert("Fill Opportunity!", function(){
			});
	    $('#opp').focus();
	    return false;
	}

    if(!$('#subject').val().trim())
   	{
        alertify
  		.alert("Fill The Subject Of Meeting!", function(){
  		});
        $('#subject').focus();
        return false;
    }

    if(!$('#location').val().trim())
    {
        alertify
  		.alert("Fill Location Meeting!", function(){
  		});
        $('#location').focus();
        return false;
    }

    if(!$('#datepicker').val().trim())
    {
        alertify
  		.alert("Fill The Date Meeting", function(){
  		});
        $('#datepicker').focus();
        return false;
    }

    if(!$('#noted').val())
    {
        alertify
  		.alert("Fill The Information!", function(){
  		});
        $('#noted').focus();
        return false;
    }
}

</script>

<br><br>

<?php
	foreach ($datacon->result() as $row) 
{
	$row->iId_customer;
}
?>

<br><br>
<div class="box box-success">
	<div class="box-header">
		<div class="box-title">
			<h2>Table Schedule</h2><i>List Of My Schedule</i>
		</div>
	</div>
	<div class="box-body">
		<table class="table table-bordered nowrap" id="tblData">
			<thead>
				<tr>
					<th>Number</th>
					<th>Subject</th>
					<th>Opportunity Name</th>
					<th>Company Name</th>
					<th>Location</th>
					<th>Noted</th>
					<th>Meeting Date</th>
					<th>Schedule Status</th>
					<th></th>			
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php 
				$no=1;
					foreach ($datapros->result() as $row) {		
				?>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->sSubject; ?></td>	
					<td><?php echo $row->sOpportunity_name; ?></td>
					<td><?php echo $row->sName_company; ?></td>
					<td><?php echo $row->sLocation; ?></td>
					<td><?php echo $row->sNoted; ?></td>
					<?php 
						$dm = $row->dMeeting;
						$dme = date('d M Y',strtotime($dm)) ;
						$dnow = date('Y-m-d');
					?>
					<td><?php echo $dme; ?></td>
					<td><?php echo $row->sStatus; ?></td>
					<?php
					if($dm==$dnow)
					{
					?>
					<td><a href= "<?php echo base_url('schedule/edit').'/'. $row->pId_schedule;?>" class="disabled">EDIT</a></td>
					<?php
					}
					else
					{
					?>
					<td><a href= "<?php echo base_url('schedule/edit').'/'. $row->pId_schedule;?>">EDIT</a></td>
					<?php
					}
					?>
				</tr>
					<?php } ?> 			
			</tbody>
		</table>
	</div>
	<div class="box-footer"> 
		<p>
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal"> Add New Schedule
		</button>
		</p>
	</div>
</div>

<!-- 		Modal Input Prospect			 -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add New Schedule</h4>
	      	</div>
			<div class="modal-body">       
					<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url()?>schedule/save_easy" onsubmit="return cekform();">
					<table>

						<div class="controls">
							<select name="opp" id="opp">
								<option value="0">- Select Opportunity -</option>
								<?php
								    if($dataopp->num_rows()>0)
								    {
								    foreach($dataopp->result() as $row){ ?>
								    <option value="<?php echo $row->pId_opportunity;?>"><?php echo $row->sName_company; ?> - <?php echo $row->sOpportunity_name; ?></option>
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
							<label class="control-label">Subject</label>
							<div class="controls">
							<input type="text" name="subject" id="subject" placeholder="Subject" class="span1">
							</div>
						</div>
						<div class="control-group" id="plconsc">

						</div>
						<div class="control-group">
							<label class="control-label">Location</label>
							<div class="controls">
							<input type="text" name="location" id="location" placeholder="Location" class="span1">
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
	                   					<input type="text" class="form-control pull-right" id="datepicker" name="meet">
	                 				 </div>	
	               				</div>
	               			</div>
	               		</div>
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
				                	<textarea class="textarea" placeholder="Place some text here" name="noted" id="noted" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>   
						        </div>
						    </div>
						</div>
	               	</table>
	        </div>					
	      	<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="reset" class="btn btn-default">Reset</button>
			        <button type="submit" id="btn" class="btn btn-primary">Save Schedule</button>
			        </form>
	     	</div>

	    </div>
  	</div>
</div>