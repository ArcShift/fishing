<?php

class User extends MY_Controller {

    protected $module = "user";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_admin", "model");
        $this->load->model("m_role");
        $this->data['roles'] = $this->m_role->read();
        $this->load->library('form_validation');
    }

    public function index() {
        $config = array();
        $config['search']= array('username');
        $config['filter'] = array(
            array("title" => "type", "type" => "select_query", "query" => "SELECT id AS k, nama AS v FROM role WHERE id<>1")
        );
        $config['table'] = "user u";
        $config['column'] = array(
            array("title" => "username", "field" => "u.nama"),
            array("title" => "type", "field" => "r.nama"),
        );
        $config['join'] = array(
            array("table" => "role r", "relation" => "u.idUserType = r.id"),
        );
        $this->db->where('r.id<>1'); // hide super admin
        $config['crud'] = array('create', 'update', 'delete');
        parent::reads($config);
    }

    public function create() {
        $this->subTitle = "Create";
        if ($this->input->post('create')) {
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.nama]');
            $this->form_validation->set_rules('pass', 'Password', 'required');
            $this->form_validation->set_rules('passConfirm', 'Ulangi Password', 'required|matches[pass]');
            if ($this->form_validation->run()) {
                if ($this->model->create()) {
                    $this->session->set_flashdata('msgSuccess', 'Data berhasil disimpan');
                    redirect($this->module);
                } else {
                    $this->session->set_flashdata('msgError', 'Insert data gagal');
                }
            }
        }
        $this->render("create");
    }

    public function edit() {
        if (!empty($this->session->flashdata('id'))) {
            $this->data['data'] = $this->model->detail($this->session->flashdata('id'));
        } else if ($this->input->post('update')) {
            if ($this->model->update()) {
                $this->session->set_flashdata('msgSuccess', 'Berhasil mengupdate data');
                redirect($this->module);
            } else {
                $this->data['data'] = $this->model->detail($this->input->post('id'));
            }
        } else if ($this->input->post('changePass')) {
            $this->form_validation->set_rules('newPass', 'Password Baru', 'required');
            $this->form_validation->set_rules('confirmPass', 'Konfirmasi Password', 'required|matches[newPass]');
            if ($this->form_validation->run()) {
                if ($this->model->gantiPassword()) {
                    $this->session->set_flashdata('msgSuccess', 'Password berhasil diganti');
                    redirect($this->module);
                } else {
                    $this->session->set_flashdata('msgError', 'Gagal mengganti password');
                }
            }
            $this->data['data'] = $this->model->detail($this->input->post('id'));
        } else {
            redirect($this->module);
        }
        $this->subTitle = "Edit";
        $this->render('edit');
    }

    public function delete() {
        $this->subTitle = "Delete";
        if (!empty($this->session->flashdata('id'))) {
            $this->data['data'] = $this->model->detail($this->session->flashdata('id'));
        } elseif ($this->input->post('delete')) {
            $id = $this->input->post('delete');
            if ($id == $this->session->userId) {
                $this->session->set_flashdata('msgError', 'Tidak bisa menghapus data anda sendiri');
            } elseif ($this->model->delete($id)) {
                $this->session->set_flashdata('msgSuccess', 'Berhasil menghapus data');
                redirect($this->module);
            } else {
                $this->session->set_flashdata('msgError', 'Gagal menghapus data');
                $this->data['data'] = $this->model->detail($id);
            }
        } else {
            redirect($this->module);
        }
        $this->render("delete");
    }

}
