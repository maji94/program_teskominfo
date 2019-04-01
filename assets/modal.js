$("<audio id='chatAudio'><source src='"+baseasset+"assets/sound/notifikasi.ogg' type='audio/ogg'><source src="+baseasset+"assets/sound/notifikasi.mp3' type='audio/mpeg'><source src="+baseasset+"assets/sound/notifikasi.wav' type='audio/wav'></audio>").appendTo('body');

setInterval(function(){
// $('#chatAudio')[0].play();
$(".jml_notif1").load(baseurl+'load_row1')}, 5000);

setInterval(function(){
$(".jml_notif2").load(baseurl+'load_row2')}, 5000);

setInterval(function(){
$(".jml_notif3").load(baseurl+'load_row3')}, 5000);

setInterval(function(){
$(".jml_notif4").load(baseurl+'load_row4')}, 5000);

setInterval(function(){
$(".sign_notif").load(baseurl+'load_row5')}, 5000);

$('.textarea').wysihtml5();

$(document).on("click", ".open-AddBookDialog", function(){
  var id = $(this).data('id');
      $(".modal-body #idx").val(id);
  var filemasuk = $(this).data('file');
      $(".modal-body #filemasuk").attr("src",baseasset+'assets/dist/img/suratmasuk/'+filemasuk);
  var filekeluar = $(this).data('file');
      $(".modal-body #filekeluar").attr("src",baseasset+'assets/dist/img/suratkeluar/'+filekeluar);
  var nama = $(this).data('nama');
      $(".modal-body #namax").html('nama');
});

$(document).on("click", ".open-AddBookDialog2", function(){
  var id = $(this).data('id');
      $(".modal-body #id_ok").val(id);
});

$(document).on("click", ".ubah-SuratMasuk", function () {
  var Id = $(this).data('id');
      $(".modal-body #id").val( Id );

  var no_agenda = $(this).data('no_agenda');
      $(".modal-body #no_agenda").val(no_agenda);

  var no_surat = $(this).data('no_surat');
      $(".modal-body #no_surat").val(no_surat);

  var nm_surat = $(this).data('nm_surat');
      $(".modal-body #nm_surat").val(nm_surat);

  var tgl_surat = $(this).data('tgl_surat');
      $(".modal-body #tgl_surat").val(tgl_surat);

  var sifatsurat = $(this).data('sifatsurat');
      $(".modal-body #sifatsurat").val(sifatsurat);

  var asal_surat = $(this).data('asal_surat');
      $(".modal-body #asal_surat").val(asal_surat);

  var tujuan = $(this).data('tujuan');
      $(".modal-body #tujuan").val(tujuan);

  var perihal = $(this).data('perihal');
      $(".modal-body #perihal").val(perihal);

  var pesan = $(this).data('pesan');
      $(".modal-body #pesan").val(pesan);

  var sifatsurat = $(this).data('sifatsurat');
      $(".modal-body #sifatsurat").val(sifatsurat);

  var lampiran_lama = $(this).data('lampiran_lama');
      $(".modal-body #lampiran_lama").val(lampiran_lama);

  var lampiran = $(this).data('lampiran');
      $(".modal-body #lampiran").val(lampiran);
});

$(document).on("click", ".ubah-DisposisiMasuk", function () {
  var Id = $(this).data('id');
      $(".modal-body #id").val( Id );

  var kepada = $(this).data('kepada');
      $(".modal-body #kepada").val(kepada);

  var isi = $(this).data('isi');
      $(".modal-body #isi").val(isi);

  var sifat = $(this).data('sifat');
      $(".modal-body #sifat").val(sifat);

  var idsurat = $(this).data('idsurat');
      $(".modal-body #ids").val( idsurat );
});

$(document).on("click", ".open-EditDataSuratKeluar", function(){
  var id = $(this).data('id');
    $(".modal-body #idy").val(id);
  var noagenda = $(this).data('noagenda');
    $(".modal-body #noagenda").val(noagenda);
  var nosurat = $(this).data('nosurat');
    $(".modal-body #nosurat").val(nosurat);
  var tglsurat = $(this).data('tglsurat');
    $(".modal-body #tglsurat").val(tglsurat);
  var tujuan = $(this).data('tujuan');
    $(".modal-body #tujuan").val(tujuan);
  var jenis = $(this).data('jenis');
    $(".modal-body #jenis").val(jenis);
  var perihal = $(this).data('perihal');
    $(".modal-body #perihal").val(perihal);
  var pesan = $(this).data('pesan');
    $(".modal-body #pesan").val(pesan);
});

