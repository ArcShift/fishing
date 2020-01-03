<?php

class M_admin extends CI_Model {

    public function create() {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['username'],
            'idUserType' => $post['type'],
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
        $this->db->select("u.id, r.nama AS type, u.nama");
        $this->db->join("role r", "u.idUserType = r.id");
        return $this->db->get("user u")->row_array();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('user')) {
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

    public function update() {//update
        $this->db->set("nama", $this->input->post("nama"));
        $this->db->set("idUserType", $this->input->post("type"));
        $this->db->where("id", $this->input->post("id"));
        return $this->db->update("user");
    }

}
