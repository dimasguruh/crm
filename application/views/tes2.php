<select class="form-control select2" multiple="multiple" name="person[]" id="person" data-placeholder="Select Contact" style="width: 50%;">
		          <?php
		          if($datacon->result()>0)
		          {
		            foreach ($datacon->result() as $row) {
		          ?>    
		            <option value = "<?php echo $row->pId_contact;?>"><?php echo $row->sName_contact;?></option>
		          <?php } ?>
		          <?php
		          }
		          else
		          {
		            echo "Contact Is Empty";
		          }
		          ?>
		          </select>


			<div class="control-group">
				<label class="control-label">Do You Want To Change Type Selling?</label> : &nbsp
						<select name="ch" id="ch" style="width: 18%;">
							<option value="1">YES</option>
							<option value="2">NO</option>
						</select>
				<input type="text" name="vtype" id="vtype" value="" readonly hidden>
			</div>


			<?php if($dm!=$dnow){?> class="disabled" <?php }?>