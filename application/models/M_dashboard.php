<?php

class M_dashboard extends CI_Model {

//    public function countAdmin() {
//        $this->db->where('idUserType <> 1');
//        return $this->db->count_all_results('user');
//    }

    public function countFisherman() {
        return $this->db->count_all('fisherman');
    }

    public function countFish() {
        return $this->db->count_all('fish');
    }

    public function countPengaduan() {
        return $this->db->count_all('fisherman_complaintment');
    }

    public function countPengaduanTertangani() {
        $this->db->where('status', 'selesai');
        return $this->db->count_all_results('fisherman_complaintment');
    }

    function pengumuman() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get('announcement')->row_array();
    }

    function newFisherman() {
        $this->db->where('date(created_at) >= CURDATE() - interval 7 day');
        return $this->db->count_all_results('fisherman');
    }

    function totalCatch() {
        $this->db->select_sum('total_weight');
        return $this->db->get('fisherman_log_catch_fish')->row_array()['total_weight'];
    }
    function weekCatch() {
        $this->db->select_sum('total_weight');
        $this->db->where('date(created_at) >= CURDATE() - interval 7 day');
        return $this->db->get('fisherman_log_catch_fish')->row_array()['total_weight'];
    }

}
