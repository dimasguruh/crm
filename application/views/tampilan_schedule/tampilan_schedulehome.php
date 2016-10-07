<style type="text/css">
	a.disabled {
   pointer-events: none;
   cursor: default;
}
</style>
<br>

	<table class="table table-bordered nowrap" id="tblpros">
	<thead>
			<tr>
				<th data-breakpoints="all" data-title="Number">Number</th>		
				<th>Subject</th>
				<th>Opportunity Name</th>
				<th>Company Name</th>
				<th>Meeting Date</th>
				<th>Noted</th>
				<th data-type="html"></th>
				<th data-type="html"></th>		
			</tr>
	</thead>
		<tbody>
			
			<?php 
			$e=0;
			$no=1;
			$x="";
				foreach ($datapros->result() as $row) {	
					$stat = $row->iStatus;
					if($stat==3)
					{
			?>
						<tr style="background-color: #FF2E2E; color:#FFFFFF;">
			<?php
					}
			?>	
				<td><?php echo $no++; ?></td>
				<?php $ids = $row->pId_schedule;?>
				<td><?php echo $row->sSubject; ?></td>
				<td><?php echo $row->sOpportunity_name;?></td>
				<td><?php echo $row->sName_company; ?></td>
				<?php 
					$dm = $row->dMeeting;
					$dme = date('d M Y',strtotime($dm));
					$dn = date('Y-m-d');
					$dnow = date($dn);
				?>
				<td><?php echo $dme ?></td>
				<td><?php echo $row->sNoted; ?></td>
				<td><button type = "button" class="btn btn-block btn-primary" id="dis"><a href="<?php echo base_url('meeting/get_meeting_byid').'/'.$row->pId_schedule;?>"><font color ="white">CONFIRM</font></a></button></td>
				<td><button type="button" class="btn btn-block btn-danger btn-flat"><a href="<?php echo base_url('schedule/resche').'/'.$ids;?>"><font color ="white">RESCHEDULE</font></a></button></td>
				
			</tr>
				<?php } ?>
		</tbody>
	</table>