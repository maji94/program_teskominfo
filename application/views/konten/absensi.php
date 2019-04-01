<?php $link = $this->uri->segment(1); ?>
<section class="content-header konten-h">
  <h1>
    Absensi
    <small>Berikut ini adalah halaman absensi </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active"> Absensi</li>
  </ol>
</section>

<?php 
echo $this->session->flashdata('notif');
echo $this->session->flashdata('notif1');
echo $this->session->flashdata('notif2'); 
?>

<section class="content" style="background: aliceblue;">
  <div class="row">

    <div class="col-xs-4">

      <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Form Input Keterangan Kehadiran</h3>
          </div>

          <div class="box-body">
            <?php echo form_open('admin/absensi/add'); ?>
            <div class="form-group">
              <label for="nip">NIP</label>
              <input type="text" class="form-control" name="nip" id="nip" placeholder="SIlahkan masukkan NIP anda" onkeyup="cek_nip();">
              <span class="error" id="pesan_error"></span>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="SIlahkan masukkan nama anda">
            </div>
            <div class="form-group">
              <label for="tgl_mulai">Tanggal Mulai</label>
              <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
              <label for="tgl_selesai">Tanggal Selesai</label>
              <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
              <label for="jenis_ket">Jenis Keterangan</label>
              <select name="jenis_ket" id="jenis_ket" class="form-control" onchange="jenis_ket1();">
                <option value="cuti">CUTI</option>
                <option value="pendidikan">PENDIDIKAN</option>
                <option value="dinas">DINAS</option>
              </select>
            </div>
            <div class="form-group">
              <label for="sub_jenis">Sub Jenis Keterangan</label>
              <select name="sub_jenis" id="sub_jenis" class="form-control">
                <option value="0">-- Pilih ---</option>
                <option value="cuti1" id="cuti1">Cuti Tahunan</option>
                <option value="cuti2" id="cuti2">Cuti Alasan Penting</option>
                <option value="cuti3" id="cuti3">Cuti Sakit</option>
                <option value="cuti4" id="cuti4">Cuti Besar</option>
                <option value="cuti5" id="cuti5">Cuti Bersalin</option>
                <option value="cuti6" id="cuti6">Cuti Luar Tanggungan negara</option>
                <option hidden="hidden" value="dinas1" id="dinas1">Dinas Dalam Daerah</option>
                <option hidden="hidden" value="dinas2" id="dinas2">Dinas Luar Daerah</option>
                <option hidden="hidden" value="dinas3" id="dinas3">Dinas Dalam Kota</option>
                <option hidden="hidden" value="diklat1" id="diklat1">Diklat Teknis</option>
                <option hidden="hidden" value="diklat2" id="diklat2">Diklat Struktural</option>
                <option hidden="hidden" value="diklat3" id="diklat3">Diklat Struktur</option>
                <option hidden="hidden" value="diklat4" id="diklat4">Tugas Belajar</option>
              </select>
            </div>
            <div class="form-group">
              <label for="nomor">Nomor</label>
              <input type="text" class="form-control" name="nomor" id="nomor" placeholder="SIlahkan masukkan nomor cuti/belajar/tugas">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea style="display: block;width: 100%;" name="keterangan" id="keterangan" rows="5" placeholder="Keterangan tambahan"></textarea>
            </div>
            <div class="form-group">
              <label for="waktu">Tanggal Sekarang</label>
              <input type="date" readonly="" class="form-control" name="waktu" id="waktu" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;&nbsp;Simpan</button>
            </div>
            <?php echo form_close(); ?>
          </div>
      </div>

    </div>

    <div class="col-xs-8">
      <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Tabel Kehadiran</h3>
          </div>

          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Tanggal Absen</th>
                  <th>Jenis Keterangan</th>
                  <th>Sub Jenis</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($data as $d) { $no++;?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d['nip']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['waktu']; ?></td>
                    <td><?php echo $d['jenis_ket']; ?></td>
                    <td><?php echo $d['sub_jenis']; ?></td>
                    <td>
                      <button style="width: 100%;margin-bottom: 3px" class="btn btn-sm btn-success"
                            data-id="<?php echo $d['id']?>"
                            data-nip="<?php echo $d['nip']?>"
                            data-nama="<?php echo $d['nama']?>"
                            data-tgl_mulai="<?php echo $d['tgl_mulai']?>"
                            data-tgl_selesai="<?php echo $d['tgl_selesai']?>"
                            data-jenis_ket="<?php echo $d['jenis_ket']?>"
                            data-sub_jenis="<?php echo $d['sub_jenis']?>"
                            data-nomor="<?php echo $d['nomor']?>"
                            data-keterangan="<?php echo $d['keterangan']?>"
                            data-waktu="<?php echo $d['waktu']?>"
                            data-toggle="modal"
                            data-target="#ubah">                 
                        <i class="fa fa-pencil"></i> Ubah
                    </button>
                    <button style="width: 100%;" class="btn btn-sm btn-danger" data-id="<?php echo $d['id']?>"
                            data-nama="<?php echo $d['nama']?>" data-toggle="modal"
                            data-target="#hapus">
                            <i class="fa fa-trash"></i> Hapus
                    </button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>

  </div>

  <div class="clearfix"></div>
</section>

<div class="col-md-12" style="padding: 0px">
  <div class="span12 well well-sm">
    <h4 style="font-weight: bold">SIANTAR (SISTEM ABSENSI DAN PENCATATAN ANGGARAN) v1.0 oleh <a href="http://www.iainbengkulu.ac.id" target="_blank">Suparmaji</a></h4>
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

<div class="modal fade" id="ubah" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><h4>Ubah Data Absen</h4></h4>
            </div>
            <div class="modal-body">
               <form method="post" action="<?php echo base_url('absensi/ubah');?>" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="">


                    
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Tanggal Absen</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="waktu2" id="waktu2" value="">
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">NIP</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nip2" id="nip2" value="" readonly="">
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Nama</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nama2" id="nama2" value="">
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Tanggal Mulai</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="tgl_mulai2" id="tgl_mulai2" value="">
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Tanggal Selesai</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="tgl_selesai2" id="tgl_selesai2" value="">
                                </div>
                            </div>
                        </div>

                    
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="email_address_2">Jenis Keterangan</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                              <select name="jenis_ket2" id="jenis_ket2" class="form-control" onchange="jenis_kett();">
                                <option value="cuti">CUTI</option>
                                <option value="pendidikan">PENDIDIKAN</option>
                                <option value="dinas">DINAS</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Sub Jenis Keterangan</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="sub_jenis2" id="sub_jenis2" class="form-control">
                                      <option value="0">-- Pilih ---</option>
                                      <option value="cuti1" id="cuti12">Cuti Tahunan</option>
                                      <option value="cuti2" id="cuti22">Cuti Alasan Penting</option>
                                      <option value="cuti3" id="cuti32">Cuti Sakit</option>
                                      <option value="cuti4" id="cuti42">Cuti Besar</option>
                                      <option value="cuti5" id="cuti52">Cuti Bersalin</option>
                                      <option value="cuti6" id="cuti62">Cuti Luar Tanggungan negara</option>
                                      <option hidden="hidden" value="dinas12" id="dinas1">Dinas Dalam Daerah</option>
                                      <option hidden="hidden" value="dinas22" id="dinas2">Dinas Luar Daerah</option>
                                      <option hidden="hidden" value="dinas32" id="dinas3">Dinas Dalam Kota</option>
                                      <option hidden="hidden" value="diklat12" id="diklat1">Diklat Teknis</option>
                                      <option hidden="hidden" value="diklat22" id="diklat2">Diklat Struktural</option>
                                      <option hidden="hidden" value="diklat32" id="diklat3">Diklat Struktur</option>
                                      <option hidden="hidden" value="diklat42" id="diklat4">Tugas Belajar</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Nomor</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nomor2" id="nomor2" value="">
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Keterangan</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                  <textarea style="display: block;width: 100%;" name="keterangan2" id="keterangan2" rows="5" placeholder="Keterangan tambahan"></textarea>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Simpan" class="btn bg-blue">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><h4>Hapus Data Absen</h4></h4>
            </div>
            <div class="modal-body">
               <form method="post" action="<?php echo base_url('absensi/hapus');?>" class="form-horizontal">
                <div id="banner"></div>
                <input type="hidden" name="id" value="" id="id">
            </div>
            <div class="modal-footer">
                <input type="submit" value="Ya" class="btn bg-blue">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>