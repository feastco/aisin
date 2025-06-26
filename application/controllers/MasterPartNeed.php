<?php

use Dompdf\Dompdf;

class MasterPartNeed extends CI_Controller
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
		$this->data['aktif'] = 'MasterPartNeed';
		$this->load->model('M_master_part_need','m_master_part_need');
		$this->load->model('M_master_part', 'm_master_part');
		$this->load->model('M_master_fg', 'm_master_fg');

		$this->M_master_part = new M_master_part();
		$this->M_master_fg = new M_master_fg();
		$this->M_master_part_need = new M_master_part_need(); // tambahkan baris ini
	}

	public function index()
	{
		$this->data['title'] = 'Data Master Part Need';
		$this->data['all_part_need'] = $this->M_master_part_need->lihat(); // ubah menjadi $this->M_master_part_need
		if ($this->data['all_part_need'] !== null) {
			$this->data['no'] = 1;
			$this->load->view('master_part_need/lihat', $this->data);
		} else {
			$this->session->set_flashdata('error', 'Tidak ada data part need');
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
		$this->data['title'] = 'Tambah Data Part Need';
		$this->data['all_part_need'] = $this->M_master_part_need->lihat(); // ubah menjadi $this->M_master_part_need
		$this->data['all_part'] = $this->M_master_part->lihat();
		$this->data['all_fg'] = $this->M_master_fg->lihat();
		$this->load->view('master_part_need/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if (!$this->_is_admin()) return;
		$data = [
			'no_fg' => $this->input->post('no_fg'),
			'no_part' => $this->input->post('no_part'),
			'qty_need' => $this->input->post('qty_need')
		];

		if ($this->M_master_part_need->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Part Need Berhasil Ditambahkan!');
		} else {
			$this->session->set_flashdata('error', 'Data Part Need Gagal Ditambahkan!');
		}
		redirect('MasterPartNeed');
	}

	public function ubah($id)
	{
		$this->data['title'] = 'Ubah Data Part Need';
		$this->data['part_need'] = $this->M_master_part_need->lihat_id($id); // ubah menjadi $this->M_master_part_need
		$this->data['all_part'] = $this->M_master_part->lihat();
		$this->data['all_fg'] = $this->M_master_fg->lihat();
		$this->load->view('master_part_need/ubah', $this->data);
	}

	public function proses_ubah($id)
	{
		$data = [
			'no_fg' => $this->input->post('no_fg'),
			'no_part' => $this->input->post('no_part'),
			'qty_need' => $this->input->post('qty_need')
		];

		if ($this->M_master_part_need->ubah($data, $id)) {
			$this->session->set_flashdata('success', 'Data Part Need Berhasil Diubah!');
		} else {
			$this->session->set_flashdata('error', 'Data Part Need Gagal Diubah!');
		}
		redirect('MasterPartNeed');
	}

	public function hapus($id)
	{
		if ($this->M_master_part_need->hapus($id)) {
			$this->session->set_flashdata('success', 'Data Part Need Berhasil Dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data Part Need Gagal Dihapus!');
		}
		redirect('MasterPartNeed');
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_part_need'] = $this->M_master_part_need->lihat(); // ubah menjadi $this->M_master_part_need
		$this->data['title'] = 'Laporan Data Part Need';
		$this->data['no'] = 1;
		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('master_part_need/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Part Need Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
