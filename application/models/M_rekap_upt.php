<?php

class M_rekap_upt extends CI_Model {

    private $table = "rekap_upt";

    function alat() {
        $this->db->select('id, name');
        return $this->db->get('gear')->result_array();
    }

    function ikan() {
        $this->db->select('id, name');
        return $this->db->get('fish')->result_array();
    }

    function create() {
        $input = $this->input->post();
        $this->db->set('date', $input['tanggal']);
        $this->db->set('nama_kapal', $input['nama_kapal']);
        $this->db->set('id_gear', $input['jenis_alat_tangkap']);
        $this->db->set('jenis_kapal', $input['jenis_kapal']);
        $this->db->set('id_ikan', $input['jenis_ikan']);
        $this->db->set('volume', $input['volume']);
        $this->db->set('harga_lelang', $input['harga_lelang']);
        return $this->db->insert($this->table);
    }

    function read($id) {
        return $this->db->get($this->table)->row_array();
    }

    function update() {
        $in = $this->input->post();
        $this->db->set('date', $in['tanggal']);
        $this->db->set('nama_kapal', $in['nama_kapal']);
        $this->db->set('id_gear', $in['jenis_alat_tangkap']);
        $this->db->set('jenis_kapal', $in['jenis_kapal']);
        $this->db->set('id_ikan', $in['jenis_ikan']);
        $this->db->set('volume', $in['volume']);
        $this->db->set('harga_lelang', $in['harga_lelang']);
        $this->db->where('id', $in['update']);
        return $this->db->update($this->table);
    }

//-------------------------------------------
    function cek_id_ikan($ikan) {
        $param = array();
        $query = "SELECT id FROM fish WHERE name LIKE ?";
        $param[] = "%" . $ikan . "%";

        $result = $this->db->query($query, $param)->row_array()['id'];

        if (isset($result)) {
            return $result;
        } else {
            $this->db->trans_begin();

            $this->db->query("INSERT INTO fish (name, created_at) VALUES(?,NOW())", $ikan);
            $id = $this->db->insert_id();

            if ($this->db->trans_status() == false) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return $id;
            }
        }
    }

    function insert_data_upt($data) {
        $this->db->trans_begin();
        $this->db->query("INSERT INTO rekap_upt (date, nama_kapal, id_gear, jenis_kapal, id_ikan, volume, harga_lelang, idAdmin) Values
        (?,?,?,?,?,?,?,?)
      ", $data);

        if ($this->db->trans_status() == false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function get_alat_tangkap($alat) {
        $cek_alat = $this->db->query("SELECT id FROM gear WHERE name LIKE ?", "%" . $alat . "%")->row_array()['id'];

        if (isset($cek_alat)) {
            return $cek_alat;
        } else {
            $this->db->trans_begin();

            $this->db->query("INSERT INTO gear (name, created_at) VALUES(?,NOW())", $alat);
            $id = $this->db->insert_id();

            if ($this->db->trans_status() == false) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return $id;
            }
        }
    }

}
