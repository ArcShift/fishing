<?php

class Akun extends MY_Controller {

    protected $module = "akun";

    public function __construct() {
        parent::__construct();
        $this->load->model('m_akun', 'model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->data['data'] = $this->model->detail($this->user['id']);
        if ($this->input->post("changePass")) {
            $this->form_validation->set_rules('pass', 'Password Lama', 'required|callback_check_pass');
            $this->form_validation->set_rules('newPass', 'Password Baru', 'required');
            $this->form_validation->set_rules('confirmPass', 'Konfirmasi Password', 'required|matches[newPass]');
            if ($this->form_validation->run()) {
                if ($this->model->gantiPassword()) {
                    $this->session->set_flashdata('msgSuccess', 'Password berhasil diganti');
                } else {
                    $this->session->set_flashdata('msgError', 'Gagal mengganti password');
                }
            }
        } elseif ($this->input->post("saveData")) {
            $this->form_validation->set_rules('fullName', 'Nama Lengkap', 'max_length[50]');
            if ($this->input->post('nama') != $this->data['data']['nama']) {
                $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[45]|is_unique[user.nama]');
            }
            $this->form_validation->set_rules('email', 'Email', 'max_length[50]|valid_email');
            $this->form_validation->set_rules('noHP', 'Nomor HP', 'max_length[20]');
            if ($this->form_validation->run() != false) {
                if (!$this->model->updateData()) {
                    $this->session->set_flashdata('msgError', 'Gagal mengupdate data');
                } else {
                    $this->session->set_userdata("user['name']", $this->input->post("nama"));
                    $this->session->set_flashdata('msgSuccess', 'Data berhasil diupdate');
                }
            }
        }
        $this->render('profil');
    }

    function check_pass() {
        $this->load->model("m_login");
        if ($this->model->checkPass()) {
            return true;
        } else {
            $this->form_validation->set_message('check_pass', '{field} tidak sama');
            return false;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
