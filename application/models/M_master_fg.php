<?php

class M_master_fg extends CI_Model
{
	public function lihat()
	{
		$query = $this->db->get('master_fg');
		return $query->result();
	}

	public function lihat_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('master_fg');
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('master_fg', $data);
		return $this->db->affected_rows();
	}

	public function ubah($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('master_fg', $data);
		return $this->db->affected_rows();
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('master_fg');
		return $this->db->affected_rows();
	}

	public function jumlah()
	{
		return $this->db->count_all('master_fg');
	}
}
