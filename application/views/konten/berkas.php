<?php $link = $this->uri->segment(1); ?>
<section class="content-header konten-h">
  <h1>
    Manajemen Berkas
    <small>Berikut ini adalah halaman manajemen data berkas </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Manajemen Berkas</li>
  </ol>
</section>

<?php 
echo $this->session->flashdata('notif');
echo $this->session->flashdata('notif1');
echo $this->session->flashdata('notif2'); 
?>

<section class="content" style="background: aliceblue;">
  <div class="row">

    <div class="col-xs-12">

      <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Data Berkas</h3>
            <a class="btn btn-success pull-right" href="<?php echo site_url('admin/berkas/add'); ?>"><i class="fa fa-plus"></i> Tambah Data</a>
          </div>

          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th width="10%">Tanggal</th>
                  <th>No Paspor</th>
                  <th>Nama</th>
                  <th>No Penerbangan</th>
                  <th>Kebangsaan</th>
                  <th>Permasalahan</th>
                  <th>Terminal</th>
                  <th>Foto</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>No Paspor</th>
                  <th>Nama</th>
                  <th>No Penerbangan</th>
                  <th>Kebangsaan</th>
                  <th>Permasalahan</th>
                  <th>Terminal</th>
                  <th>Foto</th>
                  <th class="text-center">Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

    </div>

  </div>

  <div class="clearfix"></div>
</section>

<div class="col-md-12" style="padding: 0px">
  <div class="span12 well well-sm">
    <h4 style="font-weight: bold">SIRIKA (Sistem Informasi Inventris Berkas) v1.0 oleh <a href="http://www.iainbengkulu.ac.id" target="_blank">Agum NtuhCelaluCetia</a></h4>
    <small>Penggunaan memory <strong>{memory_usage}</strong> dan  dimuat dalam <strong>{elapsed_time}</strong> detik</small>
  </div>
</div>

<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('#', 'class="form-horizontal"'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Berkas</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" style="margin-bottom: 0px;">
            <input type="hidden" name="id" id="id">
            <label for="tanggal" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;">Tanggal</label>
            <div class="col-sm-9">
              <label id="tanggal" class="control-label" style="text-transform: uppercase;"></label>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="no_paspor" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;">No Paspor</label>
            <div class="col-sm-9">
              <label id="no_paspor" class="control-label" style="text-transform: uppercase;"></label>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="nama" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;">Nama Penumpang</label>
            <div class="col-sm-9">
              <label id="nama" class="control-label" style="text-transform: uppercase;"></label>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="no_terbang" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;">No Penerbangan</label>
            <div class="col-sm-9">
              <label id="no_terbang" class="control-label" style="text-transform: uppercase;"></label>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="kebangsaan" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;">Kebangsaan</label>
            <div class="col-sm-9">
              <label id="kebangsaan" class="control-label" style="text-transform: uppercase;"></label>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="permasalahan" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;">Permasalahan</label>
            <div class="col-sm-9">
              <label id="permasalahan" class="control-label" style="text-transform: uppercase;"></label>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="terminal" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;">Terminal</label>
            <div class="col-sm-9">
              <label id="terminal" class="control-label" style="text-transform: uppercase;"></label>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="word" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;margin-bottom: 10px">Dokumen Word</label>
            <div class="col-sm-9" style="padding-top: 7px;">
              <a id="word" target="_blank" style="font-weight: 600;"></a>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="pdf" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;margin-bottom: 10px">Dokumen PDF</label>
            <div class="col-sm-9" style="padding-top: 7px;">
              <a id="pdf" target="_blank" style="font-weight: 600;"></a>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <label for="foto" class="col-sm-3 control-label" style="text-align: left;font-weight: normal;margin-bottom: 10px">Foto</label>
            <div class="col-sm-9" id="fotolist">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
        </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>