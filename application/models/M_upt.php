<?php

class M_upt extends CI_Model {
    private $table="upt";
    
    function alat() {
        $this->db->select('id, name');
        return $this->db->get('gear')->result_array();
    }

    function ikan() {
        $this->db->select('id, name');
        return $this->db->get('fish')->result_array();
    }
    function create() {
        $input= $this->input->post();
        $this->db->set('nama_kapal',$input['nama_kapal']);
        $this->db->set('id_gear',$input['jenis_alat_tangkap']);
        $this->db->set('jenis_kapal',$input['jenis_kapal']);
        $this->db->set('id_ikan',$input['jenis_ikan']);
        $this->db->set('volume',$input['volume']);
        $this->db->set('harga_lelang',$input['harga_lelang']);
        return $this->db->insert($this->table);
    }

}
