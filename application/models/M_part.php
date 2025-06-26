<?php

class M_part extends CI_Model
{
	public function lihat()
	{
		$this->db->select('mpn.id, pt.no_part, pt.nm_part, mpn.stok,');
		$this->db->from('part mpn');
		$this->db->join('master_part pt', 'mpn.no_part = pt.no_part', 'left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}


	public function lihat_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('part');
		return $query->row();
	}
	public function tambah($data)
	{
		$this->db->insert('part', $data);
		return $this->db->affected_rows();
	}


	public function ubah($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('part', $data);
		return $this->db->affected_rows();
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('part');
		return $this->db->affected_rows();
	}

	public function jumlah()
	{
		return $this->db->count_all('part');
	}
}
