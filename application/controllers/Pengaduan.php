<?php

class Pengaduan extends MY_Controller {

    protected $module = "pengaduan";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_pengaduan", "model");
    }

    public function index() {
        $config['search'] = array('nelayan', 'title', 'latitude', 'longitude');
        $config['filter'] = array(
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
        $config['peta'] = TRUE;
        parent::reads($config);
    }

    public function detail() {
        $this->subTitle = 'Detail';
        if (!$this->input->post('read')) {
            redirect($this->module);
        }
        $result = $this->model->read($this->input->post('read'));
        $this->data['dataLaporan'] = $result['main'];
        $this->render('detail');
    }

    public function edit() {
        if ($this->input->post('save')) {
            if ($this->model->edit()) {
                $result = $this->model->get($this->input->post('id'));
                $notif = $this->send_notif($result['id_fisherman'], "Status Pengaduan", 'Pengaduanmu "' . $result['title'] . '" ' . $this->input->post('status'));
                if ($notif == TRUE) {
                    $data = array(
                        'id_complaintment' => $result['id'],
                        'message' => $this->input->post('status'),
                    );
                    if ($this->model->notif($data)) {
                        $this->session->set_flashdata('msgSuccess', 'Status berhasil diupdates');
                    } else {
                        $this->session->set_flashdata('msgError', 'Insert Error');
                    }
                } else {
                    $this->session->set_flashdata('msgError', $notif);
                }
                redirect($this->module);
            } else {
                $this->session->set_flashdata('msgError', 'Status gagal diupdate');
            }
        } else if (!$this->input->post('edit')) {
            redirect($this->module);
        }
        $this->data['id'] = $this->input->post('edit');
        $this->subTitle = 'Edit';
        $result = $this->model->read($this->data['id']);
        $this->data['dataLaporan'] = $result['main'];
        $this->data['dataFiles'] = $result['files'];
        $this->render('edit');
    }

    public function peta() {
        $this->render('peta');
    }

    public function koordinat() {
        echo json_encode($this->model->koordinat());
    }

}
