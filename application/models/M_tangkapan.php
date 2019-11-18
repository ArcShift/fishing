<?php

class M_tangkapan extends CI_Model {

    function jumlah($tahun) {
        $this->db->select('MONTH(`date`) AS bulan_id, monthname(`date`) AS bulan ,sum(total_weight) AS jumlah_berat, count(id) AS jumlah_postingan , count(distinct id_fisherman) AS jumlah_nelayan');
        $this->db->where('year(`date`)',$tahun);
        $this->db->group_by('month(`date`)');
        return $this->db->get('fisherman_log_catch_fish')->result_array();
    }
    function tahun() {
        $this->db->select('YEAR (`date`) AS tahun');
        $this->db->group_by('YEAR(`date`) DESC');
        return $this->db->get('fisherman_log_catch_fish')->result_array();
    }

}
