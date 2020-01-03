<?php

class Peta extends MY_Controller {

    protected $module = "peta";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_peta", "model");
    }

    public function index() {
        $this->data['lapan'] = $this->model->peta('LAPAN');
        $this->data['its'] = $this->model->peta('ITS');
        $this->data['data'] = $this->model->get();
        $this->render('main');
    }

    public function data() {
        $config = array();
        $config['search']= array('sumber','file','tanggal');
        $config['table'] = "persebaran_ikan p";
        $config['column'] = array(
            array("title" => "sumber", "field" => "p.source"),
            array("title" => "tanggal", "field" => "p.date"),
            array("title" => "file", "field" => "p.file"),
        );
        $config['crud'] = array('create');
        parent::reads($config);
    }

    public function create() {
        $this->subTitle = 'Data Persebaran';
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

    public function pengaduan() {
        $r = $this->model->pengaduan_json();
        print_r(json_encode($r));
    }

}
