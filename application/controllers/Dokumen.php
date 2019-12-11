<?php

class Dokumen extends MY_Controller {

    var $module = 'dokumen';

    public function __construct() {
        parent::__construct();
        $this->load->model("m_dokumen", "model");
    }

    public function index() {
        $config = array();
        $config['column'] = array(
            array("title" => "judul", "field" => "d.title"),
            array("title" => "file", "field" => "d.url"),
//            array("title" => "latitude", "field" => "fc.latitude"),
//            array("title" => "longitude", "field" => "fc.longitude"),
//            array("title" => "status", "field" => "fc.status"),
        );
        $config['crud'] = array('create', 'read', 'delete');
        $config['table'] = 'document d';
        parent::reads($config);
    }

    public function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[document.title]');
//        $this->form_validation->set_rules('dokumen', 'Dokumen', 'required');
        if (!$this->form_validation->run() == FALSE) {
            if ($this->input->post('create')) {
                if (parent::upload('dokumen', 'dokumen')) {
//                    die(print_r($this->upload->data()));
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
        if(!$this->session->flashdata('id')){
            redirect($this->module);
        }
        $this->data['data']=$this->model->read($this->session->flashdata('id'));
        $this->render('read');
    }

    public function edit() {
        $this->render('update');
    }

    public function delete() {
        $this->subTitle = 'delete';
        if (!empty($this->session->flashdata('id'))) {
            $this->data['data'] = $this->model->read($this->session->flashdata('id'));
            $this->render('delete');
        } else if ($this->input->post('delete')) {
            $id = $this->input->post('delete');
            $data = $this->model->read($id);
            if ($this->model->delete($id)) {
                unlink($this->config->item('upload_path') . 'dokumen/' . $data['url']);
                $this->session->set_flashdata('msgSuccess', 'Data berhasil dihapus');
                redirect($this->module);
            }
        } else {
            redirect($this->module);
        }
    }

}