$(document).on("click", ".open-AddBookDialog", function () {
  var Id = $(this).data('id');
      $(".modal-body #id").val( Id );
  var nama = $(this).data('nama');
      $(".modal-body #nama").val(nama);
  var nopegawai = $(this).data('nopegawai');
      $(".modal-body #nopegawai").val(nopegawai);
  var jabatan = $(this).data('jabatan');
      $(".modal-body #jabatan").val(jabatan);
  var nohp = $(this).data('nohp');
      $(".modal-body #nohp").val(nohp);
  var foto = $(this).data('foto');
      $(".modal-body #foto").val(foto);
});

$(document).on("click", ".open-EditDataPegawai", function () {
  var id_pgw = $(this).data('id_pgw');
      $(".modal-body #id_pgw").val( id_pgw );
  var id_usr = $(this).data('id_usr');
      $(".modal-body #id_usr").val( id_usr );
      if (id_usr == 1 || id_usr == 65) {
        $(".modal-body #ubhJabatan").attr("hidden",'hidden');
      }else{
        $(".modal-body #ubhJabatan").removeAttr("hidden");
      }
  var user = $(this).data('user');
      $(".modal-body #user").val( user );
  var foto = $(this).data('foto');
      $(".modal-body #fotoLama").val( foto );
  var nama = $(this).data('nama');
      $(".modal-body #nama").val(nama);
  var nip = $(this).data('nip');
      $(".modal-body #nip").val(nip);
  var jabatan = $(this).data('jabatan');
      $(".modal-body #jabatan").val(jabatan);
  var src = $(this).data('srcfoto');
      $(".modal-body #prevubah").attr("src",src);
  var status = $(this).data('status');
      if (status == "aktif") {
        document.getElementById("status").options.selectedIndex = 0;
      }else{
        document.getElementById("status").options.selectedIndex = 1;
      }
});

function PreviewImage(upload,uploadPreview) {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById(upload).files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById(uploadPreview).src = oFREvent.target.result;
  }
}

function cek_nomor(){
  var nomor = $("#no_surat").val();
  $.ajax({
    url: baseurl+"check_nomor",
    data: 'no_surat='+nomor,
    type: "POST",
    success: function(msg){
      if(msg==1){
        alert('Nomor surat telah terdata');
        $("#no_surat").val('');
      }
    }
  });
}

function check_user() {
  var user = $("#username").val();
  if (user=="") {
    $("#pesan_username").css("color","#fc5d32");
    $("#username").css("border-color","#fc5d32");
    $("#pesan_username").html("Silahkan masukkan Username");
  }else{
    $.ajax({
        url: baseurl+"admin/check_user",
        data: 'username='+user,
        type: "POST",
        success: function(msg){
            if(msg==1){
                $("#pesan_username").css("color","#fc5d32");
                $("#username").css("border-color","#fc5d32");
                $("#pesan_username").html("Username sudah digunakan");
            }else{
                $("#pesan_username").css("color","#59c113");
                $("#username").css("border-color","#59c113");
                $("#pesan_username").html("Username valid dan dapat digunakan");
            }
            $("#pesan_username").fadeIn(5000);
        }
    });
  }
}

function cek_password(){
    $("#pesan_password").hide();
    var error=0;
    var password = $("#psw_lama").val();

    if(password == ""){
        $("#pesan_password").css('color','#fc5d32');
        $("#psw_lama").css('border-color','#fc5d32');
        $("#pesan_password").html('Maaf password tidak boleh kosong');
        $("#pesan_password").fadeIn(1000);
        error=1;
    }else{
        $.ajax({
            url: baseurl+"cek_status_password/", //arahkan pada submit di controller register
            data: 'psw_lama='+password,
            type: "POST",
            success: function(msg){
                if(msg==1){
                    $("#pesan_password").css("color","#59c113");
                    $("#psw_lama").css("border-color","#59c113");
                    $("#pesan_password").html("Password lama valid");
                    error=0

                }else{
                    $("#pesan_password").css("color","#fc5d32");
                    $("#psw_lama").css("border-color","#fc5d32");
                    $("#pesan_password").html("Password lama tidak valid");
                    error=1;
                }

                $("#pesan_password").fadeIn(1000);
            }
        });
    }
}

