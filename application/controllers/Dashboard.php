<?php

class Dashboard extends MY_Controller {

    protected $module = "dashboard";

    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard', 'model');
    }

    public function index() {
        $upt = $this->user['role'] == 'UPT' ? $this->user['id'] : false;
        //WIDGET
        $this->data['countFisherman'] = $this->model->countFisherman();
        $this->data['countFish'] = $this->model->countFish();
        $this->data['countPengaduan'] = $this->model->countPengaduan();
        $this->data['countPengaduanTertangani'] = $this->model->countPengaduanTertangani();
        $this->data['pengumuman'] = $this->model->pengumuman();
        $this->data['newFisherman'] = $this->model->newFisherman();
        $this->data['totalCatch'] = $this->model->totalCatch();
        $this->data['weekCatch'] = $this->model->weekCatch();
        $this->data['kapal'] = $this->model->kapal($upt);
        $this->data['tangkapan'] = $this->model->tangkapan($upt);
        $this->data['keuntungan'] = $this->model->keuntungan($upt);
        //GRAFIK
        $result = $this->model->tahun($upt);
        if (!empty($result)) {//jika belum ada data
            $this->data['tahun'] = $result;
            if ($this->input->get('tahun')) {
                $this->data['dataGrafik'] = $this->model->jumlah($this->input->get('tahun'), $upt);
            } else {
                $this->data['dataGrafik'] = $this->model->jumlah($this->data['tahun'][0]['tahun'], $upt);
            }
        }
        //TABLE UPT
        if ($upt != false) {
            $this->data['upt_ikan'] = $this->model->upt_ikan($upt);
            $this->data['upt_kapal'] = $this->model->upt_kapal($upt);
        }
        //============
        $this->data['dataPeta'] = $this->model->dataPeta();
        $this->render('dashboard', false);
    }

}
