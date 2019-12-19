<?php

class Dashboard extends MY_Controller {

    protected $module = "dashboard";

    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard', 'model');
    }

    public function index() {
        //WIDGET
        $this->data['countFisherman'] = $this->model->countFisherman();
        $this->data['countFish'] = $this->model->countFish();
        $this->data['countPengaduan'] = $this->model->countPengaduan();
        $this->data['countPengaduanTertangani'] = $this->model->countPengaduanTertangani();
        $this->data['pengumuman'] = $this->model->pengumuman();
        $this->data['newFisherman'] = $this->model->newFisherman();
        $this->data['totalCatch'] = $this->model->totalCatch();
        $this->data['weekCatch'] = $this->model->weekCatch();
        //GRAFIK
        $this->data['tahun'] = $this->model->tahun();
        if ($this->input->get('tahun')) {
            $this->data['dataGrafik'] = $this->model->jumlah($this->input->get('tahun'));
        } else {
            $this->data['dataGrafik'] = $this->model->jumlah($this->data['tahun'][0]['tahun']);
        }
        //============
        $this->render('dashboard', false);
    }

}
