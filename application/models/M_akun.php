<?php

class M_akun extends CI_Model {

    function detail($id) {
        $this->db->where('u.id', $id);
        $this->db->select("u.*, r.nama AS type");
        $this->db->join("role r", "u.idUserType = r.id");
        return $this->db->get("user u")->row_array();
    }

    public function updateData() {//update profil
        $this->db->set("full_name", $this->input->post("fullName"));
        $this->db->set("nama", $this->input->post("nama"));
        $this->db->set("email", $this->input->post("email"));
        $this->db->set("no_hp", $this->input->post("noHP"));
        $this->db->where("id", $this->input->post("id"));
        return $this->db->update("user");
    }

    public function checkPass() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->where('pass', md5($this->input->post('pass')));
        $result = $this->db->get('user');
        if ($result->num_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function gantiPassword() {
        $this->db->set("pass", md5($this->input->post("newPass")));
        $this->db->where("id", $this->input->post("id"));
        return $this->db->update("user");
    }

}
