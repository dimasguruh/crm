<br>
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<table class="table table-bordered nowrap" id="tblexc">
	<thead>
		<tr>
			<th>Number</th>
			<th>Company Name</th>
			<th>Industry</th>
			<th>Company Address</th>
			<th>Phone Number</th>
			<th>Status</th>
			<th>Sales</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			$no=1;
			foreach ($datacus->result() as $row) {
		?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->sName_company; ?></td>
			<td><?php echo $row->sIndustry; ?></td>
			<td><?php echo $row->sAdress_company; ?></td>
			<td><?php echo $row->sPhone_number; ?></td>
			<td><?php echo $row->sStatus; ?></td>
			<td><?php echo $row->sName_user; ?></td>
			<td><button class="btn btn btn-block btn-info" id="btupdtop"><a href="<?php echo base_url('sales/det_cust').'/'.$row->pId_customer; ?>"><font color="white">PERFORMANCE DETAIL</font></a></button></td>
		</tr>
		<?php } ?>
	</tbody>
</table>