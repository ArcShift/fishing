<?php

class Ikan extends MY_Controller {

    protected $module = "ikan";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_ikan", "model");
    }

    public function index() {
        $config['search']= array('nama', 'keterangan');
        $config['table'] = "fish f";
        $config['column'] = array(
            array("title" => "nama", "field" => "f.name"),
            array("title" => "keterangan", "field" => "f.about_fish"),
        );
        $config['crud'] = array('create');
        parent::reads($config);
    }

    public function edit() {
        if ($this->session->userdata('id')) {
            $id = $this->session->userdata('id');
        } else {
            redirect($this->module);
        }
        $this->data['data'] = $this->model->read($id);
        $this->render('update');
    }

    public function delete() {
        parent::delete();
    }

    public function create() {
        $this->subTitle = "Create";
        $this->load->library('form_validation');
        if ($this->input->post('create')) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[fish.name]');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
            if ($this->form_validation->run()) {
                if (!parent::upload('ikan', 'foto')) {
                    $this->session->set_flashdata('msgError', $this->upload->display_errors());
                    redirect($this->module);
                }
                if ($this->model->create()) {
                    $this->session->set_flashdata('msgSuccess', 'Data berhasil disimpan');
                    redirect($this->module);
                } else {
                    $this->session->set_flashdata('msgError', 'Insert data gagal');
                }
            }
        }
        $this->render("create");
    }

}
