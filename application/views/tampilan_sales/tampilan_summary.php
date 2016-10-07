<br>
	<table class="table table-bordered nowrap" id="tblsum">	
	<thead>
		<tr>
			<th>Number</th>
			<th>Customer</th>
			<th>Opportunity</th>
			<th>Sales Cycle</th>
			<th>Forecast Month Close</th>
			<th>Probability Of Sale</th>
		</tr>
	</thead>
	<tbody>	
		<?php
			$no = 1;
			foreach($summary->result() as $row) {
		?>
			<?php
				$dt = $row->dForecast_running;
				$dm = date('F',strtotime($dt));
				
				$price = $row->dForecast_amount;
				$stat  = $row->iStatus;
				if($stat==1)
				{
					$prob = 10 * $price /100;
				}
				else if($stat==2)
				{
					$prob = 30 * $price/100;
				}
				else if($stat==3)
				{
					$prob = 50 * $price/100;
				}
				else if($stat==4)
				{
					$prob = 95 * $price/100;
				}
				else if($stat==5)
				{
					$prob = 70 * $price/100;
				}
			?>
			<tr>
			<td><?php echo $no++; ?>
			<td><?php echo $row->sName_company; ?></td>
			<td><?php echo $row->sOpportunity_name; ?></td>
			<td><?php echo $row->sStatus_opp; ?></td>
			<td><?php echo $dm; ?></td>
			<td><?php echo uang($prob); ?></td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>

<section class="content"> 
  <div class="box box-danger">            
     	<div class="control-group">
    		<div class="col-lg-4">
    		<h4>Forecast January  : <?php echo uang($jan); ?></h4>
    		<h4>Forecast February : <?php echo uang($feb); ?></h4>
    		<h4>Forecast March    : <?php echo uang($mar); ?></h4>
    		<h4>Forecast April    : <?php echo uang($apr); ?></h4>
    		</div>
    		<div class="col-lg-4">
    		<h4>Forecast May    : <?php echo uang($may); ?></h4>
    		<h4>Forecast June   : <?php echo uang($jun); ?></h4>
    		<h4>Forecast July   : <?php echo uang($jul); ?></h4>
    		<h4>Forecast August : <?php echo uang($aug); ?></h4>
    		</div>
    		<div class="col-lg-4">
    		<h4>Forecast September : <?php echo uang($sept); ?></h4>
    		<h4>Forecast October   : <?php echo uang($oct); ?></h4>
    		<h4>Forecast November  : <?php echo uang($nov); ?></h4>
    		<h4>Forecast December  : <?php echo uang($dec); ?></h4>
    		<br><br>
    		</div>
    	</div> 
    	<div class="control-group">
    	<br>
    	<h3>Total Forecast : <?php echo uang($pipe); ?></h3>
    	</div>
  </div>
</section>