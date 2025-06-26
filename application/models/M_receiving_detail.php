<?php

class M_receiving_detail extends CI_Model
{
    public $table = 'receiving';
    public $detail_table = 'receivingDetail';

    public function __construct()
    {
        parent::__construct();
    }

    public function lihat()
    {
        $this->db->select('*');
        $this->db->from('receivingDetail rd');
        // $this->db->join('receiving r', 'r.id = rd.no_pkb');
        $query = $this->db->get();
        return $query->result_object();
    }

    // public function lihat_id($id)
    // {
    //     $this->db->where('id', $id);
    //     return $this->db->get('receiving')->row_object();
    // }

    // public function tambah($data, $detail_data)
    // {
    //     $this->db->trans_start();
    //     $this->db->insert('receiving', $data);
    //     $receiving_id = $this->db->insert_id();
    //     foreach ($detail_data as $detail) {
    //         $detail['id'] = $receiving_id;
    //         $this->db->insert('receivingDetail', $detail);
    //     }
    //     $this->db->trans_complete();
    //     return $this->db->trans_status();
    // }

    // public function ubah($where, $data, $detail_data)
    // {
    //     $this->db->trans_start();
    //     $this->db->where($where);
    //     $this->db->set('update_at', 'NOW()', FALSE); // menggunakan fungsi now() untuk mendapatkan tanggal dan waktu sekarang
    //     $this->db->update('receiving', $data);
    //     // Hapus data detail lama
    //     $this->db->where('receiving_id', $where['id']);
    //     $this->db->delete('receivingDetail');
    //     // Tambah data detail baru
    //     foreach ($detail_data as $detail) {
    //         $this->db->insert('receivingDetail', $detail);
    //     }
    //     $this->db->trans_complete();
    //     return $this->db->trans_status();
    // }

    // public function hapus($id)
    // {
    //     $this->db->trans_start();
    //     $this->db->where('id', $id);
    //     $this->db->delete('receiving');
    //     $this->db->where('receiving_id', $id);
    //     $this->db->delete('receivingDetail');
    //     $this->db->trans_complete();
    //     return $this->db->trans_status();
    // }
}
