<br><br>
<div class="box box-danger">
	<div class="box-body"> 
		<table class="table table-bordered nowrap" id="tblsales">
			<thead>
				<tr>
					<th>Number</th>
					<th>Company Name</th>
					<th>Company Address</th>
					<th>Phone Number</th>
					<th>Industry</th>
					<th>JNE Customer Id</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>		
				<tr>
				<?php 
				$no=1;
				if($dtcust->num_rows()>0)
				{
					foreach ($dtcust->result() as $row) {		
				
				?>	
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->sName_company; ?></td>
					<td><?php echo $row->sAdress_company; ?></td>
					<td><?php echo $row->sPhone_number; ?></td>
					<td><?php echo $row->sIndustry; ?></td>
					<td><?php echo $row->sJne_cust_id; ?></td>
					<td><?php echo $row->sStatus; ?></td>
					<td><button class="btn btn btn-block btn-info" id="btupdtop"><a href="<?php echo base_url('sales/detail').'/'.$row->pId_customer;?>"><font color="white">DETAIL CUSTOMER</font></a></button></td>
				</tr>
				<?php } ?>
				<?php }
				else 
				{
					echo "Sales Have No Customer";
				}

					?> 
			</tbody>

		</table>
	</div>
</div>