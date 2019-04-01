<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

  var $table = 'tb_berkas';
  var $column_order = array(null, 'tanggal','no_paspor','nama','no_terbang','kebangsaan','permasalahan','terminal',null); //set column field database for datatable orderable
  var $column_search = array('tanggal','no_paspor','nama','no_terbang','kebangsaan','permasalahan','terminal',); //set column field database for datatable searchable 
  var $order = array('id_berkas' => 'desc'); // default order

  public function __construct()
  {
      parent::__construct();
      $this->load->database();
  }

  public function getContent($tableName, $id){
    $data = $this->db->get_where($tableName, $id);
    return $data->result();
  }


  private function _get_datatables_query()
  {
    
    $this->db->from($this->table);

    $i = 0;
  
    foreach ($this->column_search as $item) // loop column 
    {
      if($_POST['search']['value']) // if datatable send POST for search
      {
        
        if($i===0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        }
        else
        {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if(count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }
    
    if(isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } 
    else if(isset($this->order))
    {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  public function getRekap($tgl_start, $tgl_end){
    $this->db->where('tanggal >= ', $tgl_start);
    $this->db->where('tanggal <= ', $tgl_end);
    $data = $this->db->get('tb_berkas');
    return $data->result();
  }
  
  public function getUsername($user){
    $data = $this->db->get_where('tb_user', array('username' => $user));
    return $data->result_array();
  }

  public function getAbsen($user=null){
    $this->db->select('tp.nama, ta.*');
    $this->db->join('tb_absen ta', 'ta.nip = tp.nip');
    if ($user!=null) {
      $this->db->where('tp.nip', $user);
    }
    $data = $this->db->get('tb_pegawai tp');
    return $data->result_array();
  }

  public function getId($select, $tabelName, $field, $value){
    $this->db->select($select);
    $this->db->where($field,$value);
    $data = $this->db->get($tabelName);
    return $data->result();
  }

  public function getBerkas(){
    $this->db->order_by('id_berkas','DESC');
    $data = $this->db->get('tb_berkas');
    return $data->result();
  }

  public function getDataBerkas($terminal=null, $jenis_lk=null, $mode=null, $list=null){

    if ($terminal > 0) {
      $this->db->where('terminal', $terminal);
    }

    if ($jenis_lk > 0 ) {
      $this->db->where('jenis_lk', $jenis_lk);
    }

    if ($mode == "bulan") {
      if ($terminal == 0 AND $jenis_lk == 0) {
        $this->db->select('
          ifnull((SELECT COUNT(MONTH(tanggal)) FROM tb_berkas WHERE MONTH(tanggal)='.$list.' AND YEAR(tanggal)='.date('Y').'),0) AS `jumlah`');
      }else if ($terminal == 0) {
        $this->db->select('
          ifnull((SELECT COUNT(MONTH(tanggal)) FROM tb_berkas WHERE MONTH(tanggal)='.$list.' AND jenis_lk='.$jenis_lk.' AND YEAR(tanggal)='.date('Y').'),0) AS `jumlah`');
      }else if ($jenis_lk == 0) {
        $this->db->select('
          ifnull((SELECT COUNT(MONTH(tanggal)) FROM tb_berkas WHERE MONTH(tanggal)='.$list.' AND terminal='.$terminal.' AND YEAR(tanggal)='.date('Y').'),0) AS `jumlah`');
      }else{
        $this->db->select('
          ifnull((SELECT COUNT(MONTH(tanggal)) FROM tb_berkas WHERE MONTH(tanggal)='.$list.' AND jenis_lk='.$jenis_lk.' AND terminal='.$terminal.' AND YEAR(tanggal)='.date('Y').'),0) AS `jumlah`');
      }
      $this->db->where('YEAR(tanggal)', date('Y'));
      $data = $this->db->get('tb_berkas');
      return $data->row()->jumlah;
    }else {
      if ($terminal == 0 AND $jenis_lk == 0) {
        $this->db->select('
          ifnull((SELECT COUNT(YEAR(tanggal)) FROM tb_berkas WHERE YEAR(tanggal)='.$list.'),0) AS `jumlah`');
      }else if ($terminal == 0) {
        $this->db->select('
          ifnull((SELECT COUNT(YEAR(tanggal)) FROM tb_berkas WHERE YEAR(tanggal)='.$list.' AND jenis_lk='.$jenis_lk.'),0) AS `jumlah`');
      }else if ($jenis_lk == 0) {
        $this->db->select('
          ifnull((SELECT COUNT(YEAR(tanggal)) FROM tb_berkas WHERE YEAR(tanggal)='.$list.' AND terminal='.$terminal.'),0) AS `jumlah`');
      }else {
        $this->db->select('
          ifnull((SELECT COUNT(YEAR(tanggal)) FROM tb_berkas WHERE YEAR(tanggal)='.$list.' AND jenis_lk='.$jenis_lk.' AND terminal='.$terminal.'),0) AS `jumlah`');
      }
      $this->db->where('YEAR(tanggal) >= ', date('Y')-5);
      $data = $this->db->get('tb_berkas');
      return $data->row()->jumlah;
    }
  }

  public function cekData($terminal=null, $jenis_lk=null, $mode=null){

    if ($terminal > 0) {
      $this->db->where('terminal', $terminal);
    }

    if ($jenis_lk > 0 ) {
      $this->db->where('jenis_lk', $jenis_lk);
    }

    if ($mode == "bulan") {
      $this->db->select('*');
      $this->db->where('YEAR(tanggal)', date('Y'));
      $data = $this->db->get('tb_berkas');
      return $data->row();
    }else {
      $this->db->select('*');
      $this->db->where('YEAR(tanggal) >= ', date('Y')-5);
      $data = $this->db->get('tb_berkas');
      return $data->row();
    }
  }

  public function cek_password($id,$password){
    $this->db->select('*');
    $this->db->where('id_user', $id);
    $this->db->where('password',$password);
    $data = $this->db->get('tb_user');
    return $data->result();
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

  public function DeleteDisData($tabel, $where1, $where2){ //tambahkan function iko pak (dempo)
    $this->db->where('id_surat', $where1);
    $this->db->where('jenis_disposisi', $where2);
    $res = $this->db->delete($tabel);
    return $res;
  }

}


?>