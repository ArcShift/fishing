<?php

class Tangkapan extends MY_Controller {

    protected $module = "tangkapan";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_tangkapan", "model");
    }

    public function index() {
        $config['search']=array('nelayan', 'ikan','latitude', 'longitude');
        $config['table'] = "fisherman_log_catch_fish log";
        $config['join'] = array(
            array("table" => "fisherman fm", "relation" => "fm.id = log.id_fisherman"),
            array("table" => "fish f", "relation" => "f.id = log.id_fish"),
        );
        $config['column'] = array(
            array("title" => "nelayan", "field" => "fm.name"),
            array("title" => "ikan", "field" => "f.name"),
            array("title" => "berat", "field" => "log.total_weight"),
            array("title" => "latitude", "field" => "log.latitude"),
            array("title" => "longitude", "field" => "log.longitude"),
        );
        $config['crud'] = array('');
        $config['peta'] = TRUE;
        $this->db->order_by('log.id', 'DESC');
        parent::reads($config);
    }

    public function peta() {
        $this->subTitle = "peta";
        $this->render('peta');
    }

    public function koordinat() {
        echo json_encode($this->model->koordinat());
    }

}
