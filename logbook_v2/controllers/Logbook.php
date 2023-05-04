<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logbook extends CI_Controller
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

	// Show Detail Log Book
	public function showdetail($act, $id, $noreg = null)
	{
		if ($act == 'log') {
			$data['title'] = 'Detail Log Book';
			$data['log'] = $this->M_log->getbyid($id)->row();
		} else if ($act == 'logpegawai') {
			$data['title'] = 'Detail Log Book Pegawai';
			$data['noreg'] = $noreg;
			$data['log'] = $this->M_log->getbyidpeg($id)->row();
		}
		$data['img'] = json_decode($data['log']->fileupload);
		$team = explode(",", $data['log']->team);
		$data['team'] = $this->M_pegawai->getteambyid($team)->result();

		// print_r($data); die;
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		if ($act == 'log') {
			$this->load->view('content/admin/logbook/detail', $data);
		} else if ($act == 'logpegawai') {
			$this->load->view('content/admin/logbook/detaillogpegawai', $data);
		}
		$this->load->view('layout/footer');
	}

	public function index()
	{
		$noregist = $this->session->userdata('noreg');
		$divisi = $this->session->userdata('divisi');
		if ($noregist != '') {
			$data = [
				'title' => 'Log Book',
				'pegawai' => $this->M_pegawai->get($noregist)->row(),
				'log' => $this->M_log->get($noregist)->result(),
				'team' => $this->M_pegawai->getteam($divisi)->result(),
				'tess' => 'team'
			];
		} else {
			$data = [
				'title' => 'Log Book',
				'pegawai' => $this->M_pegawai->get()->result(),
				'log' => $this->M_log->get()->result(),
				'team' => $this->M_pegawai->getteam()->result(),
			];
		}

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('content/admin/logbook/index', $data);
		$this->load->view('layout/footer');
	}

	// add data
	public function adddata()
	{
		$noreg 		= $this->input->post('noreg');
		$deskripsi 	= $this->input->post('deskripsi');
		$req 		= $this->input->post('req');
		$status 	= $this->input->post('status');
		$date 		= $this->input->post('date');
		$team		= $this->input->post('team');
		$time 		= date('H:i:s');
		$fileupload		= $_FILES['fileupload']['name'];
		$count = count($fileupload);

		if ($team != '' || $team != null) {
			$team = implode(",", $team);
		} else {
			$team = '';
		}

		if ($fileupload[0] != '' || $fileupload[0] != null) {
			for ($i = 0; $i < $count; $i++) {
				if ($fileupload = '') {
					$fileupload = [];
				} else {
					$_FILES['file']['name'] = $_FILES['fileupload']['name'][$i];
					$_FILES['file']['type'] = $_FILES['fileupload']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['fileupload']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['fileupload']['error'][$i];
					$_FILES['file']['size'] = $_FILES['fileupload']['size'][$i];

					$config['upload_path'] = './assets/fileupload/';
					$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|jpg|jpeg|png|gif';
					$config['file_name']        = $date . '-' . $noreg . $i . '-log';
                	$config['max_size']             = 2048;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('file')) {
						$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Tidak Tersimpan !`, `error`');
						// print_r($this->upload->display_errors('<p>', '</p>'));
						// die;
						redirect('logbook');
					} else {
						$namefile[$i] = $this->upload->data('file_name');
					}
				}
			}
		} else {
			$namefile = [];
		}

		// print_r($namefile); die;
		$data = array(
			'noreg'	=> $noreg,
			'desk'	=> $deskripsi,
			'req'			=> $req,
			'status'		=> $status,
			'team'			=> $team,
			'date'			=> $date,
			'creat'			=> $time,
			'fileupload'	=> json_encode($namefile),
		);

		// print_r($data); die;

		$result = $this->M_log->add($data);
		if ($result > 0) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Tambahkan !`, `error`');
			redirect('logbook');
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan !`, `success`');
			redirect('logbook');
		}
	}

	// update data
	public function updatedata()
	{
		$id 			= $this->input->post('id');
		$deskripsi 		= $this->input->post('deskripsi');
		$req 			= $this->input->post('req');
		$status 		= $this->input->post('status');
		$team 			= $this->input->post('team');
		// $noreg 		= $this->input->post('noreg');
		// $date 		= date('Y-m-d');
		// $time 		= date('H:i:s');
		// $fileupload				= $_FILES['fileupload'];

		if ($team != '' || $team != null) {
			$team = implode(",", $team);
		} else {
			$team = '';
		}

		$data = array(
			'desk'	=> $deskripsi,
			'req'			=> $req,
			'team'			=> $team,
			'status'		=> $status,
		);

		$result = $this->M_log->update($data, $id);
		if ($result > 0) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Update !`, `error`');
			redirect('logbook');
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Update !`, `success`');
			redirect('logbook');
		}
	}

	// delete data
	public function deletedata()
	{
		$id = $this->input->post('id');
		$noreg	= $this->input->post('noreg');
		$fileupload = $this->input->post('fileupload');

		if ($fileupload == '') {
		} else {
			$path = './assets/fileupload/' . $fileupload;
			unlink($path);
		}

		$result = $this->M_log->delete($id, $noreg);
		if ($result > 0) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Hapus !`, `error`');
			redirect('logbook');
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Hapus !`, `success`');
			redirect('logbook');
		}
	}

	// Download File
	public function download($file)
	{
		$this->load->helper('download');
		$file = $this->uri->segment(3);
		// print_r($file); die;
		$data = file_get_contents(base_url('assets/fileupload/' . $file));
		force_download($file, $data);
	}

	// Read File
	public function readfile($file)
	{
		$this->load->helper('file');
		$file = $this->uri->segment(3);
		header("content-type: application/pdf");
		readfile('./assets/fileupload/' . $file);
	}

	// View log Pegawai
	public function viewlog()
	{
		$data = [
			'title' => 'Logbook Pegawai',
			'pegawai' => $this->M_pegawai->get()->result(),
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('content/admin/logbook/pegawai', $data);
		$this->load->view('layout/footer');
	}

	// Show Logbook
	public function showlog($noreg)
	{
		$data = [
			'title' => 'Logbook Pegawai',
			'log' => $this->M_log->get($noreg)->result(),
			'noreg' => $noreg,
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('content/admin/logbook/showlog', $data);
		$this->load->view('layout/footer');
	}
}