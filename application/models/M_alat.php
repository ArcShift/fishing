<?php

class M_alat extends CI_Model {

    function create() {
        $input = $this->input->post();
        $this->db->set('name', $input['name']);
        $this->db->set('description', $input['desc']);
        if ($this->db->insert('gear')) {
            $this->session->set_flashdata('msgSuccess', 'Data berhasil dibuat');
            return true;
        } else {
            $this->session->set_flashdata('msgError', $this->db->error()['message']);
            return false;
        }
    }

    function read($id) {
        $this->db->where('id', $id);
        return $this->db->get('gear')->row_array();
    }

    function update() {
        $input= $this->input->post();
        $this->db->set('name', $input['name']);
        $this->db->set('description', $input['desc']);
        $this->db->where('id', $input['id']);
        $this->db->update('gear');
    }

    function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('gear')) {
            return true;
        } else {
            return false;
        }
    }

}
