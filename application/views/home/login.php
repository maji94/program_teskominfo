<!DOCTYPE html>
<html class="bg-black">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="shortcut icon" href="<?php //echo base_url(); ?>assets/dist/favicon/icon.ico" type="image/x-icon">
    <link rel="icon" href="<?php// echo base_url(); ?>assets/dist/favicon/icon.ico" type="image/x-icon"> -->
    <title>SIANTAR v1.0</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
  </head>
  <body class="bg-black" <?php if ($this->session->flashdata('notif')) {echo "onload='".$this->session->flashdata('notif')."'";} ?> style="background: url(<?php echo base_url('assets/dist/img/siramen.jpg'); ?>);background-repeat: no-repeat;background-size: cover;">
    <div class="col-sm-6">
      <div class="login-box form-box" style="width: 100%;">
        <div class="row">
          <div class="col-sm-2 col-xs-3">
            <!-- <img src="<?php// echo base_url('assets/dist/img/logo.png'); ?>" alt="gamber logo" style="width: 100px;height: auto;"> -->
          </div>
          <div class="col-sm-9 col-xs-9">
            <h2 style="margin-top: 2px;color:green;font-weight: 600">SISTEM ABSENSI DAN PENCATATAN ANGGARAN v1.0</h2>
            <!-- <p style="color: black;">Jalan Raden Fatah, Kelurahan Pagar Dewa, Bengkulu, Kota Bengkulu 65144</p> -->
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="login-box form-box" style="margin-top: 30%;">
        <?php echo form_open('home/get_login/','method="post" class="form-horizontal"'); ?>
          <div class="body-login" style="border-radius: 5px;background: rgba(160, 160, 160, 0.6);">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon" style="background: #f0f0f0;">Username</span>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Silahkan masukkan username"value="<?php echo set_value('username'); ?>" required>
                  <?php echo form_error('username', '<span class="error">', '</span>'); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon" style="background: #f0f0f0;">Password</span>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Silahkan masukkan password"value="<?php echo set_value('password'); ?>" required>
                  
                  <?php echo form_error('password', '<span class="error">', '</span>'); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5 col-xs-12 pull-right">
                <button type="submit" class="btn bg-olive btn-block">Masuk</button>
              </div>
            </div>
          </div>
        <?php echo form_close(); ?>
      <h4 style="margin-top: 40px;text-align: right;color: green;font-weight: 600;">SIANTAR v1.0 &copy; 2018 <!-- <a href="#">IAIN BENGKULU</a> --></h4>
      </div>
    </div>

    

    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
