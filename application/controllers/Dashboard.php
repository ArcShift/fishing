<?php

class Dashboard extends MY_Controller {

    protected $module = "dashboard";

    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard', 'model');
    }

    public function index() {
//        $this->data['countAdmin'] = $this->model->countAdmin();
        $this->data['countFisherman'] = $this->model->countFisherman();
        $this->data['countFish'] = $this->model->countFish();
        $this->data['countPengaduan'] = $this->model->countPengaduan();
        $this->data['countPengaduanTertangani'] = $this->model->countPengaduanTertangani();
        $this->data['pengumuman'] = $this->model->pengumuman();
        $this->data['newFisherman'] = $this->model->newFisherman();
        $this->data['totalCatch'] = $this->model->totalCatch();
        $this->data['weekCatch'] = $this->model->weekCatch();
        $this->render('dashboard', false);
    }

}
