<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_divisi');
		$this->load->model('M_user');
		cek_login();
	}

	public function index()
	{
		$noregist = $this->session->userdata('noreg');
		$role = $this->session->userdata('role');
		// print_r($role); die;
		$data = [
				'title' => 'Data Pegawai',
				'divisi' => $this->M_divisi->get()->result(),
		];
		if ($role == '0') {
			$data['pegawai'] = $this->M_pegawai->get($noregist)->row();
		} else {
			$data['pegawai'] = $this->M_pegawai->get()->result();
		}

		if ($role == '2') {
			$data['pm'] = $this->M_pegawai->getpm($noregist)->row();
		}

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('content/admin/pegawai/index', $data);
		$this->load->view('layout/footer');
	}

	function adddata(){
		// Data Pegawai
		$noregist = $this->input->post('noregist');
		$namaleng = $this->input->post('namaleng');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$divisi = $this->input->post('divisi');
		$nohp = $this->input->post('nohp');
		$status = $this->input->post('status');
		$jabatan = $this->input->post('jabatan');

		// Akun Pegawai
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Cek Data Pegawai
		$cek = $this->M_pegawai->cek($noregist)->num_rows();
		// Jika Data Pegawai Sudah Ada
		if ($cek > 0) {
			$this->session->set_flashdata('swetalert', '`Oops...`, `Data Pegawai Sudah Ada !`, `error`');
			redirect('pegawai');
		// Jika Data Pegawai Belum Ada
		} else {
			// Deklarasi Data Pegawai
			$data = [
				'noreg' => $noregist,
				'namaleng' => $namaleng,
				'nama' => $nama,
				'jk' => $jk,
				'alamat' => $alamat,
				'divisi' => $divisi,
				'nohp' => $nohp,
				'status' => $status,
				'jabatan' => $jabatan,
			];
			
			// Deklarasi Data Akun Pegawai
			$datauser = [
				'idpegawai' => $noregist,
				'namauser' => $namaleng,
				'username' => $username,
				'password' => $password,
				'active' => '1',
			];
			if ($jabatan == '1') {
				$datauser['role'] = '2';
			} else {
				$datauser['role'] = '0';
			}
			// Insert Data Pegawai
			$pegawai = $this->M_pegawai->insert($data);
			// Insert Data Akun Pegawai
			$akun = $this->M_user->insert($datauser);
			// Jika Data Pegawai Dan Akun Gagal Di Tambahkan
			if ($pegawai && $akun) {
				$this->session->set_flashdata('swetalert', '`Oops...`, `Data Pegawai Gagal Di Tambahkan !`, `error`');
				redirect('pegawai');
			// Jika Data Pegawai Dan Akun Berhasil Di Tambahkan
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Pegawai Berhasil Di Tambahkan !`, `success`');
				redirect('pegawai');
			}
		}

	}

	function updatedata(){
		// Data Pegawai
		$noregist = $this->input->post('noregist');
		$namaleng = $this->input->post('namaleng');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$divisi = $this->input->post('divisi');
		$nohp = $this->input->post('nohp');
		$status = $this->input->post('status');

		// Deklarasi Data Pegawai
		$data = [
			'namaleng' => $namaleng,
			'nama' => $nama,
			'jk' => $jk,
			'alamat' => $alamat,
			'divisi' => $divisi,
			'nohp' => $nohp,
			'status' => $status,
		];

		// Deklarasi Data Akun Pegawai
		$datauser = [
			'namauser' => $namaleng,
			'active' => $status,
		];

		// Update Data Pegawai
		$result = $this->M_pegawai->update($data, $noregist);

		// Update Data Akun Pegawai
		$resultuser = $this->M_user->reset($datauser, $noregist);
		// Jika Data Pegawai Gagal Di Ubah
		if ($result && $resultuser) {
			$this->session->set_flashdata('swetalert', '`Oops...`, `Data Pegawai Gagal Di Ubah !`, `error`');
			redirect('pegawai');
		// Jika Data Pegawai Berhasil Di Ubah
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Pegawai Berhasil Di Ubah !`, `success`');
			redirect('pegawai');
		}
	}

	function deletedata(){
		// Data Pegawai
		$noregist = $this->input->post('noreg');

		// Delete Data Pegawai
		$result = $this->M_pegawai->delete($noregist);
		// Delete Data Akun Pegawai
		$akun = $this->M_user->delete($noregist);

		// Jika Data Pegawai Gagal Di Hapus
		if ($result	&& $akun) {
			$this->session->set_flashdata('swetalert', '`Oops...`, `Data Pegawai Gagal Di Hapus !`, `error`');
			redirect('pegawai');
		// Jika Data Pegawai Berhasil Di Hapus
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Pegawai Berhasil Di Hapus !`, `success`');
			redirect('pegawai');
		}
	}

	function reset(){
		// Data Pegawai
		$noregist = $this->input->post('noreg');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Deklarasi Data Akun Pegawai
		$datauser = [
			'username' => $username,
			'password' => $password,
		];

		// reset Password Pegawai
		$result = $this->M_user->reset($datauser, $noregist);
		// Jika Password Pegawai Gagal Di Reset
		if ($result) {
			redirect('pegawai');
			$this->session->set_flashdata('swetalert', '`Oops...`, `Password Pegawai Gagal Di Reset !`, `error`');
		// Jika Password Pegawai Berhasil Di Reset
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Password Pegawai Berhasil Di Reset !`, `success`');
			redirect('pegawai');
		}
	}
}