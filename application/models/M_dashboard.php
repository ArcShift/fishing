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
    function tahun() {
        $this->db->select('YEAR (`date`) AS tahun');
        $this->db->group_by('YEAR(`date`) DESC');
        return $this->db->get('fisherman_log_catch_fish')->result_array();
    }
    function jumlah($tahun) {
        $this->db->select('MONTH(`date`) AS bulan_id, monthname(`date`) AS bulan ,sum(total_weight) AS jumlah_berat, count(id) AS jumlah_postingan , count(distinct id_fisherman) AS jumlah_nelayan');
        $this->db->where('year(`date`)', $tahun);
        $this->db->group_by('month(`date`)');
        return $this->db->get('fisherman_log_catch_fish')->result_array();
    }
    function dataPeta() {
        return $this->db->query('select source, date from(SELECT * FROM fishing.persebaran_ikan ORDER BY date desc) as t group by source')->result_array();
    }
}
