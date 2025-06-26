<?php

class M_production_detail extends CI_Model
{
    // public $table = 'receiving';
    // public $detail_table = 'receivingDetail';

    public function __construct()
    {
        parent::__construct();
    }

    public function lihat()
    {
        // Mengambil semua kolom dari tabel productionDetail
        $this->db->select('*');
        $this->db->from('productionDetail pd');

        // Menggabungkan dengan master_part_need berdasarkan kolom yang sama (misalnya no_fg atau no_part)
        $this->db->join('master_part_need mpn', 'mpn.no_part = pd.no_part AND mpn.no_fg = pd.no_fg', 'left');

        // Menggabungkan dengan tabel part berdasarkan no_part
        $this->db->join('part p', 'p.no_part = pd.no_part', 'left');

        // Menggabungkan dengan master_fg berdasarkan no_fg
        $this->db->join('master_fg fg', 'fg.no_fg = pd.no_fg', 'left');


        // Eksekusi query
        $query = $this->db->get();

        // Cek apakah query berhasil
        if ($query->num_rows() > 0) {
            return $query->result_object();
        } else {
            return [];
        }
    }


}
