<br>
<table class="table table-bordered nowrap" id="tblsales">	
	<thead>
		<tr>
			<th>Number</th>
			<th>NIK</th>
			<th>Nama Sales</th>
			<th>Gender</th>
			<th>Phone Number</th>
			<th>Username</th>
			<th>Registered On</th>
			<th>Images</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			$no=1;
			foreach ($data->result() as $row) {
		?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->sNIK; ?></td>
			<td><?php echo $row->sName_user; ?></td>
			<td><?php echo $row->sGender; ?></td>
			<td><?php echo $row->sPhone_number; ?></td>
			<td><?php echo $row->sUsername; ?></td>
			<?php
			$dt = $row->dRegister;
			$date = date("d F Y" ,strtotime($dt))
			?>
			<td><?php echo $date ?></td>
			<td><img src="<?php echo base_url();?>uploaded/sales_pict/<?php echo $row->sFoto; ?>"></td>
			<td><button type="button" class="btn btn-block btn-info btn-sm"><a href="<?php echo base_url('sales/datasales').'/'.$row->pId_sales;?>"><font color="white">DATA CUSTOMER</font></a></button></td>
			<td><button type="button" class="btn btn-block btn-success btn-sm"><a href="<?php echo base_url('sales/summary').'/'.$row->pId_sales;?>"><font color="white">SUMMARY PIPELINE</font></a></button></td>
		</tr><?php } ?>
	</tbody>
</table>
<br>
<p>
<?php echo anchor('sales/tambah', 'Add New', 'class="btn btn-info pull-right" name="tamdat"'); ?>
</p>