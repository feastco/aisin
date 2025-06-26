<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
    public function get_all() {
        return $this->db->get('contact')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('contact', ['id' => $id])->row();
    }

    public function insert() {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan')
        ];
        $this->db->insert('contact', $data);
    }

    public function update($id) {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan')
        ];
        $this->db->update('contact', $data, ['id' => $id]);
    }

    public function delete($id) {
        $this->db->delete('contact', ['id' => $id]);
    }
}
?>
