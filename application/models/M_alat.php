<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_alat
 *
 * @author Jelajah Tekno Indone
 */
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
    
    function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('gear')) {
            return true;
        } else {
            return false;
        }
    }

}
