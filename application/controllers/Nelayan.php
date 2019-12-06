<?php

class Nelayan extends MY_Controller {

    protected $module = "nelayan";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_nelayan", "model");
    }

    public function index() {
        $config= array();
        $config['filter'] = array(
            array("title" => "name", "type" => "input"),
            array("title" => "username", "type" => "input"),
            array("title" => "email", "type" => "input"),
        );
        $config['table'] = "fisherman n";
        $config['column'] = array(
            array("title" => "nama", "field" => "n.name"),
            array("title" => "username", "field" => "n.username"),
            array("title" => "email", "field" => "n.email"),
        );
        $config['crud'] = array('read');
        parent::reads($config);
    }

    public function detail() {
        $this->subTitle = "Detail";
        if (empty($this->session->flashdata('id'))) {
            redirect('nelayan');
        }
        $this->data['data'] = $this->model->read($this->session->flashdata('id'));
        $this->render('read');
    }
    public function delete() {
        $this->render('delete');
    }
}
