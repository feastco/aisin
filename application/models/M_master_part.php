<?php

class M_master_part extends CI_Model
{
	public function get_no_part()
	{
		$this->db->select('mp.no_part, mp.nm_part');
		$this->db->from('master_part mp');
		$this->db->join('part p', 'mp.no_part = p.no_part');
		$query = $this->db->get();
		return $query->result();
	}


	public function lihat()
	{
		$query = $this->db->get('master_part');
		return $query->result();
	}

	public function lihat_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('master_part');
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('master_part', $data);
		return $this->db->affected_rows();
	}

	public function ubah($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('master_part', $data);
		return $this->db->affected_rows();
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('master_part');
		return $this->db->affected_rows();
	}

	public function jumlah()
	{
		return $this->db->count_all('master_part');
	}
}
