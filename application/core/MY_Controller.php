<?php

class MY_Controller extends CI_Controller {

    protected $module = null;
    protected $subTitle = null;
    protected $data = array();
    protected $aksesModule = array(
        "Super Admin" => array('dashboard', 'akun', 'user', 'nelayan', 'ikan', 'pengaduan', 'tangkapan', 'peta', 'peralatan', 'pengumuman', 'dokumen', 'setting', 'upt', 'role'),
        "Admin Perikanan" => array('dashboard', 'akun', 'user', 'nelayan', 'ikan', 'pengaduan', 'tangkapan', 'peta', 'peralatan', 'pengumuman', 'dokumen', 'setting'),
        "Supervisor Bappeda" => array('dashboard', 'akun', 'peta', 'pengaduan', 'tangkapan'),
        "Supervisor Perikanan" => array('dashboard', 'akun', 'user', 'peta', 'pengaduan', 'tangkapan'),
        "UPT" => array("dashboard", "akun", "peta", "ikan", "peralatan", "upt")
    );

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('user')) {//cek login user
            redirect('login');
        } else if (!in_array($this->module, $this->aksesModule[$this->session->userdata('role')])) {
            die('no access');
        } else {
            $this->load->model("base_model", "b_model");
        }
    }

    protected function render($view, $includeModule = true) {
        $this->data['module'] = $this->module;
        $this->data['subTitle'] = $this->subTitle;
        $this->data['aksesModule'] = $this->aksesModule[$this->session->userdata('role')];
        if ($includeModule) {
            $this->data['view'] = $this->module . '/' . $view;
        } else {
            $this->data['view'] = $view;
        }
        $this->load->view('template/container', $this->data);
    }

    protected function reads($config) {
        $this->subTitle = "List";
        $pagination = array(
            "module" => $this->module,
            "page" => 1,
        );
        if ($this->module == $this->session->userdata('pagination')["module"]) {
            $pagination = $this->session->userdata('pagination');
        }
        if ($this->input->post('page')) {
            $pagination['page'] = $this->input->post('page');
        } else if ($this->input->post('cari')) {
            $pagination['page'] = 1;
        } else if ($this->input->post('sort')) {
            $pagination['sort'] = $this->input->post('sort');
        }
        if (isset($config['filter'])) {
            for ($i = 0; $i < count($config['filter']); $i++) {
                if ($config['filter'][$i]['type'] == 'select_query') {
                    $config['filter'][$i]['result'] = $this->db->query($config['filter'][$i]['query'])->result_array();
                }
            }
        }
        if (isset($config['filter_query'])) {
            for ($i = 0; $i < count($config['filter_query']); $i++) {
                $config['filter_query'][$i]['data'] = $this->db->query($config['filter_query'][$i]['query'])->result_array();
            }
        }
        $this->session->set_userdata('pagination', $pagination);
        $this->data['pagination'] = $pagination;
        $result = $this->b_model->reads($pagination, $config);
        $this->data['config'] = $config;
        $this->data['dataCount'] = $result['count'];
        $this->data['data'] = $result['data'];
        $this->render('template/reads', false);
    }

    protected function insert($config) {
        $this->subTitle = 'create';
        $this->data['input'] = $config['input'];
        if ($this->input->post('simpan')) {
            $this->model->insert($config);
        }
        $this->render('template/create', FALSE);
    }

    protected function edit() {
        if ($this->input->post('edit')) {
            $id = $this->input->post('edit');
        } else if ($this->input->post('update')) {
            if ($this->model->update()) {
                redirect($this->uri->segment(1));
            } else {
                $id = $this->input->post('update');
            }
        } else {
            redirect($this->uri->segment(1));
        }
        $this->subTitle = 'edit';
        $this->data['data'] = $this->model->read($id);
        $this->render('edit');
    }

    protected function hapus($config) {
        $this->subTitle = "delete";
        if ($this->input->post('initDelete')) {
            $this->data['config'] = $config;
            $this->data['data'] = $this->b_model->read($config);
            $this->render('template/delete', FALSE);
        } else if ($this->input->post('delete')) {
            if ($this->b_model->delete($config)) {
                $this->session->set_flashdata('msgSuccess', 'Data berhasil dihapus');
            } else {
                $this->session->set_flashdata('msgError', 'Data gagal dihapus');
            }
            redirect($this->module);
        } else {
            redirect($this->module);
        }
    }

    protected function upload($folder, $input) {
        $config['upload_path'] = $this->config->item('upload_path') . $folder;
        $config['max_size'] = 5000000000000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;
        $config['allowed_types'] = '*';
//        die(print_r($config));
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($input)) {
            $this->session->set_flashdata('msgError', $this->upload->display_errors());
            return false;
        } else {
            return true;
        }
    }

}
