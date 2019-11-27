<?php

class Ikan extends MY_Controller {

    protected $module = "ikan";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_ikan", "model");
    }

    public function index() {
        $config['filter'] = array(
            array("title" => "nama", "type" => "input"),
        );
        $config['table'] = "fish f";
        $config['column'] = array(
            array("title" => "nama", "field" => "name"),
            array("title" => "keterangan", "field" => "about_fish"),
        );
//        $config['crud'] = array('create', 'read', 'update', 'delete');
        $config['crud'] = array('create', 'update');
        $this->db->order_by('name', 'DESC');
        parent::reads($config);
    }
    public function edit() {
        if($this->session->userdata('id')){
            $id= $this->session->userdata('id');
        }else{
            redirect($this->module);
        }
        $this->data['data']=$this->model->read($id);
        $this->render('ikan/update');
//        $this->render($this->module.'/update');
    }
    
    public function delete() {
        parent::delete();
    }

    public function create() {
        $this->subTitle = "Create";
        $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/fishing/upload/ikan/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 100;
//        $config['max_width'] = 1024;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        if ($this->input->post('create')) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[fish.name]');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
//            $this->form_validation->set_rules('foto', 'Foto', 'required');
            if ($this->form_validation->run()) {
                if (!$this->upload->do_upload('foto')) {
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
        $this->render("ikan/create");
    }

}
