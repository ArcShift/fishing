<?php

class M_pengumuman extends CI_Model {

    function create() {
        $in = $this->input->post();
        $this->db->set('title', $in['judul']);
        $this->db->set('sort_desc', $in['sortDesc']);
        $this->db->set('full_desc', $in['fullDesc']);
        $this->db->set('user', $in['user']);
        $this->db->set('url_img', $this->upload->data()['file_name']);
        return $this->db->insert('announcement');
    }

}
