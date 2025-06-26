<?php

use Dompdf\Dompdf;

class MasterPart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Validasi hak akses saat awal memuat
		if (!in_array($this->session->login['role'], ['petugas', 'admin'])) {
			redirect();
		}

		$this->data['aktif'] = 'MasterPart';
		$this->load->model('M_master_part', 'm_master_part');
	}

	public function index()
	{
		$this->data['title'] = 'Data Master Part';
		$this->data['all_part'] = $this->m_master_part->lihat();
		$this->data['no'] = 1;
		$this->load->view('master_part/lihat', $this->data);
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

		$this->data['title'] = 'Tambah Part';
		$this->load->view('master_part/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if (!$this->_is_admin()) return;

		$data = [
			'no_part' => $this->input->post('no_part'),
			'nm_part' => $this->input->post('nm_part'),
			'min_stock' => $this->input->post('min_stock'),
			'max_stock' => $this->input->post('max_stock'),
		];

		if ($this->m_master_part->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Part <strong>Berhasil</strong> Ditambahkan!');
		} else {
			$this->session->set_flashdata('error', 'Data Part <strong>Gagal</strong> Ditambahkan!');
		}
		redirect('MasterPart');
	}

	public function ubah($id)
	{
		if (!$this->_is_admin()) return;

		$this->data['title'] = 'Ubah Part';
		$this->data['part'] = $this->m_master_part->lihat_id($id);
		$this->load->view('master_part/ubah', $this->data);
	}

	public function proses_ubah($id)
	{
		if (!$this->_is_admin()) return;

		$data = [
			'no_part' => $this->input->post('no_part'),
			'nm_part' => $this->input->post('nm_part'),
			'min_stock' => $this->input->post('min_stock'),
			'max_stock' => $this->input->post('max_stock'),
		];

		if ($this->m_master_part->ubah($data, $id)) {
			$this->session->set_flashdata('success', 'Data Part <strong>Berhasil</strong> Diubah!');
		} else {
			$this->session->set_flashdata('error', 'Data Part <strong>Gagal</strong> Diubah!');
		}
		redirect('MasterPart');
	}

	public function hapus($id)
	{
		if (!$this->_is_admin()) return;

		if ($this->m_master_part->hapus($id)) {
			$this->session->set_flashdata('success', 'Data Part <strong>Berhasil</strong> Dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data Part <strong>Gagal</strong> Dihapus!');
		}
		redirect('MasterPart');
	}

	public function get_no_part()
	{
		$data = $this->m_master_part->get_no_part();
		echo json_encode($data);
	}


	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_part'] = $this->m_master_part->lihat();
		$this->data['title'] = 'Laporan Data Part';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('master_part/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Part Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
