<?php

class Peralatan extends MY_Controller {

    protected $module = 'peralatan';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_alat', 'model');
    }

    public function index() {
        $config = array();
        $config['search'] = array('name','deskripsi');
        $config['table'] = 'gear g';
        $config['column'] = array(
            array("title" => "name", "field" => "g.name"),
            array("title" => "deskripsi", "field" => "g.description"),
        );
        $config['crud'] = array('create', 'delete');
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

    public function delete() {
        $this->subTitle = 'delete';
        if (!empty($this->session->flashdata('id'))) {
            $this->data['data'] = $this->model->read($this->session->flashdata('id'));
            $this->render('delete');
        } else if ($this->input->post('delete')) {
            $id = $this->input->post('delete');
            if ($this->model->delete($id)) {
                $this->session->set_flashdata('msgSuccess', 'Data berhasil dihapus');
            } else {
                $this->session->set_flashdata('msgError', 'Data gagal dihapus');
            }
            redirect($this->module);
        } else {
            redirect($this->module);
        }
    }

}
