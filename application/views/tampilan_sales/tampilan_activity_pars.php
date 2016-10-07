<table class="table table-bordered nowrap" id="tblact">
	<thead>
		<tr>
			<th>Number</th>
			<th>Subject</th>
			<th>Company Name</th>
			<th>Note</th>
			<th>Location</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if($dsal->num_rows()>0)
		{
			$no = 1;
			foreach($dsal->result() as $row) {
			$stat = $row->iStatus;
			if ($stat==3) {
		?>
				<tr style="background-color:red;">
		<?php
			}
		?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->sSubject; ?></td>
			<td><?php echo $row->sName_company; ?></td>
			<td><?php echo $row->sNoted; ?></td>
			<td><?php echo $row->sLocation; ?></td>
			<?php
				$date = date('d F Y',strtotime($row->dMeeting));
			?>
			<td><?php echo $date; ?></td>
			</tr>
		<?php
			}
		?>
		<?php
		}
		else 
		{
			echo "Sales Have No Schedule";
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
$("#tblact").DataTable({
      "scrollX" : true,
      "iDisplayLength" : 10,
      "bLengthChange": false,
      "autoWidth":false
    })
</script>