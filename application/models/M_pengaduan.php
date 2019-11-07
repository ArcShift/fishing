<?php

class M_pengaduan extends CI_Model {

    function read($id) {
        $result = array();
        $this->db->select("fc.id, f.name, fc.description, fc.status");
        $this->db->where('fc.id', $id);
        $this->db->join('fisherman f', 'fc.id_fisherman= f.id');
        $result['main'] = $this->db->get('fisherman_complaintment fc')->result_array()[0];
        $this->db->where('fc.id', $id);
        $this->db->join('fisherman_complaintment fc', 'fc.id= fcf.id_fisherman_complaintment');
        $result['files'] = $this->db->get('fisherman_complaintment_files fcf')->result_array();
        return $result;
    }
    function edit() {
        $this->db->set("status", $this->input->post("status"));
        $this->db->where("id",$this->input->post("id"));
        return $this->db->update("fisherman_complaintment");
    }

}