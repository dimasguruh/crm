<br>
<table class="table table-bordered nowrap" id="tblsales">
	<thead>
		<tr>
			<th>Number</th>
			<th>Oppr Name</th>
			<th>Product Type</th>
			<th>Service Type</th>
			<th>Forecast Amount</th>
			<th>Forecast Start Running</th>
			<th>Sales Cycle</th>
			<th>Last Update</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			$no=1;
			foreach ($datacus->result() as $row) {
		?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->sOpportunity_name; ?></td>
			<td><?php echo $row->sProduct?></td>
			<td><?php echo $row->sService; ?></td>
			<?php
			$money = uang($row->dForecast_amount);
			$date  = date('d F Y',strtotime($row->dForecast_running));
			$date2 = date('d F Y',strtotime($row->dUpdated));
			?>
			<td><?php echo $money; ?></td>
			<td><?php echo $date; ?></td>
			<td><?php echo $row->sStatus_opp; ?></td>
			<td><?php echo $date2; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>