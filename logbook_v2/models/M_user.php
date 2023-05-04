<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function get()
	{
		$this->db->select('*');
		$this->db->from('user');

		$data = $this->db->get();
		return $data;
	}

	// get pimpinan
	public function get_pimpinan()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('role', '2');

		$data = $this->db->get();
		return $data;
	}

	// get Super Admin
	public function get_super_admin()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('role', '1');

		$data = $this->db->get();
		return $data;
	}

	public function reset($data, $id)
	{
		$this->db->where('idpegawai', $id);
		$this->db->update('user', $data);
	}

	// get user
	public function get_user($id)
	{
		$this->db->select('pegawai.*, user.*');
		$this->db->from('user');
		$this->db->where('idpegawai', $id);
		$this->db->join('pegawai', 'pegawai.noreg = user.idpegawai', 'left');

		$data = $this->db->get();
		return $data;
	}

	public function insert($data)
	{
		$this->db->set('id', 'UUID()', FALSE);
		$this->db->insert('user', $data);
	}

	public function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function delete($id)
	{
		$this->db->where('idpegawai', $id);
		$this->db->delete('user');
	}

	public function nonaktif($id)
	{
		$sql = "UPDATE `user` SET `active` = '0' WHERE `id` = '" . $id . "';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function aktif($id)
	{
		$sql = "UPDATE `user` SET `active` = '1' WHERE `id` = '" . $id . "';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}
