<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

  public function do_login($nip,$psw){
    $u = addslashes($nip);
    $p = md5(addslashes($psw));

    $user = $this->db->get_where('tb_user',array('username' => $u, 'password' => $p));
    if (count($user->result())>0) {
      foreach ($user->result() as $qad) {
        $sess_data['logged_in']   = 'yes';
        $sess_data['lvl_user']    = $qad->level;
        $sess_data['id']     = $qad->id;
        $sess_data['id_user']     = $qad->username;
        $sess_data['ctr']         = 'admin';
        $this->session->set_userdata($sess_data);
      }
      header('location:'.base_url().'admin/main');
    }else{
      $this->session->set_flashdata('notif','alert("NIP dan Password tidak terdaftar, silahkan hubungi admin sistem");');
      redirect(site_url());
    }
  }

  // function untuk masukkan data
  public function InsertData($tabelName, $data){
    $res = $this->db->insert($tabelName, $data);
    return $res;
  }

  // function untuk masukkan banyak data
  public function InsertBatch($tabelName, $data){
    $res = $this->db->insert_batch($tabelName, $data);
    return $res;
  }

  // function untuk update data
  public function UpdateData($tabelName, $data, $where){
    $res = $this->db->update($tabelName, $data, $where);
    return $res;
  }

  // function untuk hapus data
  public function DeleteData($tabelName, $where){
    $res = $this->db->delete($tabelName, $where);
    return $res;
  }

}


?>
