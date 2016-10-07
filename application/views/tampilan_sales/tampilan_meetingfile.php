<br>
	<table class="table table-bordered nowrap" id="tblexc">	
		<?php
			foreach ($dmeet->result() as $row) {
		?>
				<tr>
					<td>Subject Meeting</td>
					<td><?php echo $row->sSubject; ?></td>
				</tr>
				<tr>
					<td>Date Meeting</td>
					<?php $date = date('d F Y',strtotime($row->tStart)); ?>
					<td><?php echo $date; ?></td>
				</tr>
				<tr>
					<td>Start Time</td>
					<td><?php echo $row->tStart; ?></td>
				</tr>	
				<tr>
					<td>End Time</td>
					<td><?php echo $row->tEnd; ?></td>
				</tr>
				<tr>
					<td>Location</td>
					<td><?php echo $row->sLocation; ?></td>
				</tr>
				<tr>
					<td>Notes Meeting</td>
					<td><?php echo $row->sNotes; ?></td>
				</tr>
			<?php
			}
			?>
				<tr>
					<td>Meeting With</td>
					<td><?php echo $dcont; ?></td>
				</tr>
				<tr>
					<td>File Meeting</td>
					<td><?php echo $dfile; ?></td>
				</tr>
	</table>