function cek_kofirm(){
  var passBaru = $('#psw_baru').val();
  var konfir = $('#konfir').val();
  var error=0;

  if (konfir == "") {
    $("#pesan_konfir").css('color','#fc5d32');
    $("#konfir").css('border-color','#fc5d32');
    $("#pesan_konfir").html('Konfirmasi password tidak boleh kosong');
    $("#pesan_konfir").fadeIn(1000);
    error=1;
  }else{
    if(konfir != passBaru){
        $("#pesan_konfir").css('color','#fc5d32');
        $("#konfir").css('border-color','#fc5d32');
        $("#pesan_konfir").html('Maaf Konfirmasi password tidak valid');
        $("#pesan_konfir").fadeIn(1000);
        error=1;
    }else{
        $("#pesan_konfir").css("color","#59c113");
        $("#konfir").css("border-color","#59c113");
        $("#pesan_konfir").html("Konfirmasi password valid");
        $("#pesan_konfir").fadeIn(1000);
        error=0
    }
  }
}

function cek_submit(){
  var passLama = $('#psw_lama').val();
  var passBaru = $('#psw_baru').val();
  var konfir = $('#konfir').val();
  var error=0;

  if(passLama == ""){
    $("#pesan_password").css('color','#fc5d32');
    $("#psw_lama").css('border-color','#fc5d32');
    $("#pesan_password").html('Maaf password tidak boleh kosong');
    $("#pesan_password").fadeIn(1000);
    error=1;
  }else{
    $.ajax({
      url: baseurl+"cek_status_password/", //arahkan pada submit di controller register
      data: 'psw_lama='+passLama,
      type: "POST",
      success: function(msg){
        if(msg==1){
          $("#pesan_password").css("color","#59c113");
          $("#psw_lama").css("border-color","#59c113");
          $("#pesan_password").html("Password lama valid");
          error=0;
        }else{
          $("#pesan_password").css("color","#fc5d32");
          $("#psw_lama").css("border-color","#fc5d32");
          $("#pesan_password").html("Password lama tidak valid");
          error=1
        }
        $("#pesan_password").fadeIn(1000);
      }
    });
  }

  if (error==1 || konfir!=passBaru || konfir=="" && passBaru=="") {
    alert('Data harus diisi dan valid');
    return false;
  }
}

function randomPassword() {
  var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  var pass = "";
  for (var x = 0; x < 8; x++) {
    var i = Math.floor(Math.random() * chars.length);
    pass += chars.charAt(i);
  }
  return pass;
}

function gen_pass() {
  $("#pass1").val(randomPassword());
}

function resetPassword(){
  var id = $("#id_usr").val();
  var json ='';

  var pilihan=confirm("Apakah anda yakin ingin mereset password ?");
    if (pilihan) {
      $.ajax({
        url: baseurl+'reset_pass/',
        data: "id_usr="+id,
      }).success(function(data){
          if (data == '"error"') {
            alert('Reset password error !');
          }else {
            json = data,
            obj = JSON.parse(json);
            alert('Reset password sukses,<b> '+obj.pass+' </b>adalah password yang baru.');
          }
      });
    }else{
      return false;
    }
}

