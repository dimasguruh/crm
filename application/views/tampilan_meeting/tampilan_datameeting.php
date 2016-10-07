<br>
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
					<th>Opportunity Name</th>
					<th>Meeting Subject</th>
					<th>Meeting Date</th>
					<th>Meeting Notes</th>
					<th>Meeting With</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				'<tr>';
				$x = '';
				$no=1;
					foreach ($dmeet->result() as $row) {		
				?>
					<td><?php echo $no++; ?></td>
					<input type="text" name="idm" id="idm" value="<?php echo $row->pId_meeting; ?>" readonly hidden>
					<?php 
						$dmeet = date('d M Y', strtotime($row->dMeeting))
					?>
					<td><?php echo $row->sName_company; ?></td>
					<td><?php echo $row->sOpportunity_name; ?></td>
					<td><?php echo $row->sSubject; ?></td>
					<td><?php echo $dmeet; ?></td>
					<td><?php echo $row->sNotes; ?></td>
					<td><button type="button" id="con">Get Contact</button></td>
					<td><a href= "<?php echo base_url('meeting/get_edit').'/'.$row->pId_meeting;?>">EDIT</a></td>
				</tr>
					<?php } ?> 
			</tbody>
		</table>
	</div>
</div>