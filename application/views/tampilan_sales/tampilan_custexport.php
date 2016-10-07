<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/css/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<br>
<h2 align="center">Data Customer</h2>
<table class="table table-bordered nowrap" id="tblsum">
	<thead>
		<tr>
			<th>Number</th>
			<th>Company Name</th>
			<th>Industry</th>
			<th>Company Address</th>
			<th>Phone Number</th>
			<th>Status</th>
			<th>Sales</th>
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
		</tr>
		<?php } ?>
	</tbody>
</table>
<button type="button" class="btn btn-primary"><a href="<?php echo base_url('sales/export') ?>"><font color="white">Export To Excel</font></a></button>

<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/js/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


<script type="text/javascript">
 $("#tblsum").DataTable({
      "scrollX" : true,
      "searching" : false,
      //"iDisplayLength" : all,
      "bLengthChange": false,
      "autoWidth":false,
      dom: 'Bfrtip',
      buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
 </script>