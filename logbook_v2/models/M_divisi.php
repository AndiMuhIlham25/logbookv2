<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_divisi extends CI_Model
{
	public function get()
	{
		$data = $this->db->get('divisi');
		return $data;
	}

	public function insert($data)
	{
		$this->db->set('id', 'UUID()', FALSE);
		$this->db->insert('divisi', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('divisi', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('divisi');
	}
}
