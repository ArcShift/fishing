<?php

class Site extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_site','model');
    }

    public function register($gen) {
        if($this->model->validate_email($gen)){
            echo 'Registrasi berhasil. Silahkan login';
        }else{
            echo 'Data tidak ditemukan. Silahkan kirim ulang email';
        }
    }
}
