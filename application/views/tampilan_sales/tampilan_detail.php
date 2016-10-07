<br><br>
<table class="table table-bordered nowrap" id="tblsum">
	<thead>
		<tr>
			<th>Number</th>
			<th>Opportunity Name</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>		
	<?php
	$no = 1;
	if($detail->num_rows()>0)
	{
		foreach ($detail->result() as $row) {
	?>	
		<td><?php echo $no++;?></td>
		<td><?php echo $row->sOpportunity_name;?></td> 
		<td><button class="btn btn btn-block btn-info" id="btupdtop"><a href="<?php echo base_url('sales/report').'/'.$row->pId_opportunity;?>"><font color="white">OPP REPORT</font></a></button></td>
		<td><button class="btn btn btn-block btn-danger" id="btupdtop"><a href="<?php echo base_url('sales/meeting').'/'.$row->pId_opportunity; ?>"><font color="white">MEETING FILE</font></a></button></td>
		</tr>
	<?php } ?>
	<?php }
	else
	{
		echo ("Customer Have No Opportunity");
	}
	?>
</table>