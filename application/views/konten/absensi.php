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
              <input type="text" class="form-control" name="nip" id="nip" placeholder="SIlahkan masukkan NIP anda" onkeyup="cek_nip();" maxlength="18" required="">
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
                <option id="cuti1">Cuti Tahunan</option>
                <option id="cuti2">Cuti Alasan Penting</option>
                <option id="cuti3">Cuti Sakit</option>
                <option id="cuti4">Cuti Besar</option>
                <option id="cuti5">Cuti Bersalin</option>
                <option id="cuti6">Cuti Luar Tanggungan negara</option>
                <option hidden="hidden" id="dinas1">Dinas Dalam Daerah</option>
                <option hidden="hidden" id="dinas2">Dinas Luar Daerah</option>
                <option hidden="hidden" id="dinas3">Dinas Dalam Kota</option>
                <option hidden="hidden" id="diklat1">Diklat Teknis</option>
                <option hidden="hidden" id="diklat2">Diklat Struktural</option>
                <option hidden="hidden" id="diklat3">Diklat Struktur</option>
                <option hidden="hidden" id="diklat4">Tugas Belajar</option>
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
              <label for="waktu">Tanggal Absen</label>
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
                    <td><?php echo date('d-m-Y', strtotime($d['waktu'])); ?></td>
                    <td><?php echo strtoupper($d['jenis_ket']); ?></td>
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

<div class="modal fade" id="ubah" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><h4>Ubah Data Absen</h4></h4>
            </div>
            <div class="modal-body">
               <form method="post" action="<?php echo site_url('admin/absensi/ubah');?>" class="form-horizontal" enctype="multipart/form-data">
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
                                      <option id="cuti12">Cuti Tahunan</option>
                                      <option id="cuti22">Cuti Alasan Penting</option>
                                      <option id="cuti32">Cuti Sakit</option>
                                      <option id="cuti42">Cuti Besar</option>
                                      <option id="cuti52">Cuti Bersalin</option>
                                      <option id="cuti62">Cuti Luar Tanggungan negara</option>
                                      <option hidden="hidden" id="dinas12">Dinas Dalam Daerah</option>
                                      <option hidden="hidden" id="dinas22">Dinas Luar Daerah</option>
                                      <option hidden="hidden" id="dinas32">Dinas Dalam Kota</option>
                                      <option hidden="hidden" id="diklat12">Diklat Teknis</option>
                                      <option hidden="hidden" id="diklat22">Diklat Struktural</option>
                                      <option hidden="hidden" id="diklat32">Diklat Struktur</option>
                                      <option hidden="hidden" id="diklat42">Tugas Belajar</option>
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
               <form method="post" action="<?php echo base_url('admin/absensi/hapus');?>" class="form-horizontal">
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