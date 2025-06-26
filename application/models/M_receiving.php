<?php

class M_receiving extends CI_Model
{
    public $table = 'receiving';
    public $detail_table = 'receivingDetail';

    public function __construct()
    {
        parent::__construct();
    }

    public function lihat()
    {
        $this->db->order_by('id');
        return $this->db->get('receiving')->result_object();
    }

    public function lihat_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('receiving')->row_object();
    }

    public function lihat_detail_id($id)
    {
        $query = "SELECT * FROM receivingDetail WHERE id = '$id'";
        return $this->db->query($query)->result();
    }


    public function tambah($data, $detail_data)
    {
        $this->db->trans_start();
        $this->db->insert('receiving', $data);
        $id = $this->db->insert_id();
        $no_pkb = $data['no_pkb'];
        $received_at = $data['received_at'];
        foreach ($detail_data as $detail) {
            $insert_data = array(
                'id' => $id,
                'no_pkb' => $no_pkb,
                'no_part' => $detail['no_part'],
                'qty_received' => $detail['qty_received'],
                'received_at' => $received_at
            );
            $this->db->insert('receivingDetail', $insert_data);
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }


    public function ubah($where, $data, $detail_data)
    {
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->set('update_at', 'NOW()', FALSE); // menggunakan fungsi now() untuk mendapatkan tanggal dan waktu sekarang
        $this->db->update('receiving', $data);
        // Hapus data detail lama
        $this->db->where('id', $where['id']);
        $this->db->delete('receivingDetail');
        // Tambah data detail baru
        $no_pkb = $data['no_pkb'];
        $received_at = $data['received_at'];
        foreach ($detail_data as $detail) {
            $insert_data = array(
                'id' => $where['id'],
                'no_pkb' => $no_pkb,
                'no_part' => $detail['no_part'],
                'qty_received' => $detail['qty_received'],
                'received_at' => $received_at
            );
            $this->db->insert('receivingDetail', $insert_data);
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }


    public function hapus($id)
    {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->delete('receiving');
        $this->db->where('id', $id);
        $this->db->delete('receivingDetail');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}
