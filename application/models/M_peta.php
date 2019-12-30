<?php

class M_peta extends CI_Model {

    function get() {
        $this->db->order_by('date', 'DESC');
        return $this->db->get('persebaran_ikan')->row_array();
    }

    function create() {
        $in = $this->input->post();
        $this->db->set('user', $this->session->userdata('userId'));
        $this->db->set('source', $in['sumber']);
        $this->db->set('date', $in['tanggal']);
        $this->db->set('file', $this->upload->data()['file_name']);
        return $this->db->insert('persebaran_ikan');
    }

    function pengaduan_json() {//geojson
        $this->db->select('latitude, longitude, title, description');
//        return $result = $this->db->get('fisherman_complaintment')->result_array();
        $result = $this->db->get('fisherman_complaintment')->result_array();
        //====standard geojson data
        $data = array();
        foreach ($result as $r) {
            array_push($data, array($r['longitude'], $r['latitude']));
        }
        $geojson = array(
            "type" => "FeatureCollection",
            "features" => array(
                array(
                    "type" => "Feature",
                    "properties" => null,
                    "geometry" => array(
                        "type" => "LineString",
                        "coordinates" => $data
                    )
                )
            )
        );
        return $geojson;
    }

    function peta($source) {
        $this->db->select('file');
        $this->db->where('source', $source);
        $this->db->order_by('created_at', 'DESC');
        $r=$this->db->get('persebaran_ikan')->row_array();
        return base_url('upload/persebaran_ikan/'.$r['file']);
    }

}
