<script type="text/javascript">

function cekform()
{
    if(!$('#pros').val())
      {
        alertify
  		.alert("Fill The Prospect Name!", function(){
  		});
        $('#pros').focus();
        return false;
      }

    if(!$('#comp').val())
      {
        alertify
  		.alert("Fill The Company Name!", function(){
  		});
        $('#comp').focus();
        return false;
      }
  	
    if(!$('#phone').val())
      {
        alertify
  		.alert("Fill The Phone Number!", function(){
  		});
        $('#phone').focus();
        return false;
      }

     if(!$('#datepicker').val())
      {
        alertify
  		.alert("Fill The Date Meeting!", function(){
  		});
        $('#datepicker').focus();
        return false;
      }
}
</script>



<br><br>

<table id="example1" class="table table-bordered table-stripedl">
	<thead>
		<tr>
			<th>Number</th>
			<th>Prospect Name</th>
			<th>Company Name</th>
			<th>Phone Number</th>
			<th>Information</th>
			<th>Meeting Date</th>
			<th>Input Date</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		'<tr>';
		$no=1;
			foreach ($datapros->result() as $row) {		
		?>
			 <td><?php echo $no++; ?></td>
			 <td><?php echo $row->sName_prospect; ?></td>
			 <td><?php echo $row->sName_company; ?></td>
			 <td><a href="<?php echo base_url('prospecting/contact').'/'. $row->pId_prospect;?>"><?php echo $row->sPhone_number; ?></a></td>
			 <td><?php echo $row->sInformasi; ?></td>
			 <?php 
			 	$data_m  = $row->dDate_meeting;
			 	$data_me = date("F'd Y",strtotime($data_m));
			 ?>
			 <td><?php echo $data_me?></td>
			 <?php
				$data_i  = $row->dDate_input;
				$data_in = date("F'd Y",strtotime($data_i))
			 ?>
			 <td><?php echo $data_in ?></td>
			 <td><a href= "<?php echo base_url('prospecting/edit').'/'. $row->pId_prospect;?>">Edit</td>
			 <td><a href= "<?php echo base_url('prospecting/detail').'/'.$row->pId_prospect;?>">Action</td>
		</tr>
		<?php } ?> 
	</tbody>

</table>

<!--<?php /* echo anchor('prospecting/add', 'Add New', 'class="btn btn-info pull-right" name="tamdat"'); */?>-->

<p>
<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal"> Add New
</button>
</p>



<!-- 		Modal Input Prospect			 -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add New Prospect</h4>
	      	</div>
			<div class="modal-body">       
					<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('prospecting/save')?>" onsubmit="return cekform();">
					<table>
						<div class="control-group">
							<label class="control-label">Prospect Name</label>
							<div class="controls">
							<input type="text" name="pros" id="pros" placeholder="Prospect Name" class="span1">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Company Name</label>
							<div class="controls">
							<input type="text" name="comp" id="comp" placeholder="Company Name" class="span1">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Phone Number</label>
							<div class="controls">
							<input type="text" name="phone" id="phone" placeholder="Phone Number" class="span1">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Infomation</label>
							<div class="controls">
								<textarea name="info" id="info" rows="10" cols="40"></textarea>
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
	               	</table>
	        </div>					
	      	<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="reset" class="btn btn-default">Reset</button>
			        <button type="submit" id="btn" class="btn btn-primary">Save Prospect</button>
			        </form>
	     	</div>

	    </div>
  	</div>
</div>
<!-- 		Modal Input Contact			 -->