<?php

class Akun extends MY_Controller {

    protected $module = "akun";

    public function __construct() {
        parent::__construct();
        $this->load->model('m_akun', 'model');
        $this->load->library('form_validation');
    }

    public function index() {//profile
//        $this->subTitle = "Profile";
        $this->load->helper(array('form', 'url'));
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
            $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[user.nama]');
            if ($this->form_validation->run()) {
                if (!$this->model->updateData()) {
                    echo "gagal update data";
                } else {
                    if ($this->input->post("id") === $this->session->userId) {
                        $this->session->set_userdata("user", $this->input->post("nama"));
                        $this->session->set_flashdata('msgSuccess', 'Data berhasil diupdate');
                    }
                }
            }
        }
        $this->data['data1'] = $this->model->detail($this->session->userId);
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
