<section class="content-header konten-h">
  <h1>
    Rekap Data Dokumen
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Rekap Data</li>
  </ol>
</section>

<section class="content">
  <div class="row">

    <div class="col-xs-12">

      <div class="box box-success">
          <div class="box-header">
          </div>

          <div class="box-body">
            <?php echo form_open_multipart('admin/rekap/cetak/', 'class="form-horizontal" method="get" target="_blank"'); ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kode" class="control-label col-sm-3">Dari Tanggal </label>
                  <div class="col-sm-9">
                    <input type="date" name="tgl_start" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="kode" class="control-label col-sm-3">Sampai Tanggal </label>
                  <div class="col-sm-9">
                    <input type="date" name="tgl_end" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;&nbsp;Simpan</button>
                  </div>
                </div>
              </div>
            <?php echo form_close();; ?>
          </div>
        </div>

    </div>

  </div>

  <div class="clearfix"></div>
</section>

<div class="col-md-12" style="padding: 0px">
  <div class="span12 well well-sm">
    <h4 style="font-weight: bold">SILK (Sistem Informasi Laporan Keuangan) v1.0 oleh <a href="http://www.iainbengkulu.ac.id" target="_blank">IAIN Bengkulu</a></h4>
    <small>Penggunaan memory <strong>{memory_usage}</strong> dan  dimuat dalam <strong>{elapsed_time}</strong> detik</small>
  </div>
</div>