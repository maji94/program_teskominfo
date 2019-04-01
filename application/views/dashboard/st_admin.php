<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <link rel="shortcut icon" href="<?php// echo base_url(); ?>assets/dist/favicon/icon.ico" type="image/x-icon">
  <link rel="icon" href="<?php //echo base_url(); ?>assets/dist/favicon/icon.ico" type="image/x-icon"> -->
  <title>SIANTAR v1.0</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- textarea style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
</head>
<body class="hold-transition skin-green layout-top-nav fixed" >

  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo site_url(); ?>" class="navbar-brand"><b>SIANTAR </b>v1.0</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
            <?php $link=$this->uri->segment(2); ?>
              <li class="<?php if ($link=='main') {echo "active";} ?>"><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Beranda <span class="sr-only">(current)</span></a></li>
              <li class="<?php if ($link=='berkas') {echo "active";} ?>"><a href="<?php echo site_url().'admin/absensi/'; ?>"><i class="fa fa-file-archive-o"></i> Absesni</a></li>
              <li class="<?php if ($link=='anggaran') {echo "active";} ?>"><a href="<?php echo site_url().'admin/anggaran/'; ?>"><i class="fa fa-dollar"></i> Data Anggaran</a></li>
            </ul>
          </div>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url().'assets/dist/img/avatar5.png'; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs" style="text-transform: capitalize;">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo base_url().'assets/dist/img/avatar5.png'; ?>" class="img-circle" alt="User Image">

                    <p style="text-transform: capitalize;">
                      Admin
                      <small>Pengelola Sistem</small>
                    </p>
                  </li>
                  <li class="user-body">
                    <div class="row">
                    </div>
                  </li>
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat" data-target="#ubah-psw" data-toggle="modal">Ubah Password</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="<?php echo site_url().'home/get_logout/'; ?>" class="btn btn-default btn-flat">Log Out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="content-wrapper" style="background: url(<?php echo base_url('assets/dist/img/siramen.jpg'); ?>);background-repeat: no-repeat;background-size: cover;">
      <div class="container" style="background: aliceblue;">
        <section class="content-header" style="padding-left: 0px;padding-right: 0px;">
          <div class="box box-solid header-atas" style="width: 100%;">
            <div class="box-body">
              <!-- <div class="col-md-2 col-xs-12" style="text-align: center;">
                <img class="img-responsive" src="<?php// echo base_url().'assets/dist/img/logo.png'; ?>" style="text-align: center;margin: auto;">
              </div> -->
              <div class="col-md-12 header-isi">
                <p style="text-transform: capitalize;font-weight: 600;text-align: center;">
                SISTEM ABSENSI DAN PENCATATAN ANGGARAN</p>
                <!-- <p style="text-transform: capitalize;">Alamat : Jalan Raden Fatah Pagar Dewa Kota Bengkulu 38211</p>
                <hr>
                <small>
                Telepon : (0736) 51276-51171-51172-53879 Faksimili : (0736) 51171-511172<br>
                Website : <a href="http://iainbengkulu.ac.id/" target="_blank">http://iainbengkulu.ac.id</a>
                </small> -->
              </div>
            </div>
          </div>
          <hr style="border-width: 2px;border-color: #d6d4d4;">
        </section>
        

      <?php $this->load->view($page); ?>


      </div>
    </div>


    <div class="modal fade" id="ubah-psw" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ubah Pasword</h4>
          </div>
          <?php echo form_open('admin/ubah_psw/','method="POST" class="form-horizontal" onsubmit="return cek_submit();"'); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="psw_lama" class="control-label col-md-4">Password Lama</label>
                <div class="col-md-7">
                  <input type="password" name="psw_lama" id="psw_lama" class="form-control" placeholder="Masukkan password lama anda" size="20" onkeyup="cek_password();">
                  <span class="error" id="pesan_password"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="psw_baru" class="control-label col-md-4">Password Baru</label>
                <div class="col-md-7">
                  <input type="password" name="psw_baru" id="psw_baru" class="form-control" placeholder="Masukkan password baru anda" size="20">
                </div>
              </div>
              <div class="form-group">
                <label for="konfir" class="control-label col-md-4">Konfirmasi</label>
                <div class="col-md-7">
                  <input type="password" name="konfir" id="konfir" class="form-control" placeholder="Ulangi password baru anda" size="20" onkeyup="cek_kofirm();">
                  <span class="error" id="pesan_konfir"></span>
                </div>
              </div>
            </div>
            <div class="modal-footer" >
                <button type="submit" name="submit" id="submit" class="btn btn-warning">Ubah</button>&nbsp;
                <button type="button" class="btn btn-default" data-dismiss="modal" >Batal</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>

     <!-- <?php 
     // echo "<pre>";
     // print_r($this->session->userdata);
     // print_r($data);
     ?> -->
  </div>

  <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/jquery-mask/src/jquery.mask.js"></script>

  <script src="https://cdnjs.com/libraries/jquery.mask"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>


  <style type="text/css">
    #notifikasi {
      cursor: pointer;
      position: fixed;
      right: 0px;
      z-index: 9999;
      bottom: 0px;
      margin-bottom: 15px;
      margin-right: 15px;
      min-width: 300px; 
      max-width: 800px;  
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function(){ 
      $('#example1').DataTable();
    });
  </script>

  <script type="text/javascript">
    var error = 0;
    function cek_nip() {
      $("#nama").val(' ');
      var nip = $("#nip").val();
      if (nip=="") {
        $("#pesan_error").css("color","#fc5d32");
        $("#nip").css("border-color","#fc5d32");
        $("#pesan_error").html("Silahkan masukkan nip");
      }else{
        $.ajax({
            url: "<?php echo base_url('admin/cek_nip') ?>",
            data: 'nip='+nip,
            type: "POST",
            }).success(function (msg) {
                if(msg==1){
                    error = 1;
                }else{
                    var json = msg,
                    obj = JSON.parse(json);
                    $("#nama").val(obj.nama);

                }
                $("#pesan_error").fadeIn(5000);
        });
      }
    }

    function jenis_ket1(){
      var jenis_ket = $("#jenis_ket").val();
      if (jenis_ket == 'cuti') {
        $("#cuti1").fadeIn(100);
        $("#cuti2").fadeIn(100);
        $("#cuti3").fadeIn(100);
        $("#cuti4").fadeIn(100);
        $("#cuti5").fadeIn(100);
        $("#cuti6").fadeIn(100);
        $("#dinas1").fadeOut(100);
        $("#dinas2").fadeOut(100);
        $("#dinas3").fadeOut(100);
        $("#diklat1").fadeOut(100);
        $("#diklat2").fadeOut(100);
        $("#diklat3").fadeOut(100);
        $("#diklat4").fadeOut(100);
      }else if (jenis_ket == 'dinas') {
        $("#cuti1").fadeOut(100);
        $("#cuti2").fadeOut(100);
        $("#cuti3").fadeOut(100);
        $("#cuti4").fadeOut(100);
        $("#cuti5").fadeOut(100);
        $("#cuti6").fadeOut(100);
        $("#dinas1").fadeIn(100);
        $("#dinas2").fadeIn(100);
        $("#dinas3").fadeIn(100);
        $("#diklat1").fadeOut(100);
        $("#diklat2").fadeOut(100);
        $("#diklat3").fadeOut(100);
        $("#diklat4").fadeOut(100);
      }else if (jenis_ket == 'pendidikan') {
        $("#cuti1").fadeOut(100);
        $("#cuti2").fadeOut(100);
        $("#cuti3").fadeOut(100);
        $("#cuti4").fadeOut(100);
        $("#cuti5").fadeOut(100);
        $("#cuti6").fadeOut(100);
        $("#dinas1").fadeOut(100);
        $("#dinas2").fadeOut(100);
        $("#dinas3").fadeOut(100);
        $("#diklat1").fadeIn(100);
        $("#diklat2").fadeIn(100);
        $("#diklat3").fadeIn(100);
        $("#diklat4").fadeIn(100);
      }
    }

    function jenis_kett(){
      var jenis_ket = $("#jenis_ket2").val(); 
      if (jenis_ket == 'cuti') {
        $("#cuti12").fadeIn(100);
        $("#cuti22").fadeIn(100);
        $("#cuti32").fadeIn(100);
        $("#cuti42").fadeIn(100);
        $("#cuti52").fadeIn(100);
        $("#cuti62").fadeIn(100);
        $("#dinas12").fadeOut(100);
        $("#dinas22").fadeOut(100);
        $("#dinas32").fadeOut(100);
        $("#diklat12").fadeOut(100);
        $("#diklat22").fadeOut(100);
        $("#diklat32").fadeOut(100);
        $("#diklat42").fadeOut(100);
      }else if (jenis_ket == 'dinas'){
        $("#cuti12").fadeOut(100);
        $("#cuti22").fadeOut(100);
        $("#cuti32").fadeOut(100);
        $("#cuti42").fadeOut(100);
        $("#cuti52").fadeOut(100);
        $("#cuti62").fadeOut(100);
        $("#dinas12").fadeIn(100);
        $("#dinas22").fadeIn(100);
        $("#dinas32").fadeIn(100);
        $("#diklat12").fadeOut(100);
        $("#diklat22").fadeOut(100);
        $("#diklat32").fadeOut(100);
        $("#diklat42").fadeOut(100);
      }else if (jenis_ket == 'pendidikan') {
        $("#cuti12").fadeOut(100);
        $("#cuti22").fadeOut(100);
        $("#cuti32").fadeOut(100);
        $("#cuti42").fadeOut(100);
        $("#cuti52").fadeOut(100);
        $("#cuti62").fadeOut(100);
        $("#dinas12").fadeOut(100);
        $("#dinas22").fadeOut(100);
        $("#dinas32").fadeOut(100);
        $("#diklat12").fadeIn(100);
        $("#diklat22").fadeIn(100);
        $("#diklat32").fadeIn(100);
        $("#diklat42").fadeIn(100);
      }
    }
  </script>

  <script>   
    $('#notifikasi').slideDown('slow').delay(3000).slideUp('slow');
  </script>

  <script>
    $(document).ready(function(){
        $('#ubah').on('show.bs.modal', function (event){
            var div    = $(event.relatedTarget)
            var id     = div.data('id')
            var waktu   = div.data('waktu')
            var nip   = div.data('nip')
            var nama   = div.data('nama')
            var tgl_mulai   = div.data('tgl_mulai')
            var tgl_selesai   = div.data('tgl_selesai')
            var jenis_ket   = div.data('jenis_ket')
            var sub_jenis   = div.data('sub_jenis')
            var nomor   = div.data('nomor')
            var keterangan   = div.data('keterangan')

            
            var modal  = $(this)

            modal.find('#id2').attr("value", id)
            modal.find('#waktu2').attr("value", waktu)
            modal.find('#nip2').attr("value", nip)
            modal.find('#nama2').attr("value", nama)
            modal.find('#tgl_mulai2').attr("value", tgl_mulai)
            modal.find('#tgl_selesai2').attr("value", tgl_selesai)
            modal.find('#jenis_ket2').attr("value", jenis_ket)
            modal.find('#sub_jenis2').attr("value", sub_jenis)
            modal.find('#nomor2').attr("value", nomor)
            modal.find('#keterangan2').attr("value", keterangan)
          
        });

        $('#hapus').on('show.bs.modal', function (event){
            var div   = $(event.relatedTarget)
            var id    = div.data('id')
            var nama  = div.data('nama')
            var modal = $(this)

            modal.find('#id').attr("value", id)
            modal.find('#banner').html("<h4>Apakah anda yakin akan menghapus data absen <i>"+nama+"</i> ?</h4>")
        });    

    }); 
</script>
  
</body>
</html>
