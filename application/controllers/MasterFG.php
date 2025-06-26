<?php

use Dompdf\Dompdf;

class MasterFG extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Validasi hak akses saat awal memuat
		if (!in_array($this->session->login['role'], ['petugas', 'admin'])) {
			redirect();
		}
		$this->data['aktif'] = 'MasterFG';
		$this->load->model('M_master_fg', 'm_master_fg');
	}

	public function index()
	{
		$this->data['title'] = 'Data Master Finish Good';
		$this->data['all_fg'] = $this->m_master_fg->lihat();
		$this->data['no'] = 1;
		$this->load->view('master_fg/lihat', $this->data);
	}

	private function _is_admin()
	{
		if ($this->session->login['role'] !== 'admin') {
			$this->session->set_flashdata('error', 'Akses ini hanya untuk admin!');
			redirect('dashboard');
			return false;
		}
		return true;
	}

	public function tambah()
	{
		if (!$this->_is_admin()) return;

		$this->data['title'] = 'Tambah Data Finish Good';
		$this->load->view('master_fg/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if (!$this->_is_admin()) return;

		$data = [
			'no_fg' => $this->input->post('no_fg'),
			'nm_fg' => $this->input->post('nm_fg'),
		];

		if ($this->m_master_fg->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Finish Good <strong>Berhasil</strong> Ditambahkan!');
		} else {
			$this->session->set_flashdata('error', 'Data Finish Good <strong>Gagal</strong> Ditambahkan!');
		}
		redirect('MasterFG');
	}

	public function ubah($id)
	{
		if (!$this->_is_admin()) return;

		$this->data['title'] = 'Ubah Finish Good';
		$this->data['fg'] = $this->m_master_fg->lihat_id($id);
		$this->load->view('master_fg/ubah', $this->data);
	}

	public function proses_ubah($id)
	{
		if (!$this->_is_admin()) return;

		$data = [
			'no_fg' => $this->input->post('no_fg'),
			'nm_fg' => $this->input->post('nm_fg'),
		];

		if ($this->m_master_fg->ubah($data, $id)) {
			$this->session->set_flashdata('success', 'Data Finish Good <strong>Berhasil</strong> Diubah!');
		} else {
			$this->session->set_flashdata('error', 'Data Finish Good <strong>Gagal</strong> Diubah!');
		}
		redirect('MasterFG');
	}

	public function hapus($id)
	{
		if (!$this->_is_admin()) return;

		if ($this->m_master_fg->hapus($id)) {
			$this->session->set_flashdata('success', 'Data Finish Good <strong>Berhasil</strong> Dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data Finish Good <strong>Gagal</strong> Dihapus!');
		}
		redirect('MasterFG');
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_fg'] = $this->m_master_fg->lihat();
		$this->data['title'] = 'Laporan Data Finish Good';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('master_fg/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Finish Good Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
