<?php

class Base_model extends CI_Model {

    function reads($page, $data) {
        $result = array();
        if (isset($data['filter'])) {
            foreach ($data['filter'] as $f) {
                if ($this->input->post($f['title'])) {
                    foreach ($data['column'] as $c) {
                        if ($f['title'] == $c['title']) {
                            $this->db->like($c['field'], $this->input->post($f['title']));
                            if ($f['type'] == 'select_query') {//TODO: exact search query 
                            } else if ($f['type'] == 'input') {                                
                            }
                        }
                    }
                }
            }
        }
        $this->db->select(substr($data['table'], strpos($data['table'], " ") + 1) . '.id');
        foreach ($data['column'] as $c) {
            $this->db->select($c['field'] . " AS " . $c['title']);
        }
        if (isset($data['join'])) {
            foreach ($data['join'] as $j) {
                $this->db->join($j['table'], $j['relation']);
            }
        }
        $result['count'] = $this->db->count_all_results($data['table'], FALSE);
        $limit = $this->config->item('page_limit');
        $offset = $limit * ($page - 1);
        $this->db->limit($limit, $offset);
        $result['data'] = $this->db->get()->result_array();
        return $result;
    }

}
