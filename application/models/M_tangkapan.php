<?php

class M_tangkapan extends CI_Model {

    function jumlah() {
        $this->db->select('monthname(`date`) AS bulan ,sum(total_weight) AS jumlah_berat, count(id) AS jumlah_postingan , count(distinct id_fisherman) AS jumlah_nelayan');
        $this->db->where('year(`date`)','2019');
        $this->db->group_by('month(`date`)');
        return $this->db->get('fisherman_log_catch_fish')->result_array();
    }

}
