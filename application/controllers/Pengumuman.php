<?php

class Pengumuman extends MY_Controller {

    protected $module = "pengumuman";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_pengumuman", "model");
    }

    public function index() {
        $config = array();
        $config['table'] = 'announcement a';
        $config['column'] = array(
            array("title" => "judul", "field" => "a.title"),
            array("title" => "deskripsi", "field" => "a.sort_desc"),
            array("title" => "create", "field" => "a.created_at"),
        );
        $config['crud'] = array('create');
        parent::reads($config);
    }

    public function create() {
//        $config = array();
//        $config['table'] = 'announcement';
//        $config['input'] = array(
//            array('id' => 'title', 'title' => 'id', 'field' => 'title', 'type' => 'hidden', 'value' => $this->session->userdata('id')),
//            array('id' => 'title', 'title' => 'Judul', 'field' => 'title', 'type' => 'text'),
//            array('id' => 'desc', 'title' => 'Keterangan Singkat', 'field' => 'sort_desc', 'type' => 'text'),
//            array('id' => 'fullDesc', 'title' => 'Keterangan Lengkap', 'field' => 'full_desc', 'type' => 'textarea'),
//            array('id' => 'gambar', 'title' => 'Gambar', 'field' => 'url_img', 'type' => 'file'),
//        );
//        parent::insert($config);
        if($this->input->post('simpan')){
            $this->model->create();
        }
        $this->render('create');
    }

}
