<?php

class Tangkapan extends MY_Controller {

    protected $module = "tangkapan";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_tangkapan", "model");
    }

    public function index() {
        $this->subTitle = "grafik";
        $this->data['tahun'] = $this->model->tahun();
        if ($this->input->get('tahun')) {
            $this->data['data'] = $this->model->jumlah($this->input->get('tahun'));
        } else {
            $this->data['data'] = $this->model->jumlah($this->data['tahun'][0]['tahun']);
        }
        $this->render('grafik');
    }

    public function koordinat() {
        echo json_encode($this->model->koordinat());
    }

}
