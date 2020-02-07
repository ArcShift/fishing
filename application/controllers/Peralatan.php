<?php

class Peralatan extends MY_Controller {

    protected $module = 'peralatan';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_alat', 'model');
    }

    public function index() {
        $config = array();
        $config['search'] = array('name', 'deskripsi');
        $config['table'] = 'gear g';
        $config['column'] = array(
            array("title" => "name", "field" => "g.name"),
            array("title" => "deskripsi", "field" => "g.description"),
        );
        $config['crud'] = array('create', 'update', 'delete');
        parent::reads($config);
    }

    public function create() {
        $this->subTitle = 'create';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama', 'required|is_unique[gear.name]');
        $this->form_validation->set_rules('desc', 'Deskripsi', 'required');
        if (!$this->form_validation->run() == FALSE) {
            if ($this->model->create()) {
                redirect($this->module);
            }
        }
        $this->render('create');
    }

    public function edit() {
        if ($this->input->post('edit')) {
            $this->data['data'] = $this->model->read($this->input->post('edit'));
            $this->render('update');
        } else if ($this->input->post('update')) {
            $this->model->update();
            $this->session->set_flashdata('msgSuccess', 'Data berhasil diubah');
            redirect($this->module);
        } else {
            redirect($this->module);
        }
    }

    public function delete() {
        $config['table'] = "gear g";
        $config['field'] = array(
            array("title" => "name", "field" => "g.name"),
            array("title" => "deskripsi", "field" => "g.description"),
        );
        parent::hapus($config);
    }

}
