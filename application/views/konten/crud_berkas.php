<?php 
  $link = $this->uri->segment(3);

  if ($link == "add") {
    $header = "Tambah Data";
    $action = "do_add";
    $id = "";
    $tanggal = date('Y-m-d');
    $no_paspor ="";
    $kebangsaan = "";
    $permasalahan = "";
    $terminal = "";
    $foto0 = "";
    $n_foto = "";
    $word = "";
    $pdf = "";
    $nama = "";
    $no_terbang = "";
  }else if ($link == "edit") {
    $header = "Edit Data";
    $action = "do_edit";
    $id = $data[0]->id_berkas;
    $tanggal = date('Y-m-d', strtotime($data[0]->tanggal));
    $no_paspor = $data[0]->no_paspor;
    $kebangsaan = $data[0]->kebangsaan;
    $permasalahan = $data[0]->permasalahan;
    $terminal = $data[0]->terminal;
    $foto = unserialize($data[0]->foto);
    $foto0 = base_url('assets/dist/berkas/'.str_replace('.', '_thumb.', $foto[0]));
    $n_foto = sizeof($foto);
    $word = $data[0]->word;
    $pdf = $data[0]->pdf;
    $nama = $data[0]->nama;
    $no_terbang = $data[0]->no_terbang;
  }

?>
<?php 
echo $this->session->flashdata('notif');
echo $this->session->flashdata('notif1');
echo $this->session->flashdata('notif2'); 
?>
<section class="content-header konten-h">
  <h1>
    <?php echo $header; ?> Berkas
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="<?php echo site_url('admin/berkas'); ?>">Manajemen Berkas</a></li>
    <li class="active"><?php echo $header; ?></li>
  </ol>
</section>

