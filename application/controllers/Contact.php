<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
    }

    public function index()
    {
        $data['title'] = 'Daftar Kontak';
        $data['aktif'] = 'Contact';
        $data['all_contact'] = $this->Contact_model->get_all();
        $this->load->view('contact/lihat', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kontak';
        $data['aktif'] = 'Contact';
        $this->load->view('contact/tambah', $data);
    }

    public function simpan()
    {
        $this->Contact_model->insert();
        $this->session->set_flashdata('success', 'Kontak berhasil ditambahkan');
        redirect('Contact');
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Kontak';
        $data['aktif'] = 'Contact';
        $data['contact'] = $this->Contact_model->get_by_id($id);
        $this->load->view('contact/ubah', $data);
    }

    public function update($id)
    {
        $this->Contact_model->update($id);
        $this->session->set_flashdata('success', 'Kontak berhasil diubah');
        redirect('Contact');
    }

    public function hapus($id)
    {
        $this->Contact_model->delete($id);
        $this->session->set_flashdata('success', 'Kontak berhasil dihapus');
        redirect('Contact');
    }

    public function export()
    {
        $data['aktif'] = 'Contact';
        // Implement export functionality here
    }

    public function kirim()
    {
        $this->Contact_model->insert();
        $this->session->set_flashdata('success', 'Pesan berhasil dikirim');
        redirect('pages/contact');
    }
}
