<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ajax/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ajax/ionicons.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Alertify -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('alertify/css/alertify.min.css') ?>">
  <!--Data Table-->
  <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/css/jquery.dataTables.css">-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/css/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">
   <!-- iCheck for checkboxes and radio inputs -->

  <!-- File Input -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone/dropzone.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone/basic.css') ?>">  
    <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">

<?php
function uang($amount)
{
  $curr = "Rp " . number_format($amount,2,',','.');
  return $curr;
}
?>

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>JNE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>uploaded/sales_pict/<?php echo $datafoto; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo "$datanama"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>uploaded/sales_pict/<?php echo $datafoto; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo "$datanama"; ?> - <?php echo $datapos; ?>
                  <small>Member since September 2016</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('home/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->

  <?php
     $this->load->view($menu);
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small><?php echo $subtitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('schedule/get_schedulehome');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <?php
        $this->load->view($content);
      ?>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Customer Relationship Management</b>
    </div>
    <strong>Copyright &copy; 2016 </strong> All rights
    reserved.
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/ajax/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>assets/ajax/raphael-min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/plugins/knob/jquery.knob.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!--Data Table-->
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
    $(document).ready(function() {
    $("#tblData").DataTable({
      "scrollY" : "265px",
      "scrollX" : true,
      "iDisplayLength" : 5,
      "aLengthMenu" :[5, 10, 15, 20, 25, 50, 100]
      //fixedHeader: true
    });
    $("#tblpros").DataTable({
      "scrollX" : true,
      "iDisplayLength" : 10,
      "aLengthMenu" :[5, 10, 15, 20, 25, 50, 100]
    })
    $("#tblsales").DataTable({
      "scrollX" : true,
      "scrollY" : "305px",
      "iDisplayLength" : 10,
      "bLengthChange": false,
    })
    $("#tblsum").DataTable({
      "scrollX" : true,
      "iDisplayLength" : 10,
      "bLengthChange": false,
      "autoWidth":false
    })
  });
    $("#tblexc").DataTable({
      "scrollX" : true,
      "searching" : false,
      //"iDisplayLength" : all,
      "bLengthChange": false,
      "autoWidth":false,
      dom: 'Bfrtip',
      buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $("#tbldetm").DataTable({
      "bLengthChange": false,
      "autoWidth":false,
      //"iDisplayLength" : all,
      "bLengthChange": false,
      "autoWidth":false,
      dom: 'Bfrtip',
      buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>

<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url();?>assets/ajax/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- File Input -->
<script type="text/javascript" src="<?php echo base_url('assets/dropzone/dropzone.js') ?>"></script>
<!-- Alertify -->
<script type="text/javascript" src="<?php echo base_url('alertify/alertify.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('customjs.js')?>"></script>

<!--Parsing Sales Schedule -->
<script type="text/javascript">
    $("#btnactsal").click(function(){
        var ids = $("#sl").val();
          $.ajax({
           type: "POST",
           url : "<?php echo base_url(); ?>sales/pars_act",
           data: {idsj:ids},
           success: function(msg){
           $('#sales_act').html(msg);
           }
        });
    });
</script>

<script type="text/javascript">
  //File Input Dropzone
  var dtsc = $("#dts").val();
  Dropzone.autoDiscover = false;
  var foto_upload= new Dropzone(".dropzone",{
  url: "<?php echo base_url('/meeting/add_file') ?>",
  maxFilesize: 200000,
  method:"post",
  allowedFileExtensions : ['jpg','png','gif','wma'],
  paramName:"userfile",
  dictInvalidFileType:"Type file ini tidak dizinkan",
  addRemoveLinks:true,
  });
  //Event ketika Memulai mengupload
  foto_upload.on("sending",function(a,b,c){
    a.token=Math.random();
    c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
    c.append("datasc",dtsc);
  });
  //Event ketika foto dihapus
  foto_upload.on("removedfile",function(a){
    var token=a.token;
    $.ajax({
      type:"post",
      data:{token:token},
      url:"<?php echo base_url('meeting/remove_file') ?>",
      cache:false,
      dataType: 'json',
      success: function(){
        console.log("Foto terhapus");
      },
      error: function(){
        console.log("Error");
      }
    });
  });

    jQuery(function($){
      var $modal = $('#editor-modal'),
        $editor = $('#editor'),
        $editorTitle = $('#editor-title'),
        ft = FooTable.init('#editing-example', {
          editing: {
            enabled: true,
            editRow: function(row){
              var values = row.val();
              $editor.find('#id').val(values.id);
              $editor.find('#ids').val(values.firstName)
              
              $modal.data('row', row);
              $editorTitle.text('Edit row #' + values.id);
              $modal.modal('show');$editor.find('#dob').val(values.dob.format('YYYY-MM-DD'));
            },
          }
        }),
        uid = 10;
  });
</script>
</body>
</html>