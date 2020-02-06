<?php

class M_admin extends CI_Model {

    public function create() {
        $post = $this->input->post();
        $data = array(
            'full_name' => $post['fullName'],
            'nama' => $post['username'],
            'idUserType' => $post['type'],
            'email' => $post['email'],
            'no_hp' => $post['noHP'],
            'pass' => md5($post['pass'])
        );
        if ($this->db->insert('user', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function detail($id) {
        $this->db->where('u.id', $id);
        $this->db->select("u.*, r.nama AS type");
        $this->db->join("role r", "u.idUserType = r.id");
        return $this->db->get("user u")->row_array();
    }

    public function gantiPassword() {
        $this->db->set("pass", md5($this->input->post("newPass")));
        $this->db->where("id", $this->input->post("id"));
        return $this->db->update("user");
    }

    public function update() {
        $this->db->set("full_name", $this->input->post("fullName"));
        $this->db->set("nama", $this->input->post("nama"));
        $this->db->set("idUserType", $this->input->post("type"));
        $this->db->set("email", $this->input->post("email"));
        $this->db->set("no_hp", $this->input->post("noHP"));
        $this->db->where("id", $this->input->post("id"));
        return $this->db->update("user");
    }

}
