<?php

class Peta extends MY_Controller {

    protected $module = "peta";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_peta", "model");
    }

    public function index() {
        $this->data['data']= $this->model->get();
        $this->render('main');
    }

    public function data_persebaran() {
        $this->subTitle= 'Data Persebaran';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|is_unique[persebaran_ikan.date]');
        if (!$this->form_validation->run() == FALSE) {
            if ($this->input->post('simpan')) {
                if (parent::upload('persebaran_ikan', 'file')) {
                    if ($this->model->create()) {
                        redirect($this->module);
                    }
                }
            }
        }
        $this->render('data_persebaran');
    }

}
