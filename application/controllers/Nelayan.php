<?php

class Nelayan extends MY_Controller {

    protected $module = "nelayan";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_nelayan", "model");
    }

    public function index() {
        $config= array();
        $config['search']=array('nama', 'username', 'email');
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
        $id_nelayan = $this->session->userdata('id_nelayan'); 
        if (empty($id_nelayan) && !isset($id_nelayan)) {
            redirect('nelayan');
        }
        $this->data['data'] = $this->model->read($id_nelayan, 'biodata');
        $this->data['pengaduan'] = $this->model->read($id_nelayan, 'pengaduan');
        $this->data['postingan'] = $this->model->read($id_nelayan, 'postingan');
        $this->data['tangkapan_ikan'] = $this->model->read($id_nelayan, 'tangkapan ikan');
        
        $this->render('read');
    }
    public function delete() {
        $this->render('delete');
    }
}
