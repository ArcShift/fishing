<?php

class M_tangkapan extends CI_Model {

    function koordinat() {
        $this->db->select('latitude, longitude, total_weight, description');
        return $this->db->get('fisherman_log_catch_fish')->result_array();
    }

}
