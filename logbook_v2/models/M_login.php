<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model 
{

	function cekuser($username, $status)
	{
		$query = $this->db->query("SELECT * FROM user WHERE username = '$username' AND role = '$status' ");

		return $query;
	}

	function ceklogin($username, $password, $status)
	{
		$query = $this->db->query("SELECT * FROM user WHERE username = '$username' and password = '$password' and role = '$status' ");

		return $query->row_array();
	}
}
