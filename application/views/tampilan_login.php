<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log In</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ajax/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ajax/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('alertify/css/alertify.min.css') ?>">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script type="text/javascript">
    function cekform()
    {
      if(!$('#un').val().trim())
      {
        alertify
        .alert("Fill The Username!", function(){
        });
        $('#un').focus();
        return false;
      }

      if(!$('#pwd').val().trim())
      {
        alertify
        .alert("Fill The Password!", function(){
        });
        $('#pwd').focus();
        return false;
      }
    }

  </script>

</head>
<body  background="<?php echo base_url()?>assets/pict/sales.jpg">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Form Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign In to Start</p>

    <form action="<?php echo base_url('login/get_login');?>" method="post" onsubmit="return cekform();">
    <!--<?php //echo form_open('login/getlogin', 'method="post" onsubmit="return cekform()"'); ?>-->

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="un" id="un" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

        <?php
          $info=$this->session->flashdata('info');
          if(!empty($info))
          {
            echo $info;
          }
        ?>
      <div class="row">
        <div class="col-xs-8">
      
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <!--<?php //form_close();?>-->
   </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url();?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('alertify/alertify.js') ?>"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>