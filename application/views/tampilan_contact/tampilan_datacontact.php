<script type="text/javascript">

function cekform()
{
    if(!$('#contact').val().trim())
      {
        alertify
  		.alert("Fill The Contact Name!", function(){
  		});
        $('#contact').focus();
        return false;
      }

    if(!$('#phone').val().trim())
      {
      	alertify
  		.alert("Fill the primary phone number", function(){
  		});
        $('#phone').focus();
        return false;
      }

    if($('#gen').val()==0)
      {
      	alertify
  		.alert("Fill the Gender", function(){
  		});
        $('#gen').focus();
        return false;
      }

    var dp = $('#pos').val();
    
    if(dp==0)
     {
 		alertify
  		.alert("Fill the position!", function(){
  		});
        $('#pos').focus();
        return false;
     }

    if(!$('#email').val().trim())
    {
		alertify
  		.alert("Fill the email", function(){
  		});
        $('#email').focus();
        return false;
    }	

}
</script>

<br>
<table class="table table-bordered nowrap" id="tblData">
	<thead>
		<tr>
			<th>Number</th>
			<th>Contact Name</th>
			<th>Position</th>
			<th>Gender</th>
			<th>Phone Number</th>
			<th>Phone Number 2</th>
			<th>Phone Number/BBM PIN</th>
			<th>Email</th>
			<th></th>

		</tr>
	</thead>
	<tbody>
		<?php
		'<tr>';
		$no=1;
		foreach ($datacontact->result() as $row) {
		?>	
				<td><?php echo $no++; ?></td>
				<td><?php echo $row->sName_contact; ?></td>
				<td><?php echo $row->sName_position; ?></td>
				<td><?php echo $row->sGender; ?></td>
				<td><?php echo $row->sPhone_number; ?></td>	
				<td><?php echo $row->sPhone_number2; ?></td>	
				<td><?php echo $row->sPhone_number3; ?></td>
				<td><?php echo $row->sEmail; ?></td>
				<td><a href ="<?php echo base_url('contact/edit').'/'.$row->pId_contact;?>" >EDIT</td>	
		</tr>
		<?php	} ?>

	</tbody>
</table>
	<?php
		foreach ($idcus->result() as $row) 
		{
			$row->pId_customer;
		}
	?>

<p>
<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modalcon"> Add New
</button>
</p>
<div class="modal fade" id="modalcon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
      	</div>
		<div class="modal-body">     
				<form class="form-horizontal" method="POST" action="<?php echo base_url()?>contact/save/<?php echo $row->pId_customer;?>" onsubmit="return cekform();">
					<div class="control-group">
						<label class="control-label">Contact Name</label>
						<div class="controls">
						<input type="text" name="contact" id="contact" placeholder="Contact Name" class="span1">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Gender</label>					
						<div class="controls">
						<select name="gen" id="gen">
						<option value="0">- Select Gender -</option>
						<option value="1">Male</option>
						<option value="2">Female</option>
						</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Primary Phone Number</label>
						<div class="controls">
						<input type="text" name="phone" id="phone" placeholder="Phone Number" class="span1">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Phone Number 2</label>
						<div class="controls">
						<input type="text" name="phone2" id="phone2" placeholder="Phone Number 2" class="span1">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Phone Number 3 / BBM</label>
						<div class="controls">
						<input type="text" name="phone3" id="phone3" placeholder="Another Number" class="span1">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Position</label>
						
						<div class="controls">
						<select name="pos" id="pos">
						<option value="0">- Select Position -</option>
						<option value="1">Direktur</option>
						<option value="2">General Manager</option>
						<option value="3">Manager</option>
						<option value="4">Secretary</option>
						<option value="5">Staff</option>
						</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
						<input type="text" name="email" id="email" placeholder="Email" class="span1">
						</div>
					</div>
        </div>					
      	<div class="modal-footer">
		        <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="reset" class="btn btn-default">Reset</button>
		        <button type="submit" class="btn btn-primary">Save Contact</button>
		        </form>
     	</div>
    </div>
  </div>
</div>