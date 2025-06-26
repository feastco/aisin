<?php

use Dompdf\Dompdf;

class Receiving extends CI_Controller
{
    public $M_receiving;
    public function __construct()
    {
        parent::__construct();
        // Validasi hak akses saat awal memuat
        if (!in_array($this->session->login['role'], ['petugas', 'admin'])) {
            redirect();
        }
        $this->data['aktif'] = 'Receiving';
        // $this->load->model('M_master_part_need','m_master_part_need');
        $this->load->model('M_receiving', 'm_receiving');
        $this->M_receiving = new M_receiving();
    }

    public function index()
    {
        $this->data['title'] = 'Lihat Receiving';
        $this->data['all_receiving'] = $this->M_receiving->lihat();
        if ($this->data['all_receiving'] !== null) {
            $this->data['no'] = 1;
            $this->load->view('receiving/lihat', $this->data);
        } else {
            $this->session->set_flashdata('error', 'Tidak ada data receiving');
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

    public function get_no_part()
    {
        $this->db->select('no_part,nm_part');
        $this->db->from('master_part');
        $query = $this->db->get();
        return $query->result();
    }


    public function tambah()
    {
        $this->data['title'] = 'Tambah Data Receiving';
        $this->data['all_receiving'] = $this->M_receiving->lihat();
        $data['no_part'] = $this->get_no_part();
        $this->load->view('receiving/tambah', $this->data);
    }

    public function proses_tambah()
    {
        // if (!$this->_is_admin()) return;
        $data = [
            'no_pkb' => $this->input->post('no_pkb'),
            'received_at' => $this->input->post('received_at')
        ];
        $detail_data = array();
        $no_part = $this->input->post('no_part[]');
        $qty_received = $this->input->post('qty_received[]');
        foreach ($no_part as $key => $value) {
            $detail_data[] = array(
                'no_part' => $value,
                'qty_received' => $qty_received[$key],
            );
        }

        if ($this->M_receiving->tambah($data, $detail_data)) {
            $this->session->set_flashdata('success', 'Data Receiving Berhasil Ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Data Receiving Gagal Ditambahkan!');
        }
        redirect('Receiving');
    }

    public function ubah($id)
    {
        $this->data['title'] = 'Ubah Data Receiving';
        $this->data['all_receiving'] = $this->M_receiving->lihat_id($id);
        $this->data['all_receiving']->detail = $this->M_receiving->lihat_detail_id($id);
        $this->load->view('receiving/ubah', $this->data);
    }


    public function proses_ubah($id)
    {
        if (!$this->_is_admin()) return;
        $data = [
            'no_pkb' => $this->input->post('no_pkb'),
            'received_at' => $this->input->post('received_at'),
            'update_at' => date('Y-m-d H:i:s')
        ];
        $detail_data = array();
        $no_part = $this->input->post('no_part[]');
        $qty_received = $this->input->post('qty_received[]');
        foreach ($no_part as $key => $value) {
            $detail_data[] = array(
                'no_part' => $value,
                'qty_received' => $qty_received[$key],
            );
        }

        if ($this->M_receiving->ubah(array('id' => $id), $data, $detail_data)) {
            $this->session->set_flashdata('success', 'Data Receiving Berhasil Diubah!');
        } else {
            $this->session->set_flashdata('error', 'Data Receiving Gagal Diubah!');
        }
        redirect('Receiving');
    }

    public function hapus($id)
    {
        if ($this->M_receiving->hapus($id)) {
            $this->session->set_flashdata('success', 'Data Receiving Berhasil Dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data Receiving Gagal Dihapus!');
        }
        redirect('Receiving');
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_receiving'] = $this->M_receiving->lihat();
        $this->data['title'] = 'Laporan Data Receiving';
        $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('receiving/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Receiving Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}
