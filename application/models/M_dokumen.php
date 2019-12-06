<?php

class M_dokumen extends CI_Model {

    function create() {
        $this->db->set('title', $this->input->post('judul'));
        $this->db->set('user', $this->session->userdata('userId'));
        $this->db->set('url', $this->upload->data()['file_name']);
        return $this->db->insert('document');
    }

    function read($id) {
        $this->db->where('id', $id);
        return $this->db->get('document')->row_array();
    }
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('document');
        //TODO delete file
    }

}
