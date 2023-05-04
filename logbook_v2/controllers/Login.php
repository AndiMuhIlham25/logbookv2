<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_user');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('content/login/index');
    }

    public function regist()
    {
        $this->load->view('content/login/regist');
    }

    public function prosses()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $status     = $this->input->post('status');

        if ($status == '') {
            $status = 1;
        }

        $cekuser = $this->M_login->cekuser($username, $status);
        $ceklogin = $this->M_login->ceklogin($username, $password, $status);
        $hitung = $cekuser->row_array();

        // cek user
        if (count($hitung) >= 1) {
            // Cek aktif
            if ($cekuser->row()->active == 1) {
                //cek login
                if ($ceklogin >= 1) {
                    $data = $this->M_user->get_user($ceklogin['idpegawai']);
                    $data = $data->row();
                    if ($data->divisi != '') {
                        $this->session->set_userdata('divisi', $data->divisi);
                    }
                    $this->session->set_userdata('noreg', $data->noreg);
                    $this->session->set_userdata('name', $data->namauser);
                    $this->session->set_userdata('username', $data->username);
                    $this->session->set_userdata('role', $data->role);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf Username dan Password Anda Salah`, `error`');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf User Anda Belum Aktif`, `error`');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf User Anda Belum Terdaftar`, `error`');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('swetalert', '`Good job!`, `Abda Berhasil Logout`, `success`');
        redirect('login');
    }

    public function blocked()
    {
        $this->load->view('content/login/blocked');
    }
}