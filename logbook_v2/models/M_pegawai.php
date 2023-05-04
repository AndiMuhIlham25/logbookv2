<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
	public function get($noreg = '')
	{
		$this->db->select('pegawai.*, divisi.namadiv as divisi, divisi.id as iddivisi, user.*');
		$this->db->from('pegawai');
		$this->db->join('divisi', 'divisi.id = pegawai.divisi');
		$this->db->join('user', 'user.idpegawai = pegawai.noreg');
		if ($noreg != '') {
			$this->db->where('pegawai.noreg', $noreg);
		}
		$data = $this->db->get();
		return $data;
	}

	// get team
	public function getteam($divisi = '')
	{
		$this->db->select('pegawai.*, divisi.namadiv as divisi, divisi.id as iddivisi, user.*');
		$this->db->from('pegawai');
		$this->db->join('divisi', 'divisi.id = pegawai.divisi', 'left');
		$this->db->join('user', 'user.idpegawai = pegawai.noreg');
		if (($divisi != '' || $divisi != null) && ($divisi != 'pimpinan')) {
			$this->db->where('pegawai.divisi', $divisi);
		}
		$this->db->or_where('pegawai.divisi', 'pimpinan');
		$data = $this->db->get();
		return $data;
	}

	// get pm
	public function getpm($noregist)
	{
		$this->db->select('pegawai.*, user.*');
		$this->db->from('pegawai');
		$this->db->join('user', 'user.idpegawai = pegawai.noreg');
		$this->db->where('pegawai.noreg', $noregist);
		$data = $this->db->get();
		return $data;
	}

	// get team by id
	public function getteambyid($team)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where_in('noreg', $team);
		$data = $this->db->get();
		return $data;
	}

	function cek($noregist)
	{
		$this->db->where('noreg', $noregist);
		$data = $this->db->get('pegawai');
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('pegawai', $data);
	}

	public function update($data, $id)
	{
		$this->db->where('noreg', $id);
		$this->db->update('pegawai', $data);
	}

	public function delete($id)
	{
		$this->db->where('noreg', $id);
		$this->db->delete('pegawai');
	}
}