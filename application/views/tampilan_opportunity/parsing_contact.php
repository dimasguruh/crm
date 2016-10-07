<label class="control-label">PIC</label>
<div class="controls">
	<select name="cont" id="cont">
		<option value="0">-Select PIC-</option>
		<?php
		$no= 1;
		foreach ($datacon->result() as $row) {
		?>
		<option value="<?php echo $row->sName_contact; ?>"><?php echo $row->sName_contact; ?></option>		
		<?php } ?>
	</select>
</div>