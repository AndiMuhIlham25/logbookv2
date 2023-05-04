<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_log extends CI_Model
{
	public function get($noreg = '')
	{
		if ($this->session->userdata('role') == '2') {
			$this->db->select('pegawai.*, log.*');
		} else {
			$this->db->select('pegawai.*, divisi.*, log.*');
		}
		$this->db->from('log');
		$this->db->join('pegawai', 'pegawai.noreg = log.noreg');
		if ($this->session->userdata('role') != '2') {
			$this->db->join('divisi', 'divisi.id = pegawai.divisi');
		}
		if ($noreg != '') {
			$this->db->where('log.noreg', $noreg);
			$this->db->or_like('log.team', $noreg);
		}
		$data = $this->db->get();
		return $data;
	}

	// get data by id
	public function getbyid($id)
	{
		if ($this->session->userdata('role') == '2') {
			$this->db->select('pegawai.*, log.*');
		} else {
			$this->db->select('pegawai.*, divisi.*, log.*');
		}
		$this->db->from('log');
		$this->db->join('pegawai', 'pegawai.noreg = log.noreg');
		if ($this->session->userdata('role') != '2') {
			$this->db->join('divisi', 'divisi.id = pegawai.divisi');
		}
		$this->db->where('log.id', $id);
		$data = $this->db->get();
		return $data;
	}

	// get data by id pegawai
	public function getbyidpeg($id)
	{
		$this->db->select('pegawai.*, divisi.*, log.*');
		$this->db->from('log');
		$this->db->join('pegawai', 'pegawai.noreg = log.noreg');
		$this->db->join('divisi', 'divisi.id = pegawai.divisi');
		$this->db->where('log.id', $id);
		$data = $this->db->get();
		return $data;
	}

	public function add($data)
	{
		$this->db->set('id', 'UUID()', FALSE);
		$this->db->insert('log', $data);
	}

	// update
	public function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('log', $data);
	}

	// delete
	public function delete($id, $noreg)
	{
		$this->db->where('id', $id);
		$this->db->where('noreg', $noreg);
		$this->db->delete('log');
	}
}