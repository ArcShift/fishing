<?php

class Pengaduan extends MY_Controller {

    protected $module = "pengaduan";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_pengaduan", "model");
    }

    public function index() {
        $config['filter'] = array(
            array("title" => "nelayan", "type" => "input"),
            array("title" => "keterangan", "type" => "input"),
            array("title" => "status", "type" => "array", "data" => array(
                    'pending', 'diterima', 'ditolak', 'sedang ditangani', 'selesai'
                )
            )
        );
        $config['table'] = "fisherman_complaintment fc";
        $config['join'] = array(
            array("table" => "fisherman f", "relation" => "f.id = fc.id_fisherman"),
        );
        $config['column'] = array(
            array("title" => "nelayan", "field" => "f.name"),
            array("title" => "title", "field" => "fc.title"),
            array("title" => "latitude", "field" => "fc.latitude"),
            array("title" => "longitude", "field" => "fc.longitude"),
            array("title" => "status", "field" => "fc.status"),
        );
        $config['crud'] = array('read', 'update');
        $this->db->order_by('fc.id', 'DESC');
        parent::reads($config);
    }

    public function detail() {
        $this->subTitle = 'Detail';
        if (empty($this->session->flashdata('id'))) {
            redirect($this->module);
        }
        $result = $this->model->read($this->session->flashdata('id'));
        $this->data['dataLaporan'] = $result['main'];
        $this->render('pengaduan/detail');
    }

    public function edit() {
        if ($this->input->post('save')) {
            if ($this->model->edit()) {
                $this->session->set_flashdata('msgSuccess', 'Status berhasil diupdate');
                redirect($this->module);
            } else {
                $this->session->set_flashdata('msgError', 'Status gagal diupdate');
            }
        } else if (empty($this->session->flashdata('id'))) {
            redirect($this->module);
        }
        $this->data['id'] = $this->session->flashdata('id');
        $this->subTitle = 'Edit';
        $result = $this->model->read($this->data['id']);
        $this->data['dataLaporan'] = $result['main'];
        $this->data['dataFiles'] = $result['files'];
        $this->render('pengaduan/edit');
    }

}
