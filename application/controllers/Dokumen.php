<?php

class Dokumen extends MY_Controller {

    var $module = 'dokumen';

    public function __construct() {
        parent::__construct();
        $this->load->model("m_dokumen", "model");
    }

    public function index() {
        $config['search'] = array('judul', 'file', 'admin');
        $config['column'] = array(
            array("title" => "judul", "field" => "d.title"),
            array("title" => "file", "field" => "d.url"),
            array("title" => "admin", "field" => "u.nama"),
        );
        $config['join'] = array(
            array("table" => "user u", "relation" => "u.id = d.user"),
        );
        $config['crud'] = array('create', 'read', 'delete');
        $config['table'] = 'document d';
        parent::reads($config);
    }

    public function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[document.title]');
        if (!$this->form_validation->run() == FALSE) {
            if ($this->input->post('create')) {
                if (parent::upload('dokumen', 'dokumen')) {
                    if ($this->model->create()) {
                        redirect($this->module);
                    } else {
                        $this->session->set_flashdata('msgError', $this->db->error());
                    }
                }
            }
        }
        $this->subTitle = 'create';
        $this->render('create');
    }

    public function detail() {
        if ($this->input->post('read')) {
            $this->data['data'] = $this->model->read($this->input->post('read'));
            $this->render('read');
        } else {
            redirect($this->module);
        }
    }

    public function edit() {
        $this->render('update');
    }

    public function delete() {
        $config['field'] = array(
            array("title" => "judul", "field" => "d.title"),
            array("title" => "file", "field" => "d.url"),
            array("title" => "admin", "field" => "u.nama"),
        );
        $config['join'] = array(
            array("table" => "user u", "relation" => "u.id = d.user"),
        );
        $config['table'] = 'document d';
        parent::hapus($config);
    }

}
