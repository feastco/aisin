<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function getAll()
    {
        $this->db->select('id, nama, deskripsi, gambar'); // Ensure 'id' is selected
        $query = $this->db->get('product');
        return $query->result();
    }
    
    public function getById($id) {
        return $this->db->get_where('product', ['id' => $id])->row();
    }
    
    public function insert($data) {
        $this->db->insert('product', $data);
        // Debugging statement
        if ($this->db->affected_rows() > 0) {
            log_message('debug', 'Insert successful');
        } else {
            log_message('error', 'Insert failed: ' . $this->db->last_query());
        }
    }
    
    public function update($id, $data) {
        $this->db->update('product', $data, ['id' => $id]);
    }
    
    public function delete($id) {
        $this->db->delete('product', ['id' => $id]);
    }
}
?>
