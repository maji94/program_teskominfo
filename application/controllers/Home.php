<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->cek = $this->session->userdata('logged_in');
		$this->set = $this->session->userdata('lvl_user');
		if (empty($this->cek)) {
			if ($this->uri->segment(1) == FALSE) {
				$this->load->view('home/login');
			}
		}else{
			if ($this->set=='admin') {
				header('location:'.site_url().'admin/main');
			}
		}
	}

	public function index(){
	}

	public function get_login(){
  	$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->m_login->do_login($u,$p);
	}

	public function get_logout(){
		$this->session->sess_destroy();
		header('location:'.site_url());
	}
	
}
