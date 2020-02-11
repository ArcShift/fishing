<?php

require './vendor/autoload.php';

class Upt extends MY_Controller {

    protected $module = "upt";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_upt", "model");
    }

    public function index() {
    }

}
