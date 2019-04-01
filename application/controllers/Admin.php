<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
		$this->cek = $this->session->userdata('logged_in');
		$this->set = $this->session->userdata('lvl_user');
		$this->id = $this->session->userdata('user');
		$this->nama = $this->session->userdata('nama');
		if (empty($this->cek)) {
			redirect(site_url());
		}
	}

	public function index()
	{
		redirect('admin/main');
	}

	public function test(){
		$tahun = date('Y') - 5;
		for ($i=1; $i <= 5 ; $i++) {
			$tahun++;
			$data[] = $this->m_admin->getDataBerkas(0,0,'tahun', $tahun);
			$tahun2[] = $tahun;
		}
		echo "<pre>";
		print_r($data);
		echo "<pre>";
		print_r($tahun2);
		// print_r(json_encode($data));
	}

	public function main(){
		// $terminal = $this->input->get('terminal');
		// $jenis_lk = null;
		// $mode = $this->input->get('mode');
		// $cekData =$this->m_admin->cekData($terminal, $jenis_lk, $mode);


		// if ($mode == 'bulan') {
		// 	$labels = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");		
		// 	if ($cekData) {
		// 		for ($i=1; $i <= 12 ; $i++) { 
		// 			$data[] = $this->m_admin->getDataBerkas($terminal, $jenis_lk, $mode,$i);
		// 		}
		// 	}else{
		// 		$data = "kosong";
		// 	}
		// }else {
		// 	$label = date('Y') - 5;
		// 	for ($i=1; $i <= 5 ; $i++) {
		// 		$label++;
		// 		$labels[] = $label;
		// 	}

		// 	if ($cekData) {
		// 		$tahun = date('Y') - 5;
		// 		for ($i=1; $i <= 5 ; $i++) {
		// 			$tahun++;
		// 			$data[] = $this->m_admin->getDataBerkas($terminal, $jenis_lk, $mode, $tahun);
		// 		}
		// 	}else {
		// 		$data = "kosong";
		// 	}
		// }

		$data = array(
			// 'terminal' => $terminal,
			// 'mode'	=> $mode,
			// 'labels' => $labels,
			// 'data' => $data,
			'page' => "konten/main_admin",
		);

		
		// echo "<pre>";
		// print_r($data);

		$this->load->view('dashboard/st_admin',$data);
	}

	public function cek_nip(){
		$nip = $_POST['nip'];
		// $nip = "admin";
		$cek = $this->m_admin->getAbsen($nip);

		$data = array(
			'nama'=> $cek[0]['nama'],
		);
		if (!$cek) {
			echo "1";
		}else {
			echo json_encode($data);
		}

		// echo "<pre>";
		// print_r($data);
	}

	public function absensi(){
		$link = $this->uri->segment(3);
		$tableName = "tb_absen";

		if ($link == "add") {
			$ins_data = array(
				'id' => "",
				'nip' => $this->input->post('nip'),
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'jenis_ket' => $this->input->post('jenis_ket'),
				'sub_jenis' => $this->input->post('sub_jenis'),
				'nomor' => $this->input->post('nomor'),
				'keterangan'	=> $this->input->post('keterangan'),
				'waktu' => $this->input->post('waktu'),
			);

			$res = $this->m_admin->InsertData($tableName, $ins_data);
				if ($res) {
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Sukses</h4>Data berhasil disimpan.</div></section>');
					redirect('admin/absensi');
				}else{
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Data gagal disimpan.</div></section>');
					redirect('admin/absensi');
				}
		}else if ($link == "ubah") {
			$where = array('id' => $id);
			$ins_data = array(
				'nip' => $this->input->post('nip'),
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'jenis_ket' => $this->input->post('jenis_ket'),
				'sub_jenis' => $this->input->post('sub_jenis'),
				'nomor' => $this->input->post('nomor'),
				'keterangan'	=> $this->input->post('keterangan'),
				'waktu' => $this->input->post('waktu'),
			);

			$res = $this->m_admin->UpdateData($tableName, $upd_data, $where);
				if ($res) {
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Sukses</h4>Data berhasil disimpan.</div></section>');
					redirect('admin/absensi');
				}else{
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Data gagal disimpan.</div></section>');
					redirect('admin/absensi');
				}
		}

		$data = array(
			'data' => $this->m_admin->getAbsen(),
			'page' => "konten/absensi",
		);
		$this->load->view('dashboard/st_admin',$data);	
	}

	public function ajax_list(){
		$list = $this->m_admin->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $s) {
			$fotounserial = unserialize($s->foto);
			$n_foto = sizeof($fotounserial);
			$datafoto = "";
			$datafoto2 ="";

			if ($s->terminal == 1) {
				$terminal = "Terminal 2 Keberangkatan";
			}else if ($s->terminal == 2) {
				$terminal = "Terminal 2 Kedatangan";
			}else if ($s->terminal == 3) {
				$terminal = "Terminal 3 Keberangkatan";
			}else if ($s->terminal == 4) {
				$terminal = "Terminal 3 Kedatangan";
			}

			for ($i=0; $i < $n_foto ; $i++) { 
				$datafoto = $datafoto."data-foto".$i."='".str_replace('.', '_thumb.', $fotounserial[$i])."' ";
				$datafoto2 = $datafoto2."data-lfoto".$i."='".$fotounserial[$i]."' ";
			}
			// echo "<pre>";
			// print_r($datafoto);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-M-Y', strtotime($s->tanggal));
			$row[] = $s->no_paspor;
			$row[] = $s->nama;
			$row[] = $s->no_terbang;
			$row[] = $s->kebangsaan;
			$row[] = $s->permasalahan;
			$row[] = $terminal;
			$row[] = "<img = src='".base_url('assets/dist/berkas/'.str_replace('.', '_thumb.', unserialize($s->foto)[0]))."' style='width:150px;height:auto;'>";
			$row[] = "
			<a href='".site_url('admin/berkas/edit/'.$s->id_berkas)."' style='width: 80px;margin-bottom: 3px;display: block;text-align: left;' class='btn btn-warning btn-xs' onclick='return confirm(\"Data ini akan berubah. Lanjutkan ?\");'><i class='fa fa-pencil'></i> | Ubah</a>
	    <a class='open-AddBookDialog btn btn-info btn-xs' title='Lihat pesan'
	      data-target='#myModal2' data-toggle='modal' 
	      data-id='".$s->id_berkas."'
	      data-tanggal='".date('d F Y', strtotime($s->tanggal))."'
	      data-no_paspor='".$s->no_paspor."'
	      data-kebangsaan='".$s->kebangsaan."'
	      data-permasalahan='".$s->permasalahan."'
	      data-terminal='".$terminal."'
	      data-word='".$s->word."'
	      data-pdf='".$s->pdf."'
	      data-no_terbang='".$s->no_terbang."'
	      data-nama='".$s->nama."'".$datafoto." ".$datafoto2."
	      data-nfoto='".$n_foto."'
	      style='width: 80px;margin-bottom: 3px;display: block;text-align: left;'><i class='fa fa-search'></i> &nbsp; Lihat</a>
			<a href='".site_url('admin/berkas/delete/'.$s->id_berkas)."' style='width: 80px;margin-bottom: 3px;display: block;text-align: left;' class='btn btn-danger btn-xs' onclick='return confirm(\"Data ini akan terhapus. Lanjutkan ?\");'><i class='fa fa-trash'></i> | Hapus</a>";

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->m_admin->count_all(),
			"recordsFiltered" => $this->m_admin->count_filtered(),
			"data" => $data,
		);
      //output to json format
		echo json_encode($output);
	}

	public function berkas(){
		$link = $this->uri->segment(3);
		$link2 = $this->uri->segment(4);
		$tableName = "tb_berkas";


		if(!isset($_SESSION['logged_in'])){
			redirect('login');
		}else{
			if ($link == "add") {
				$data = array(
					'page' => "konten/crud_berkas",
				);
			}else if ($link == "do_add") {
				$path = './assets/dist/berkas/';
				$config['upload_path']		= $path;
				$config['allowed_types']	= 'jpeg|jpg|png|bmp|docx|doc|pdf';
				$config['max_size']				= '50000';
				$config['file_name']			= time();
				$this->load->library('upload', $config);

				$thumb['image_library']  = 'gd2';
        $thumb['create_thumb']   = TRUE;
        $thumb['maintain_ratio'] = TRUE;
        $thumb['width']          = 300;
        $thumb['height']         = 300;

				$ins_data = array(
					'id_berkas' => "",
					'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
					'no_paspor' => $this->input->post('no_paspor'),
					'nama' => $this->input->post('nama'),
					'no_terbang' => $this->input->post('no_terbang'),
					'kebangsaan'	=> $this->input->post('kebangsaan'),
					'permasalahan' => $this->input->post('permasalahan'),
					'terminal' => $this->input->post('terminal'),
				);

        if(! $this->upload->do_upload('word')){
        	$error = array('error' => $this->upload->display_errors());
					$pesan = $error['error'];
					
					$this->session->set_flashdata('notif1','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Data Dokumen Word gagal disimpan.<br>'.$pesan.'</div></section>');
					redirect('admin/berkas/add');
				}else{
					$ins_data['word'] = $this->upload->file_name;
				}

			  if(! $this->upload->do_upload('pdf')){
					$error = array('error' => $this->upload->display_errors());
					$pesan = $error['error'];
					
					$this->session->set_flashdata('notif2','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan !</h4>Data Dokumen PDF gagal disimpan.<br>'.$pesan.'</div></section>');
					redirect('admin/berkas/add');
				}else{
					$ins_data['pdf'] = $this->upload->file_name;
				}

				$input = sizeof($_FILES['foto']['tmp_name']);
				$files = array(
					'name'     => array_values($_FILES['foto']['name']),
					'type'     => array_values($_FILES['foto']['type']),
					'tmp_name' => array_values($_FILES['foto']['tmp_name']),
					'error'    => array_values($_FILES['foto']['error']),
					'size'     => array_values($_FILES['foto']['size']),
				);
				for ($i=0; $i < $input ; $i++) {
	      	$_FILES['foto']['name'] = $files['name'][$i];
	      	$_FILES['foto']['type'] = $files['type'][$i];
	      	$_FILES['foto']['tmp_name'] = $files['tmp_name'][$i];
	      	$_FILES['foto']['error'] = $files['error'][$i];
	      	$_FILES['foto']['size'] = $files['size'][$i];
          
	      	$this->upload->do_upload('foto');

	        $thumb['source_image']   = 'assets/dist/berkas/'.$this->upload->file_name;
          $this->load->library('image_lib');
          $this->image_lib->initialize($thumb);
          $this->image_lib->resize();

	      	$foto[] = $this->upload->file_name;
				}

				$ins_data['foto'] = serialize($foto);

				$res = $this->m_admin->InsertData($tableName, $ins_data);
				if ($res) {
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Sukses</h4>Data berhasil disimpan.</div></section>');
					redirect('admin/berkas/all');
				}else{
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Data gagal disimpan.</div></section>');
					redirect('admin/berkas/all');
				}
			}else if ($link == "edit") {
				$data = array(
					'data' => $this->m_admin->getId('*',$tableName,'id_berkas', $link2),
					'page' => "konten/crud_berkas",
				);
			}else if ($link == "do_edit") {
				$path = './assets/dist/berkas/';
				$config['upload_path']		= $path;
				$config['allowed_types']	= 'jpeg|jpg|png|bmp|docx|doc|pdf';
				$config['max_size']				= '50000';
				$config['file_name']			= time();
				$this->load->library('upload', $config);

				$thumb['image_library']  = 'gd2';
        $thumb['create_thumb']   = TRUE;
        $thumb['maintain_ratio'] = TRUE;
        $thumb['width']          = 300;
        $thumb['height']         = 300;

				$id = $this->input->post('id');
				$where = array('id_berkas' => $id);

				$getData = $this->m_admin->getContent($tableName, $where);
				$getFoto = unserialize($getData[0]->foto);
				$n_getFoto = sizeof($getFoto);

	      $upd_data = array(
					'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
					'no_paspor' => $this->input->post('no_paspor'),
					'nama' => $this->input->post('nama'),
					'no_terbang' => $this->input->post('no_terbang'),
					'kebangsaan'	=> $this->input->post('kebangsaan'),
					'permasalahan' => $this->input->post('permasalahan'),
					'terminal' => $this->input->post('terminal'),
	      );


				if ($_FILES['word']['name'] == "") {
					$upd_data['word'] = $this->input->post('word2');
				}else {
					if(! $this->upload->do_upload('word')){
	        	$error = array('error' => $this->upload->display_errors());
						$pesan = $error['error'];
						
						$this->session->set_flashdata('notif1','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Data Dokumen Word gagal disimpan.<br>'.$pesan.'</div></section>');
						redirect('admin/berkas/edit/'.$id);
					}else{
						$upd_data['word'] = $this->upload->file_name;
						unlink($path.$this->input->post('word2'));
					}
				}

			  if ($_FILES['pdf']['name'] == "") {
					$upd_data['pdf'] = $this->input->post('pdf2');
				}else {
				  if(! $this->upload->do_upload('pdf')){
						$error = array('error' => $this->upload->display_errors());
						$pesan = $error['error'];
						
						$this->session->set_flashdata('notif2','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan !</h4>Data Dokumen PDF gagal disimpan.<br>'.$pesan.'</div></section>');
						redirect('admin/berkas/edit/'.$id);
					}else{
						$upd_data['pdf'] = $this->upload->file_name;
						unlink($path.$this->input->post('pdf2'));
					}
				}

				$input = sizeof($_FILES['foto']['tmp_name']);
				$files = array(
					'name' => array_values($_FILES['foto']['name']),
					'type' => array_values($_FILES['foto']['type']),
					'tmp_name' => array_values($_FILES['foto']['tmp_name']),
					'error' => array_values($_FILES['foto']['error']),
					'size' => array_values($_FILES['foto']['size']),
				);

				for ($i=0; $i < $input ; $i++) {
	      	$_FILES['foto']['name'] = $files['name'][$i];
	      	$_FILES['foto']['type'] = $files['type'][$i];
	      	$_FILES['foto']['tmp_name'] = $files['tmp_name'][$i];
	      	$_FILES['foto']['error'] = $files['error'][$i];
	      	$_FILES['foto']['size'] = $files['size'][$i];
          
          if ($_FILES['foto']['name']) {
          	$this->upload->do_upload('foto');
		      	$foto[] = $this->upload->file_name;
          }else{
          	$foto[] = $getFoto[$i];
          }
	      	
	        $thumb['source_image'] = 'assets/dist/berkas/'.$this->upload->file_name;
          $this->load->library('image_lib');
          $this->image_lib->initialize($thumb);
          $this->image_lib->resize();

	      }

	      $upd_data ['foto'] = serialize($foto);

				for ($i=0; $i < $n_getFoto ; $i++) { 
					if ($foto[$i] != $getFoto[$i] ) {
						unlink($path.$getFoto[$i]);
						unlink($path.str_replace('.', '_thumb.', $getFoto[$i]));
					}
				}

				$res = $this->m_admin->UpdateData($tableName, $upd_data, $where);
				if ($res) {
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Sukses</h4>Data berhasil disimpan.</div></section>');
					redirect('admin/berkas/all');
				}else{
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Data gagal disimpan.</div></section>');
					redirect('admin/berkas/all');
				}
			}else if ($link == "delete") {
				$path = './assets/dist/berkas/';
				$where = array('id_berkas' => $link2);

				$filefoto = $this->m_admin->getContent($tableName, $where);
				$konten = unserialize($filefoto[0]->foto);
				$n = sizeof($konten);
				for ($i=0; $i < $n ; $i++) { 
					unlink($path.$konten[$i]);
					unlink($path.str_replace('.', '_thumb.', $konten[$i]));
				}

				unlink($path.$filefoto[0]->word);
				unlink($path.$filefoto[0]->pdf);

				$res = $this->m_admin->DeleteData($tableName, $where);
				if ($res) {
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Sukses</h4>Data berhasil dihapus.</div></section>');
					redirect('admin/berkas/all');
				}
				else{
					$this->session->set_flashdata('notif','<section class="content" style="min-height: auto;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Data gagal dihapus.</div></section>');
					redirect('admin/berkas/all');
				}
			}else{
				$data = array(
					'data' => $this->m_admin->getBerkas(),
					'page' => "konten/berkas",
				);	
			}
		}

		$this->load->view('dashboard/st_admin',$data);
	}

	public function check_user(){
		$kode = $_POST['username'];
		$cek = $this->m_admin->getUsername($kode);
		if (count($cek)!=0) {
			echo "1";
		}else {
			echo "2";
		}
	}

	public function cek_status_password(){
      $password = md5($_POST['psw_lama']);
      $hasil_password = $this->m_admin->cek_password($this->id, $password);
      if(count($hasil_password)!=0){
          echo "1";
      }else{
          echo "2";
      }    
  }

	public function getId($select,$tabelName,$field,$value){
		$id = $this->m_admin->getId($select,$tabelName,$field,$value);
		// echo "<pre>";
		// print_r($id);
		return $id[0]->$select;
	}
		
	public function ubah_psw(){
		$konfir = md5(mysql_real_escape_string($this->input->post('konfir')));
		$data = array('password' => $konfir,);
		$where = array('id_user' => $this->session->userdata('user'));
		$update = $this->m_admin->UpdateData('tb_user',$data,$where);
		if ($update) {
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin');
		}else{
			$this->session->set_flashdata('notif','<div class="alert alert-block alert-danger " role="alert"> Data gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin');
		}
	}

	public function randpass(){
    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $len 		= strlen($string);
    $pass 	= '';
    
    for($i=1;$i<=8; $i++){
        $start = rand(0, $len);
        $pass .= substr($string, $start, 1);
    }
    return $pass;
	}

	public function reset_pass(){
		$id 			= $_GET['id_usr'];
		$generate = $this->randpass();
		$passBaru = md5($generate);
		$data_u 	= array('password' => $passBaru,);
		$where_u 	= array('id_user' => $id);

		$upd_u = $this->m_admin->UpdateData('tb_user',$data_u,$where_u);
		if ($upd_u) {
			$data = array('pass'=>$generate);
			echo json_encode($data);
		}else{
			echo json_encode("error");
		}
	}
}
