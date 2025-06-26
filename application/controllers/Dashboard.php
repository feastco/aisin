<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_master_part', 'm_master_part');
		$this->load->model('M_master_part_need', 'm_master_part_need');
		$this->load->model('M_master_fg', 'm_master_fg');
		$this->load->model('M_receiving_detail', 'm_receiving_detail');
		$this->load->model('M_production_detail', 'm_production_detail');
		$this->load->model('M_petugas', 'm_petugas');
		$this->load->model('M_pengguna', 'm_pengguna');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['master_part'] = count($this->m_master_part->lihat());
		$this->data['master_part_need'] = count($this->m_master_part_need->lihat());
		$this->data['master_fg'] = count($this->m_master_fg->lihat());
		$this->data['receiving_detail'] = count($this->m_receiving_detail->lihat());
		$this->data['production_detail'] = count($this->m_production_detail->lihat());
		$this->data['jumlah_petugas'] = $this->m_petugas->jumlah();
		$this->data['jumlah_pengguna'] = $this->m_pengguna->jumlah();
		$this->load->view('dashboard', $this->data); // Make sure this matches your view file location
	}
}