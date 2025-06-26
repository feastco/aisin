<?php

use Dompdf\Dompdf;

class Production extends CI_Controller
{
    public $M_production;
    public function __construct()
    {
        parent::__construct();
        // Validasi hak akses saat awal memuat
        if (!in_array($this->session->login['role'], ['petugas', 'admin'])) {
            redirect();
        }
        $this->data['aktif'] = 'Production';
        $this->load->model('M_production', 'm_production');
        $this->M_production = new M_production();
    }

    public function index()
    {
        $this->data['title'] = 'Data production';
        $this->data['all_production'] = $this->M_production->lihat();
        if ($this->data['all_production'] !== null) {
            $this->data['no'] = 1;
            $this->load->view('production/lihat', $this->data);
        } else {
            $this->session->set_flashdata('error', 'Tidak ada data production');
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
        $this->data['title'] = 'Tambah Data Production';
        $this->data['all_production'] = $this->M_production->lihat();  // Mendapatkan semua data production
        $this->data['all_no_fg'] = $this->M_production->get_no_fg();    // Mendapatkan opsi dropdown untuk no_fg
        $this->load->view('production/tambah', $this->data);
    }

    public function proses_tambah()
    {
        // Ambil data dari form
        $data = [
            'no_fg' => $this->input->post('no_fg'),
            'qty_production' => $this->input->post('qty_production'),
            'date_production' => $this->input->post('date_production')
        ];

        // Panggil model untuk menambah data production dan dapatkan id_production
        $id_production = $this->M_production->tambah($data);

        // Periksa apakah id_production berhasil didapatkan
        if ($id_production) {
            // Siapkan data detail produksi
            $productionDetailData = [
                'id_production' => $id_production,  // Gunakan id_production yang baru
                'no_fg' => $this->input->post('no_fg'),
                'qty_production' => $this->input->post('qty_production'),
                'no_part' => $this->input->post('no_part'),
                'nm_part' => $this->input->post('nm_part'),
                'qty_need' => $this->input->post('qty_need'),
                'date_production' => $this->input->post('date_production')
            ];

            // Insert data detail produksi ke tabel productionDetail
            if ($this->M_production->tambahDetail($productionDetailData)) {
                $this->session->set_flashdata('success', 'Data production dan detail production berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Data detail production gagal ditambahkan!');
            }
        } else {
            $this->session->set_flashdata('error', 'Data production gagal ditambahkan!');
        }

        redirect('Production');
    }



    public function ubah($id)
    {
        $this->data['title'] = 'Ubah Data production';
        $this->data['all_production'] = $this->M_production->lihat_id($id);
        $this->load->view('production/ubah', $this->data);
    }

    public function proses_ubah($id)
    {
        if (!$this->_is_admin()) return;
        $data = [
            'no_fg' => $this->input->post('no_fg'),
            // 'nm_fg' => $this->input->post('nm_fg'),
            'qty_production' => $this->input->post('qty_production'),
            'date_production' => $this->input->post('date_production'),
            // 'update_at' => date('Y-m-d H:i:s')
        ];

        if ($this->M_production->ubah(array('id' => $id), $data)) {
            $this->session->set_flashdata('success', 'Data production Berhasil Diubah!');
        } else {
            $this->session->set_flashdata('error', 'Data production Gagal Diubah!');
        }
        redirect('Production');
    }

    public function hapus($id)
    {
        if ($this->M_production->hapus($id)) {
            $this->session->set_flashdata('success', 'Data production Berhasil Dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data production Gagal Dihapus!');
        }
        redirect('Production');
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_production'] = $this->M_production->lihat();
        $this->data['title'] = 'Laporan Data production';
        $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('production/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data production Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}
