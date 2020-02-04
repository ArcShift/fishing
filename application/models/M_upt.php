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


//-------------------------------------------
    function cek_id_ikan($ikan) {
      $param = array();
      $query = "SELECT id FROM fish WHERE name LIKE ?";
      $param[] = "%".$ikan."%";

      $result = $this->db->query($query, $param)->row_array()['id'];

      if(isset($result)) {
          return $result;
      }else {
        $this->db->trans_begin();

        $this->db->query("INSERT INTO fish (name, created_at) VALUES(?,NOW())", $ikan);
        $id = $this->db->insert_id();

        if($this->db->trans_status() == false){
          $this->db->trans_rollback();
          return false;
        }else {
          $this->db->trans_commit();
          return $id;
        }
      }

    }

    function insert_data_upt($data) {
      $this->db->trans_begin();
      $this->db->query("INSERT INTO upt (tanggal, nama_kapal, id_gear, jenis_kapal, id_ikan, volume, harga_lelang) Values
        (?,?,?,?,?,?,?)
      ", $data);

      if($this->db->trans_status() == false){
        $this->db->trans_rollback();
        return false;
      }else {
        $this->db->trans_commit();
        return true;
      }
    }

    function get_alat_tangkap($alat) {
      $cek_alat = $this->db->query("SELECT id FROM gear WHERE name LIKE ?", "%".$alat."%")->row_array()['id'];

      if(isset($cek_alat)){
        return $cek_alat;
      }else {
        $this->db->trans_begin();

        $this->db->query("INSERT INTO gear (name, created_at) VALUES(?,NOW())", $alat);
        $id = $this->db->insert_id();

        if($this->db->trans_status() == false){
          $this->db->trans_rollback();
          return false;
        }else {
          $this->db->trans_commit();
          return $id;
        }
      }
    }

}
