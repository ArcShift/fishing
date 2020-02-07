<?php

class Pengumuman extends MY_Controller {

    protected $module = "pengumuman";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_pengumuman", "model");
    }

    public function index() {
        $config = array();
        $config['search']= array('judul','deskripsi','admin');
        $config['table'] = 'announcement a';
        $config['column'] = array(
            array("title" => "judul", "field" => "a.title"),
            array("title" => "deskripsi", "field" => "a.sort_desc"),
            array("title" => "create", "field" => "a.created_at"),
            array("title" => "admin", "field" => "u.nama"),
        );
        $config['join'] = array(
            array("table" => "user u", "relation" => "u.id = a.user"),
        );
        $config['crud'] = array('create', 'delete');
        parent::reads($config);
    }

    public function create() {
        $this->subTitle = 'create';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('sortDesc', 'Deskripsi Singkat', 'required');
        $this->form_validation->set_rules('fullDesc', 'Deskripsi Lengkap', 'required');
        if (!$this->form_validation->run() == FALSE) {
            if ($this->input->post('create')) {
                if (parent::upload('pengumuman', 'foto')) {
                    if($this->model->create()){
                        redirect($this->module);
                    }
                }
            }
        }
        $this->render('create');
    }

    public function delete() {
        $config['table'] = 'announcement a';
        $config['field'] = array(
            array("title" => "judul", "field" => "a.title"),
            array("title" => "deskripsi", "field" => "a.sort_desc"),
            array("title" => "create", "field" => "a.created_at"),
            array("title" => "admin", "field" => "u.nama"),
        );
        $config['join'] = array(
            array("table" => "user u", "relation" => "u.id = a.user"),
        );
        parent::hapus($config);
    }

}
