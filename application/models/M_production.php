<?php

class M_production extends CI_Model
{
    public $table = 'production';
    public $fg = 'master_fg';

    // public $detail_table = 'receivingDetail';

    public function lihat()
    {
        $this->db->select('*');
        $this->db->from('production');
        $query = $this->db->get();
        return $query->result();
    }

    public function lihat_id($id)
    {
        $this->db->select('*');
        $this->db->from('production');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_no_fg()
    {
        $this->db->select('id, no_fg, nm_fg'); // Sesuaikan nama kolom jika berbeda
        $this->db->from('master_fg'); // Ganti 'no_fg' sesuai nama tabel yang menyimpan data
        $query = $this->db->get();
        return $query->result();
    }
    

    // Fungsi untuk menambahkan data ke tabel production
    public function tambah($data)
    {
        $this->db->insert('production', $data);

        // Ambil id dari production yang baru saja ditambahkan
        $id_production = $this->db->insert_id();

        // Kembalikan id_production
        return $id_production;
    }

    // Fungsi untuk menambahkan detail produksi ke tabel productionDetail
    public function tambahDetail($data)
    {
        // Mengambil data produksi dan detail produksinya
        $this->db->select('production.*, productionDetail.*');
        $this->db->from('production');
        $this->db->join('productionDetail', 'production.id = productionDetail.id_production');
        $this->db->where('production.id', $id_production);
        $query = $this->db->get();
        return $query->result_array();
        return $this->db->insert('productionDetail', $data);
    }


    public function ubah($where, $data)
    {
        $this->db->where($where);
        $this->db->update('production', $data);
        return $this->db->affected_rows() > 0;
    }

    public function hapus($id)
    {
        // Hapus data detail produksi yang terkait dengan id_production
        $this->db->where('id_production', $id);
        $this->db->delete('productionDetail');

        // Hapus data dari tabel production
        $this->db->where('id', $id);
        $this->db->delete('production');

        return $this->db->affected_rows() > 0; // Mengembalikan status penghapusan
    }

}
