<?php

class M_module extends CI_Model {

    public function create() {
        $data = array(
            "nama" => $this->input->post("nama")
        );
        if($this->input->post("induk")){
            $data['parent']=$this->input->post("induk");
        }
        if ($this->db->insert("module", $data)) {
            $this->session->set_userdata('menu', $this->model->read());
            return 'success';
        } else {
            return $this->db->_error_message();
        }
    }

    public function read() {
        $this->db->select("m.id, m.nama, p.nama AS induk, p.id AS indukId");
        $this->db->join("module p", "m.parent=p.id", "left");
        return $this->db->get("module m")->result_array();
    }

    public function update() {
        
    }

    public function delete() {
        $this->db->where("id", $this->input->post("id"));
        if ($this->db->delete("module")) {
            $this->session->set_userdata('menu', $this->model->read());
            return 'success';
        } else {
            return $this->db->_error_message();
        }
    }

    public function structure() {
        $result = $this->db->get("module m")->result_array();
    }

    public function sort() {
        
    }

}