<section class="content">
  <div class="row">

    <div class="col-xs-12">

      <div class="box box-success">
          <div class="box-header">
          </div>

          <div class="box-body">
            <?php echo form_open_multipart('admin/berkas/'.$action, 'class="form-horizontal"'); ?>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="tanggal" class="control-label col-sm-2">Tanggal </label>
                  <div class="col-sm-6">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <input type="date" class="form-control" name="tanggal" id="tanggal"" required="" value="<?php echo $tanggal; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_paspor" class="control-label col-sm-2">No Paspor </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_paspor" id="no_paspor" placeholder="Silahkan masukkan nomor paspor" required="" value="<?php echo $no_paspor; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="control-label col-sm-2">Nama Penumpang </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Silahkan masukkan nomor penumpang" required="" value="<?php echo $nama; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_terbang" class="control-label col-sm-2">No Penerbangan </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_terbang" id="no_terbang" placeholder="Silahkan masukkan nomor penerbangan" required="" value="<?php echo $no_terbang; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="kebangsaan" class="control-label col-sm-2">Kebangsaaan </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kebangsaan" id="kebangsaan" placeholder="Silahkan masukkan nama kebangsaan" required="" value="<?php echo $kebangsaan; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="permasalahan" class="control-label col-sm-2">Permasalahan </label>
                  <div class="col-sm-6">
                    <textarea name="permasalahan" id="permasalahan" class="form-control" placeholder="Silahkan masukkan permasalahan" rows="5"><?php echo $permasalahan; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="terminal" class="control-label col-sm-2">Terminal </label>
                  <div class="col-sm-6">
                    <select name="terminal" id="terminal" class="form-control">
                      <option <?php if ($terminal == '1') {echo "selected";} ?> value="1">Terminal 2 Keberangkatan</option>
                      <option <?php if ($terminal == '2') {echo "selected";} ?> value="2">Terminal 2 Kedatangan</option>
                      <option <?php if ($terminal == '3') {echo "selected";} ?> value="3">Terminal 3 Keberangkatan</option>
                      <option <?php if ($terminal == '4') {echo "selected";} ?> value="4">Terminal 3 Kedatangan</option>
                    </select>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="jenis_lk" class="control-label col-sm-2">Jenis Laporan Kejadian</label>
                  <div class="col-sm-6">
                    <select name="jenis_lk" id="jenis_lk" class="form-control">
                      <option <?php// if ($jenis_lk == '1') {echo "selected";} ?> value="1">Jenis 1 </option>
                      <option <?php// if ($jenis_lk == '2') {echo "selected";} ?> value="2">Jenis 2 </option>
                      <option <?php// if ($jenis_lk == '3') {echo "selected";} ?> value="3">Jenis 3 </option>
                      <option <?php// if ($jenis_lk == '4') {echo "selected";} ?> value="4">Jenis 4 </option>
                      <option <?php// if ($jenis_lk == '5') {echo "selected";} ?> value="4">Jenis 5 </option>
                    </select>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="word" class="control-label col-sm-2" style="padding-top: 0px;">Unggah File Word </label>
                  <div class="col-sm-6">
                    <label style="font-style: italic; font-size: 16px;font-weight: 600;color: black"><?php echo $word; ?></label>
                    <input type="hidden" name="word2" value="<?php echo $word; ?>">
                    <input type="file" class="form-control" name="word" id="word" placeholder="Silahkan masukkan file dengan format word" value="<?php echo $word; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="pdf" class="control-label col-sm-2" style="padding-top: 0px;">Unggah File Pdf </label>
                  <div class="col-sm-6">
                    <label style="font-style: italic; font-size: 16px;font-weight: 600;color: black"><?php echo $pdf; ?></label>
                    <input type="hidden" name="pdf2" value="<?php echo $pdf; ?>">
                    <input type="file" class="form-control" name="pdf" id="pdf" placeholder="Silahkan masukkan file dengan format pdf" value="<?php echo $pdf; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Unggah Foto</label>
                  <div class="col-sm-10" id="itemlist">
                    <input type="hidden" name="n_edit" id="n_edit" value="<?php echo $n_foto; ?>">

                  <div class="col-sm-3 col-xs-6" style="margin-right: 10px;">
                    <div class="form-group"><br>
                      <input type="file" id="foto[0]" name="foto[0]" onchange="PreviewImage('foto[0]','prevFoto[0]','#oldFoto0');">
                    </div>
                    <div class="form-group">
                      <?php if ($link == "edit") { ?>
                      <input type="hidden" name="oldFoto[]" id="oldFoto0" value="<?php echo $foto[0]; ?>"><?php } ?>
                      <img src="<?php echo $foto0; ?>" class="form-control" id="prevFoto[0]" style="height: 200px; width: 100%;" alt="Foto Galeri">
                    </div>
                  </div>

                  <?php if ($link == "edit") {
                    for ($i=1; $i <$n_foto ; $i++) { ?>

                      <div class="col-sm-3 col-xs-6" id="<?php echo 'finput'.$i; ?>" style="margin-right: 10px;"><br>
                        <div class="form-group">
                          <input type="file" id="<?php echo 'foto['.$i.']'; ?>" name="<?php echo 'foto['.$i.']'; ?>" onchange="PreviewImage('<?php echo "foto[".$i."]"; ?>','<?php echo "prevFoto[".$i."]"; ?>','<?php echo "#oldFoto".$i; ?>');">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="<?php echo 'oldFoto[]'; ?>" id="<?php echo 'oldFoto'.$i; ?>" value="<?php echo $foto[$i]; ?>">
                          <img src="<?php echo base_url('assets/dist/berkas/'.str_replace('.', '_thumb.', $foto[$i])); ?>" class="form-control" id="<?php echo 'prevFoto['.$i.']'; ?>" style="height: 200px; width: 100%;" alt="Foto Galeri">
                        </div><button class="btn btn-default btn-xs" type="button" onclick="hapus('#finput<?php echo $i; ?>');"><i class="fa fa-times"></i> Hapus</button>
                      </div>

                  <?php } } ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                    <button type="button" role="button" class="btn btn-warning" onclick="additem(); return false"><i class="fa fa-plus"></i> Tambah Foto</button>
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
    <h4 style="font-weight: bold">SILK (Sistem Informasi Inventaris Berkas) v1.0 oleh <a href="" target="_blank">Agum NtuhCelaluCetia</a></h4>
    <small>Penggunaan memory <strong>{memory_usage}</strong> dan  dimuat dalam <strong>{elapsed_time}</strong> detik</small>
  </div>
</div>