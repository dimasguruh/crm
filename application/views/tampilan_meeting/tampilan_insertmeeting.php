<script type="text/javascript">
function cekform()
{
  if(!$('#subject').val())
      {
        alertify
      .alert("Fill The Subject!", function(){
      });
        $('#subject').focus();
        return false;
      }

  if(!$('#person').val())
  {
    alertify
  .alert("Fill Person You Meeting With!", function(){
  });
    $('#person').focus();
    return false;
  }

	if(!$('#notes').val())
      {
        alertify
  		.alert("Fill The Notes!", function(){
  		});
        $('#notes').focus();
        return false;
      }
 /*	
    if(!$('#phone').val())
      {
        alertify
  		.alert("Fill The Phone Number!", function(){
  		});
        $('#phone').focus();
        return false;
      }

     if(!$('#datepicker').val())
      {
        alertify
  		.alert("Fill The Date Meeting!", function(){
  		});
        $('#datepicker').focus();
        return false;
      }
*/
}

function cekform2(){

   if(!$('#contact').val())
      {
      alertify
      .alert("Fill The Contact Name!", function(){
      });
        $('#notes').focus();
        return false;
      }

    var gen = $("#gen").val()
    if(gen==0)
      {
          alertify
          .alert("Fill The Gender Contact!", function(){
        });
          $('#gen').focus();
          return false;
      }

    var pos = $("#pos").val()
    if(pos==0)
    {
      alertify
        .alert("Fill The Position!", function(){
        });
          $('#pos').focus();
      return false;
    }
}
</script>

<style type="text/css">
  .dropzone {
    margin-top: 0px;
    border: 2px dashed #0087F7;
  }

</style>

<div class="box box-danger">            
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('meeting/done').'/'.$datasche?>" onsubmit="return cekform()">
  	<div class="control-group">
  		<label class="control-label" for="subject">Subject</label>
  		  <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control" value="<?php echo $subject; ?>" style="width: 50%;">
  	</div>
    <div>
    <input type="text" name="scheid" id="scheid" value="<?php echo $datasche; ?>" readonly hidden>
    </div>
    <div class="control-group">
      <label class="control-label" for="meeting">Meeting With</label><br>
        <select class="form-control select2" multiple="multiple" name="person[]" id="person" data-placeholder="Select Contact" style="width: 50%;">
          </button>
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
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal"> Add More Contact
    </div>
  	<div class="control-group">
  			<label class="control-label">Location</label><br>
  			<input type="text" name="location" id="location" placeholder="Location" class="span1" value="<?php echo $location;?>" style="width: 20%";>
  	</div>  
    <div class="control-group">
     	<div class="bootstrap-timepicker">            
          <label class="control-label">Start At</label>
    				<div class="input-group date">
      					<div class="input-group-addon">
       						<i class="fa fa-calendar"></i>
       					</div>
       					<input type="text" class="timepicker" name="start" id="start">
     				</div>	
      </div>
    </div>
    <div class="control-group">
      <div class="bootstrap-timepicker">            
          <label class="control-label">End At</label>
            <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="timepicker2" class="end" name="end" id="end">
            </div>  
      </div>
    </div><br>
  	<div class="control-group">
  		<div class="box">
  			  <div class="box-header">
            <h3 class="box-title">Notes
                <small>Tell Evrything About This Meeting</small>
            </h3>
  			              <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
    			  </div>
  			              <!-- /. tools -->
		      </div>
  			            <!-- /.box-header -->
	        <div class="box-body pad">
              	<textarea class="textarea" placeholder="Place some text here" name="notes" id="notes" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
	        </div>
  		</div>
  	</div>      
    <div class="control-group">
    <label class="control-label">Document's Meeting</label>
        <div class="dropzone">
            <h3 align="center">Click Or Drop File Here </h3>
            <input type="text" id="dts" value="<?php echo $datasche;?>" readonly hidden>
        </div>
    </div>
    <br><br>
	        <button type="submit" class="btn btn-primary pull-right" id="done" onclick="return confirm('Are You Sure it has Done?');">Done</button>
	        <button type="reset" class="btn btn-default pull-right">Reset</button>
  </form> 
</div>



<!--    Modal Input Prospect       -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add More Contact</h4>
        </div>
        <div class="modal-body">     
            <form class="form-horizontal" method="POST" action="<?php echo base_url('meeting/more_contact').'/'.$datasche ;?>" onsubmit="return cekform2()">
              <div class="control-group">
                <label class="control-label">Contact Name</label>
                <div class="controls">
                <input type="text" name="contact" id="contact" placeholder="Contact Name" class="span1">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Gender</label>    
                <div class="controls">
                <select name="gen" id="gen">
                <option value="0">- Select Gender -</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Phone Number</label>
                <div class="controls">
                <input type="text" name="phone" id="phone" placeholder="Phone Number" class="span1">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Phone Number 2</label>
                <div class="controls">
                <input type="text" name="phone2" id="phone2" placeholder="Phone Number 2" class="span1">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Phone Number 3 / BBM</label>
                <div class="controls">
                <input type="text" name="phone3" id="phone3" placeholder="Another Number" class="span1">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Position</label>               
                <div class="controls">
                <select name="pos" id="pos">
                <option value="0">- Select Position -</option>
                <option value="1">Direktur</option>
                <option value="2">General Manager</option>
                <option value="3">Manager</option>
                <option value="4">Secretary</option>
                <option value="5">Staff</option>
                </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                <input type="text" name="email" id="email" placeholder="Email" class="span1">
                </div>
              </div>
          </div>            
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" id="bmorecon" class="btn btn-primary">Save Contact</button>
         </form>
          </div>
    </div>
  </div>
</div>  