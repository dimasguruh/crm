<br>
<table class="table table-bordered nowrap" id="tblsum">	
	<thead>
		<tr>
			<th>No</th>
			<th>Meeting Subject</th>
			<th>Meeting Day</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Location</th>
			<th>File Meeting</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			if($datameet->num_rows()>0)
			{
				foreach ($datameet->result() as $row) {
		?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row->sSubject; ?></td>
				<?php $date = date('d F Y',strtotime($row->tStart)); ?>
				<td><?php echo $date; ?></td>
				<td><?php echo $row->tStart; ?></td>
				<td><?php echo $row->tEnd; ?></td>
				<td><?php echo $row->sLocation; ?></td>
				<td><button class="btn btn btn-block btn-info" id="btupdtop"><a href="<?php echo base_url('sales/meeting_file').'/'.$row->pId_meeting; ?>"><font color="white">MEETING FILE</font></a></button></td>
			</tr>
		<?php } ?>
		<?php
			}
			else
			{
				echo "Sales hasn't ever meeting";
			}
		?>
	</tbody>
</table>