<?php

use Dompdf\Dompdf;

class ProductionDetail extends CI_Controller
{
    public $M_production_detail;

    public function __construct()
    {
        parent::__construct();
        // Validasi hak akses saat awal memuat
        if (!in_array($this->session->login['role'], ['petugas', 'admin'])) {
            redirect();
        }
        $this->data['aktif'] = 'ProductionDetail';
        // Menambahkan model untuk production detail
        $this->load->model('M_production_detail', 'm_production_detail');
        $this->M_production_detail = new M_production_detail();
    }

    public function index()
    {
        $this->data['title'] = 'Lihat Production Detail';
        // Memanggil data produksi detail dari model
        $this->data['all_production_detail'] = $this->M_production_detail->lihat();
        if ($this->data['all_production_detail'] !== null) {
            $this->data['no'] = 1;
            $this->load->view('production_detail/lihat', $this->data);
        } else {
            $this->session->set_flashdata('error', 'Tidak ada data produksi');
            redirect('dashboard');
        }
    }

    // Fungsi untuk ekspor laporan production detail
    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_production_detail'] = $this->M_production_detail->lihat();
        $this->data['title'] = 'Laporan Data Production Detail';
        $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('production_detail/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Production Detail Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}

