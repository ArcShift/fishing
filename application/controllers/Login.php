<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->has_userdata('user')) {
            redirect('dashboard');
        } else if ($this->input->post('login')) {
            $this->load->model('m_login', 'model');
            if ($this->model->login()) {
                $this->load->model('m_module');
                $this->session->set_userdata('menu', $this->m_module->read());
                redirect('dashboard');
            }
        } elseif ($this->input->post('resetPass')) {
            $this->load->library('email');
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'your host';
            $config['smtp_port'] = '465';
            $config['smtp_timeout'] = '30';
            $config['smtp_user'] = 'your mail id';
            $config['smtp_pass'] = 'your password';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->set_header('Header1', 'Value1');
            $this->email->from('darkwarrior0236@gmail.com', 'ArcShift');
            $this->email->to('darkwarrior0236@gmail.com');
//            $this->email->cc('another@another-example.com');
//            $this->email->bcc('them@their-example.com');
            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');
            if ($this->email->send()) {
                echo 'Berhasil mengirim email';
            } else {
                echo 'Gagal mengrim email. ' . $this->email->print_debugger();
            }
        }
        $this->load->view('login');
    }

    public function logout() {
        $this->session->unset_userdata('user');
        redirect('login');
    }

}
