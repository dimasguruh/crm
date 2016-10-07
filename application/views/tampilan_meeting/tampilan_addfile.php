<div class="container">
    <form 	 name="property" id="property" method="POST" action="<?php echo base_url('meeting/add_video')?>" enctype="multipart/form-data" >
        <div class="control-group">
                <label class="control-label">Location</label><br>
                <input type="file" name="userfile" style="width: 30%";>
        </div>
         <input type="submit" id="button" name="submit" value="Submit" />
    </form>
</div>