function buat_surat() {
  var surat = $('#jsurat').val();
  if (surat == '0') {
    $("#s_diposisi").fadeOut(500);
    $("#s_telahaan").fadeOut(500);
    $("#s_lembar_diposisi").fadeOut(500);
    $("#s_nota_dinas").fadeOut(500);
    $("#s_melaksanakan_tugas").fadeOut(500);
    $("#s_undangan").fadeOut(500);
    $("#s_perjalanan_dinas").fadeOut(500);
    $("#s_perintah_tugas").fadeOut(500);
    $("#s_perintah").fadeOut(500);
    $("#s_ntah").fadeOut(500);
  } else if (surat == '1') {
    $("#s_diposisi").fadeOut(500);
    $("#s_telahaan").fadeOut(500);
    $("#s_lembar_diposisi").fadeOut(500);
    $("#s_nota_dinas").fadeOut(500);
    $("#s_melaksanakan_tugas").fadeOut(500);
    $("#s_undangan").fadeOut(500);
    $("#s_perjalanan_dinas").fadeOut(500);
    $("#s_perintah_tugas").fadeIn(500);
    $("#s_perintah").fadeOut(500);
    $("#s_ntah").fadeOut(500);
  } else if (surat == '2') {
    $("#s_diposisi").fadeOut(500);
    $("#s_telahaan").fadeOut(500);
    $("#s_lembar_diposisi").fadeOut(500);
    $("#s_nota_dinas").fadeOut(500);
    $("#s_melaksanakan_tugas").fadeOut(500);
    $("#s_undangan").fadeIn(500);
    $("#s_perjalanan_dinas").fadeOut(500);
    $("#s_perintah_tugas").fadeOut(500);
    $("#s_perintah").fadeOut(500);
    $("#s_ntah").fadeOut(500);
  } else if (surat == '3') {
    $("#s_diposisi").fadeOut(500);
    $("#s_telahaan").fadeOut(500);
    $("#s_lembar_diposisi").fadeOut(500);
    $("#s_nota_dinas").fadeOut(500);
    $("#s_melaksanakan_tugas").fadeOut(500);
    $("#s_undangan").fadeOut(500);
    $("#s_perjalanan_dinas").fadeIn(500);
    $("#s_perintah_tugas").fadeOut(500);
    $("#s_perintah").fadeOut(500);
    $("#s_ntah").fadeOut(500);
  } else if (surat == '4') {
    $("#s_diposisi").fadeOut(500);
    $("#s_telahaan").fadeOut(500);
    $("#s_lembar_diposisi").fadeOut(500);
    $("#s_nota_dinas").fadeOut(500);
    $("#s_melaksanakan_tugas").fadeOut(500);
    $("#s_undangan").fadeOut(500);
    $("#s_perjalanan_dinas").fadeOut(500);
    $("#s_perintah_tugas").fadeOut(500);
    $("#s_perintah").fadeIn(500);
    $("#s_ntah").fadeOut(500);
  } else if (surat == '5') {
    $("#s_diposisi").fadeOut(500);
    $("#s_telahaan").fadeOut(500);
    $("#s_lembar_diposisi").fadeOut(500);
    $("#s_nota_dinas").fadeOut(500);
    $("#s_melaksanakan_tugas").fadeIn(500);
    $("#s_undangan").fadeOut(500);
    $("#s_perjalanan_dinas").fadeOut(500);
    $("#s_perintah_tugas").fadeOut(500);
    $("#s_perintah").fadeOut(500);
    $("#s_ntah").fadeOut(500);
  } else if (surat == '6') {
    $("#s_diposisi").fadeOut(500);
    $("#s_telahaan").fadeOut(500);
    $("#s_lembar_diposisi").fadeOut(500);
    $("#s_nota_dinas").fadeIn(500);
    $("#s_melaksanakan_tugas").fadeOut(500);
    $("#s_undangan").fadeOut(500);
    $("#s_perjalanan_dinas").fadeOut(500);
    $("#s_perintah_tugas").fadeOut(500);
    $("#s_perintah").fadeOut(500);
    $("#s_ntah").fadeOut(500);
  }else{
    alert('error');
  }
}

function lacak_surat(){
  // var el = document.getElementById('kotak-lacak').removeAttribute('hidden');
  // return false;
  var opsi_bank = $('#btn-lacak').val();
  if (opsi_bank == 'lacak') {
      $("#kotak-lacak").fadeIn(500);
  }
}

function lacak_surat_2(){
  // var el = document.getElementById('kotak-lacak').removeAttribute('hidden');
  // return false;
  var opsi_bank = $('#btn-lacak').val();
  if (opsi_bank == 'lacak') {
      $("#kotak-lacak").fadeOut(500);
  }
}