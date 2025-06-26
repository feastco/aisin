<?php

use Dompdf\Dompdf;

class Part extends CI_Controller
{
	public $M_master_part;
	public $M_master_fg;
	public function __construct()
	{
		parent::__construct();
		// Validasi hak akses saat awal memuat
		if (!in_array($this->session->login['role'], ['petugas', 'admin'])) {
			redirect();
		}
		$this->data['aktif'] = 'Part';
		// $this->load->model('M_master_part_need','m_master_part_need');
		$this->load->model('M_master_part', 'm_master_part');
		$this->load->model('M_part', 'm_part');
		// $this->load->model('M_master_fg', 'm_master_fg');

		$this->M_master_part = new M_master_part();
		$this->M_part = new M_part();
		// $this->M_master_fg = new M_master_fg();
		// $this->M_master_part_need = new M_master_part_need(); // tambahkan baris ini
	}

	public function index()
	{
		$this->data['title'] = 'Data Master Part Need';
		$this->data['all_part'] = $this->M_part->lihat(); // ubah menjadi $this->M_master_part_need
		if ($this->data['all_part'] !== null) {
			$this->data['no'] = 1;
			$this->load->view('part/lihat', $this->data);
		} else {
			$this->session->set_flashdata('error', 'Tidak ada data part');
			redirect('dashboard');
		}
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
		$this->data['title'] = 'Tambah Data Part';
		$this->data['all_part'] = $this->M_part->lihat(); // ubah menjadi $this->M_master_part_need
		$this->data['all_master_part'] = $this->M_master_part->lihat();
		$this->load->view('part/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if (!$this->_is_admin()) return;
		$data = [
			'no_part' => $this->input->post('no_part'),
			'nm_part' => $this->input->post('nm_part'),
			'stok' => $this->input->post('stok')
		];

		if ($this->M_part->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Part Berhasil Ditambahkan!');
		} else {
			$this->session->set_flashdata('error', 'Data Part Gagal Ditambahkan!');
		}
		redirect('Part');
	}

	public function ubah($id)
	{
		$this->data['title'] = 'Ubah Data Part';
		$this->data['all_part'] = $this->M_part->lihat_id($id); // ubah menjadi $this->M_master_part_need
		$this->data['all_master_part'] = $this->M_master_part->lihat();
		$this->load->view('part/ubah', $this->data);
	}

	public function proses_ubah($id)
	{
		$data = [
			'no_part' => $this->input->post('no_part'),
			'nm_part' => $this->input->post('nm_part'),
			'stok' => $this->input->post('stok')
		];

		if ($this->M_part->ubah($data, $id)) {
			$this->session->set_flashdata('success', 'Data Part Berhasil Diubah!');
		} else {
			$this->session->set_flashdata('error', 'Data Part Gagal Diubah!');
		}
		redirect('Part');
	}

	public function hapus($id)
	{
		if ($this->M_part->hapus($id)) {
			$this->session->set_flashdata('success', 'Data Part Berhasil Dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data Part Gagal Dihapus!');
		}
		redirect('Part');
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_part'] = $this->M_part->lihat(); // ubah menjadi $this->M_master_part_need
		$this->data['title'] = 'Laporan Data Part';
		$this->data['no'] = 1;
		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('part/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Part Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
