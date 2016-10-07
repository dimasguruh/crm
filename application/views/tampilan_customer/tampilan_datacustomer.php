<script type="text/javascript">

function cekform()
{
	var comp  = $("#comp").val();
	var comp2 = comp.trim();
    if(!comp2)
    {
        alertify
  		.alert("Fill The Company Name!", function(){
  		});
        $('#comp').focus();
        return false;
    }

    if(!$('#ind').val().trim())
    {
        alertify
  		.alert("Fill The Company Industry!", function(){
  		});
        $('#ind').focus();
        return false;
    }

    if(!$('#address').val().trim())
    {
        alertify
  		.alert("Fill The Company Address!", function(){
  		});
        $('#address').focus();
        return false;
    }
  	
    if(!$('#phone').val().trim())
    {
        alertify
  		.alert("Fill The Company Phone Number!", function(){
  		});
        $('#phone').focus();
        return false;
    }

    if($('#know').val()==0)
    {
        alertify
  		.alert("Fill The Information!", function(){
  		});
        $('#know').focus();
        return false;
    }

    if($('#type').val()==0)
    {
        alertify
  		.alert("Fill The Type Of Selling!", function(){
  		});
        $('#type').focus();
        return false;
    }

    var type = $("#type").val();
    var jci  = $("#jci").val();


    if(type==1 && jci)
    {
    	alertify
  		.alert(" Don't Fill Jne Cust Id If It New Business", function(){
  		});
        $('#jci').focus();
        return false;
    }

    if(type==2 && !jci)
    {
    	alertify
  		.alert("Fill The JNE Customer Id!", function(){
  		});
        $('#jci').focus();
        return false;
    }

    if(type==3 && !jci)
    {
    	alertify
  		.alert("Fill The JNE Customer Id!", function(){
  		});
        $('#jci').focus();
        return false;
    }

}
</script>


<br><br>
<div class="box box-success">
	<div class="box-header">
		<div class="box-title">
			<h2>Table Customer</h2><i>"List of your Customer"</i>
		</div>
	</div>
	<div class="box-body">
		<table class="table table-bordered nowrap" id="tblData">
			<thead>
				<tr>
					<th>Number</th>
					<th>Company Name</th>
					<th>Company Address</th>
					<th>Phone Number</th>
					<th>Industry</th>
					<th>JNE Customer Id</th>
					<th>Status</th>
					<th>Notes</th>
					<th>Know JNE</th>
					<th></th>
					<th></th>
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
					<td><?php echo $row->sName_company; ?></td>
					<td><?php echo $row->sAdress_company; ?></td>
					<td><?php echo $row->sPhone_number; ?></td>
					<td><?php echo $row->sIndustry; ?></td>
					<td><?php echo $row->sJne_cust_id; ?></td>
					<td><?php echo $row->sStatus; ?></td>
					<td><?php echo $row->sNotes; ?></td>
					<td><?php echo $row->sKnow; ?></td>
					<td><a href="<?php echo base_url('contact/show').'/'. $row->pId_customer;?>">Contact</td>
					<td><a href= "<?php echo base_url('opportunity/get_dataopportunity').'/'.$row->pId_customer;?>">Opportunity</td>
					<td><a href= "<?php echo base_url('customer/update').'/'. $row->pId_customer;?>" class="btn btn-default">EDIT/UPDATE</a></td>
				</tr>
				<?php } ?> 
			</tbody>
		</table>
		<br>
		<!--<?php /* echo anchor('contact/add', 'Add New', 'class="btn btn-info pull-right" name="tamdat"'); */?>-->

		<p>
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal"> Add New Customer
			</button>
		</p>
		<!-- 		Modal Input Prospect			 -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		 	<div class="modal-dialog" role="document">
			    <div class="modal-content">
			      	<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Add New Customer</h4>
			      	</div>
					<div class="modal-body">       
							<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('customer/save')?>" onsubmit="return cekform();">
							<table>
								<div class="control-group">
									<label class="control-label">Type Selling</label>
										<div class="controls">
											<select class="form-control input-sm" name="type" id="type">
												<option value="0">-Select Type-</option>
												<option value="1">NEW BUSINESS</option>
												<option value="2">UPSELLING</option>
												<option value="3">CROSSSELLING</option>
											</select>
										</div>
								</div>
								<div class="control-group">
									<label class="control-label">Company Name</label>
									<div class="controls">
									<input type="text" class="form-control input-sm" name="comp" id="comp" placeholder="Company Name" class="span1">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Industry</label>
									<div class="controls">
									<input type="text" class="form-control input-sm" name="ind" id="ind" placeholder="Industry" class="span1">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Company Address</label>
									<div class="controls">
									<input type="text" class="form-control input-sm" name="address" id="address" placeholder="Address Name" class="span1">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Phone Number</label>
									<div class="controls">
									<input type="text" class="form-control input-sm" name="phone" id="phone" placeholder="Phone Number" class="span1"	>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Notes</label>
									<div class="controls">
										<textarea class="form-control input-sm" name="notes" rows="10" cols="40"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">JNE Customer ID</label>
									<div class="controls">
									<input type="text" class="form-control input-sm" name="jci" id="jci" placeholder="Customer ID" class="span1">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">JNE Info</label>
										<div class="controls">
											<select class="form-control input-sm" name="know" id="know">
												<option value="0">-Select Media-</option>
												<option value="1">Forum</option>
												<option value="2">Blog</option>
												<option value="3">Video</option>
											</select>
										</div>
								</div>
			               	</table>
			        </div>					
			      	<div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="reset" class="btn btn-default">Reset</button>
					        <button type="submit" id="btn" class="btn btn-primary">Save Customer</button>
					        </form>
			     	</div>

			    </div>
		  	</div>
		</div>
		<!-- 		Modal Input Contact			 -->
	</div><!-- ./box-body -->	

 </div><!-- ./Box -->

