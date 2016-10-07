<br>
<section class="content"> 
  <div class="box box-danger"> 
    <div class="control-group">
          <label class="control-label">Select Sales You Want To Get</label> : &nbsp
            <select name="sl" id="sl" style="width: 18%;">
              <option value="0">- Select Sales -</option>
              <?php
              if($sales->num_rows()>0)
              {
                foreach ($sales->result() as $row) {
              ?>
                  <option value="<?php echo $row->pId_sales; ?>"><?php echo $row->sName_user;?></option>
              <?php
                }
              }
              else
              {
                echo "No Sales In DB";
              }
              ?>    
            </select>
            <button type="button" class="btn btn-info btn-xs" id="btnactsal" style="width:10%;" >GET</button>
    </div>
    <div class="control-group">
      <div id="sales_act">
      </div>
    </div>
  </div>
</section>