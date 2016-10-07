<label class="control-label">Meeting With</label>				
<div class="controls">
	<?php
	$s = 1;
	if($datacon->result()>0)
	{
		foreach ($datacon->result() as $row) {
		?>
		<input type="checkbox" name="person<?php echo $s++?>" value="<?php echo $row->pId_contact;?>"><?php echo $row->sName_contact;?><br>
		<?php } ?>
		<input type="text" value="<?php echo $s; ?>" name="jbx" readonly size = "1">
	<?php
	}
	else
	{
		echo "Contact Is Empty";
	}
	?>
</div>