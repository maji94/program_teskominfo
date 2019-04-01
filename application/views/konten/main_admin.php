<?php 
  if ($terminal == 1) {
    $terminal2 = "Terminal 2 Keberangkatan";
  }else if ($terminal == 2) {
    $terminal2 = "Terminal 2 Kedatangan";
  }else if ($terminal == 3) {
    $terminal2 = "Terminal 3 Keberangkatan";
  }else if ($terminal == 4) {
    $terminal2 = "Terminal 3 Kedatangan";
  }else {
    $terminal2 = "Semua Terminal";
  }

  // if ($jenis_lk == 1) {
  //   $jenis_lk2 = "Jenis 1";
  // }else if ($jenis_lk == 2) {
  //   $jenis_lk2 = "Jenis 2";
  // }else if ($jenis_lk == 3) {
  //   $jenis_lk2 = "Jenis 3";
  // }else if ($jenis_lk == 4) {
  //   $jenis_lk2 = "Jenis 4";
  // }else if ($jenis_lk == 5) {
  //   $jenis_lk2 = "Jenis 5";
  // }else {
  //   $jenis_lk2 = "Semua Jenis Laporan";
  // }

  if ($mode == "bulan") {
    $mode2 = "Bulan";
  }else {
    $mode2 = "Tahun";
  }
 ?>

<?php echo $this->session->flashdata('notif'); ?>

<section class="content" style="background: aliceblue;">

  <div class="alert alert-dismissable alert-success">
      Selamat datang, <strong>Admin</strong>
  </div>

  <div class="row">

    <div class="col-xs-12">

      <div class="box box-success">
          <div class="box-header with-border">
            <center>
            <h3 class="box-title" style="font-size: 2.2em;margin-bottom: 20px;font-weight: 600">Grafik Data Inventeris Berkas</h3>
            <p style="font-size: 1.5em"><?php echo $terminal2; ?> dengan skala / <?php echo $mode2; ?></p>
            </center>
            <?php echo form_open('admin/main', 'class="form-horizontal" method="get"'); ?>
              <div class="form-group">
                <div class="col-sm-3 col-xs-12">
                  <select class="form-control" name="terminal">
                    <option value="0" <?php if ($terminal == 0) {echo "selected";} ?>>--- Semua Terminal ---</option>
                    <option value="1" <?php if ($terminal == 1) {echo "selected";} ?>>Terminal 2 Keberangkatan</option>
                    <option value="2" <?php if ($terminal == 2) {echo "selected";} ?>>Terminal 2 Kedatangan</option>
                    <option value="3" <?php if ($terminal == 3) {echo "selected";} ?>>Terminal 3 Keberangkatan</option>
                    <option value="4" <?php if ($terminal == 4) {echo "selected";} ?>>Terminal 3 Kedatangan</option>
                  </select>
                </div>
                <!-- <div class="col-sm-3 col-xs-12">
                  <select class="form-control" name="jenis_lk">
                    <option value="0" <?php// if ($jenis_lk == 0) {echo "selected";} ?>>--- Pilih Jenis Laporan ---</option>
                    <option value="1" <?php// if ($jenis_lk == 1) {echo "selected";} ?>>Jenis 1</option>
                    <option value="2" <?php// if ($jenis_lk == 2) {echo "selected";} ?>>Jenis 2</option>
                    <option value="3" <?php// if ($jenis_lk == 3) {echo "selected";} ?>>Jenis 3</option>
                    <option value="4" <?php// if ($jenis_lk == 4) {echo "selected";} ?>>Jenis 4</option>
                    <option value="5" <?php// if ($jenis_lk == 5) {echo "selected";} ?>>Jenis 5</option>
                  </select>
                </div> -->
                <div class="col-sm-3 col-xs-12">
                  <select class="form-control" name="mode">
                    <option value="0" <?php if ($mode == 0) {echo "selected";} ?>>-- Pilih Mode ---</option>
                    <option value="bulan" <?php if ($mode == "bulan") {echo "selected";} ?>> per- bulan</option>
                    <option value="tahun" <?php if ($mode == "tahun") {echo "selected";} ?>> per- tahun</option>
                  </select>
                </div>
                <div class="col-sm-3 col-xs-12">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> FIlter</button>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>

          <div class="box-body">
            <div class="chart">
              <?php if ($data != "kosong") { ?>
                <canvas id="barChart" style="height: 230px; width: 510px;" height="230" width="510"></canvas>
              <?php }else { ?>
                <center><h4 style="font-weight: 600;margin-bottom: 40px;">Data Tidak Ditemukan</h4></center>
              <?php } ?>
            </div>
          </div>
      </div>

    </div>

  </div>

  <div class="clearfix"></div>

  <div class="col-md-12" style="padding: 0px">
  <div class="span12 well well-sm">
    <h4 style="font-weight: bold">SIANTAR (SISTEM ABSENSI DAN PENCATATAN ANGGARAN) v1.0 oleh <a href="http://www.iainbengkulu.ac.id" target="_blank">Suparmaji</a></h4>
    <small>Penggunaan memory <strong>{memory_usage}</strong> dan  dimuat dalam <strong>{elapsed_time}</strong> detik</small>
  </div>
</div>

</section>
<!-- <//?php echo "<pre>"; 
  //print_r($this->session->userdata);
?> -->
