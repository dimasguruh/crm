//Date picker
    $(".select2").select2();

    $('#datepicker').datepicker({
      autoclose: true,
      format:'yyyy/mm/dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format:'yyyy/mm/dd'
    });
    $('#datepicker3').datepicker({
      autoclose: true,
      format:'yyyy/mm/dd'
    }); 
    $("#start").timepicker({
        minuteStep: 5,
        showInputs: false,
        showMeridian: false
    });
    $("#end").timepicker({
       minuteStep: 5,
       showInputs: false,
       showMeridian: false,
    });

    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });

  //Parsing contact for input opportunity
   $("#comp").change(function(){
          var comp = {comp:$("#comp").val()};
          $.ajax({
           type: "POST",
           url : "<?php echo base_url(); ?>opportunity/parsing_contact",
           data: comp,
           success: function(msg){
           $('#plcontact').html(msg);
           }
        });
    });

 
  


  //Show Contact In Tampilan Meeting(hasn't worked)
  $("#con").click(function(){
    //var idm = $("#idm").val();
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url();?>meeting/send_contact",
      success : function(dg){
        $("#conta").html(dg);
      }
    })
  })