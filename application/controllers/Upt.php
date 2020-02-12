<?php

class Upt extends MY_Controller {

    protected $module = "upt";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_upt", "model");
    }

    public function index() {
        $config['search'] = array('username');
        $config['filter'] = array(
            array("title" => "type", "type" => "select_query", "query" => "SELECT id AS k, nama AS v FROM role WHERE id<>1")
        );
        $config['table'] = "user u";
        $config['column'] = array(
            array("title" => "full name", "field" => "u.full_name"),
            array("title" => "username", "field" => "u.nama"),
            array("title" => "email", "field" => "u.email"),
            array("title" => "no HP", "field" => "u.no_hp"),
        );
        $config['join'] = array(
            array("table" => "role r", "relation" => "u.idUserType = r.id"),
        );
        $this->db->where('r.id=5'); // hide super admin
        $config['crud'] = array();
        parent::reads($config);
    }

    public function create() {
        $this->data['mode'] = 'create';
        $this->cu();
    }

    public function update() {
        $this->data['mode'] = 'update';
        $this->cu();
    }

    private function cu() {
        $this->load->library('form_validation');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Nama', 'required|is_unique[upt.name]');
            if ($this->form_validation->run()) {
                $this->model->cu();
            }
        }
        $this->render('cu');
    }

}
