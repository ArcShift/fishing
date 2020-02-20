<?php

class M_dashboard extends CI_Model {

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

    function tahun($upt) {
        $this->db->select('YEAR (`date`) AS tahun');
        $this->db->group_by('YEAR(`date`) DESC');
        if ($upt == false) {
            $table = 'fisherman_log_catch_fish';
        } else {
            $table = 'rekap_upt';
            $this->db->where('idAdmin', $upt);
        }
        return $this->db->get($table)->result_array();
    }

    function jumlah($tahun, $upt) {
        $this->db->where('year(`date`)', $tahun);
        $this->db->group_by('month(`date`)');
        if ($upt == false) {
            $table = 'fisherman_log_catch_fish';
            $this->db->select('MONTH(`date`) AS bulan_id, monthname(`date`) AS bulan ,sum(total_weight) AS jumlah_berat, count(id) AS jumlah_postingan , count(distinct id_fisherman) AS jumlah_nelayan');
        } else {
            $table = 'rekap_upt';
            $this->db->select('MONTH(`date`) AS bulan_id, monthname(`date`) AS bulan ,sum(volume) AS jumlah_berat');
            $this->db->where('idAdmin', $upt);
        }
        return $this->db->get($table)->result_array();
    }

    function dataPeta() {
        return $this->db->query('select source, date from(SELECT * FROM fishing.persebaran_ikan ORDER BY date desc) as t group by source')->result_array();
    }

    function kapal($upt) {
        $this->db->select('COUNT(DISTINCT nama_kapal)AS total');
        if ($upt != false) {
            $this->db->where('idAdmin', $upt);
        }
        $result = $this->db->get('rekap_upt')->row_array();
        return $result['total'];
    }

    function tangkapan($upt) {
        $this->db->select_sum('volume');
        if ($upt != false) {
            $this->db->where('idAdmin', $upt);
        }
        $result = $this->db->get('rekap_upt')->row_array();
        return $result['volume'];
    }

    function keuntungan($upt) {
        $this->db->select('SUM(volume * harga_lelang) AS total');
        if ($upt != false) {
            $this->db->where('idAdmin', $upt);
        }
        $result = $this->db->get('rekap_upt')->row_array();
        return $result['total'];
    }

    function upt_ikan($upt) {
        $this->db->select('f.name AS ikan, SUM(volume) AS vol');
        $this->db->join('fish f', 'f.id=ru.id_ikan');
        $this->db->where('ru.idAdmin', $upt);
        $this->db->group_by('ru.id_ikan');
        $result = $this->db->get('rekap_upt ru')->result_array();
        return $result;
    }

    function upt_kapal($upt) {
        $this->db->select('nama_kapal AS kapal, SUM(ru.volume) AS vol');
        $this->db->where('ru.idAdmin', $upt);
        $this->db->group_by('ru.nama_kapal');
        $result = $this->db->get('rekap_upt ru')->result_array();
        return $result;
    }

}
