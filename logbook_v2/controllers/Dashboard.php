<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_divisi');
		$this->load->model('M_user');
		$this->load->model('M_log');
		cek_login();
	}

	public function index()
	{
		$noreg = $this->session->userdata('noreg');
		$data = [
			'title' 		=> 'Dashboard',
			'pegawai'	=>	$this->M_pegawai->get()->num_rows(),
			'divisi'	=>	$this->M_divisi->get()->num_rows(),
			'log'	=>	$this->M_log->get($noreg)->num_rows(),
			'user'	=>	$this->M_user->get()->num_rows(),
		];
		if ($noreg == '') {
			$data['log'] = $this->M_log->get()->num_rows();
		}
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/dashboard/index', $data);
		$this->load->view('layout/footer');
	}
}