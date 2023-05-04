<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_divisi');
		cek_login();
	}

	public function index()
	{
		$data = [
			'title' => 'Divisi',
			'divisi' => $this->M_divisi->get()->result(),
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('content/admin/divisi/index', $data);
		$this->load->view('layout/footer');
	}

	function adddata(){
		$namadiv = $this->input->post('namadiv');
		$keterangan = $this->input->post('keterangan');

		$data = [
			'namadiv' => $namadiv,
			'keterangan' => $keterangan,
		];

		$this->M_divisi->insert($data);
		$this->session->set_flashdata('swetalert', '`Good job!`, `Divisi Berhasil Di Tambahkan !`, `success`');
		redirect('divisi');
	}

	function updatedata(){
		$id = $this->input->post('id');
		$namadiv = $this->input->post('namadiv');
		$keterangan = $this->input->post('keterangan');

		$data = [
			'namadiv' => $namadiv,
			'keterangan' => $keterangan,
		];

		$this->M_divisi->update($id, $data);
		$this->session->set_flashdata('swetalert', '`Good job!`, `Divisi Berhasil Di Update !`, `success`');
		redirect('divisi');
	}
	
	function deletedata(){
		$id = $this->input->post('id');
		$this->M_divisi->delete($id);
		$this->session->set_flashdata('swetalert', '`Good job!`, `Divisi Berhasil Di Hapus !`, `success`');
		redirect('divisi');
	}

}
