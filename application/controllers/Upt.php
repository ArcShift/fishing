<?php

class Upt extends MY_Controller {

    protected $module = "upt";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_upt", "model");
    }

    public function index() {
        $config['search'] = array('nama kapal', 'alat', 'jenis kapal', 'ikan');
        $config['table'] = "upt u";
        $config['join'] = array(
            array("table" => "gear g", "relation" => "g.id = u.id_gear"),
            array("table" => "fish f", "relation" => "f.id = u.id_ikan"),
        );
        $config['column'] = array(
            array("title" => "tanggal", "field" => "u.tanggal"),
            array("title" => "nama kapal", "field" => "u.nama_kapal"),
            array("title" => "alat", "field" => "g.name"),
            array("title" => "jenis kapal", "field" => "u.jenis_kapal"),
            array("title" => "ikan", "field" => "f.name"),
        );
        $config['crud'] = array('create');
        parent::reads($config);
    }

    public function create() {
        if ($this->input->post('create')) {
            if ($this->model->create()){
                redirect($this->module);
            }
        }
        $this->data['alat'] = $this->model->alat();
        $this->data['ikan'] = $this->model->ikan();
        $this->render('create');
    }

}