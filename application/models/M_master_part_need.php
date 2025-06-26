<?php

class M_master_part_need extends CI_Model
{
	public function lihat()
	{
		$this->db->select('mpn.id, mpn.no_fg, mpn.no_part, mpn.qty_need');
		$this->db->from('master_part_need mpn');
		$this->db->join('master_fg fg', 'mpn.no_fg = fg.no_fg');
		$this->db->join('master_part pt', 'mpn.no_part = pt.no_part');
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
		$query = $this->db->get('master_part_need');
		return $query->row();
	}
	public function tambah($data)
	{
		$this->db->insert('master_part_need', $data);
		return $this->db->affected_rows();
	}


	public function ubah($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('master_part_need', $data);
		return $this->db->affected_rows();
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('master_part_need');
		return $this->db->affected_rows();
	}

	public function jumlah()
	{
		return $this->db->count_all('master_part_need');
	}
}
