<?php

class Base_model extends CI_Model {

    function reads($pagination, $data) {
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
        if(isset($pagination['sort'])){
            $this->db->order_by($pagination['sort']);
        }
        
        $result['count'] = $this->db->count_all_results($data['table'], FALSE);
        $limit = $this->config->item('page_limit');
        $offset = $limit * ($pagination['page'] - 1);
        $this->db->limit($limit, $offset);
        $result['data'] = $this->db->get()->result_array();
        return $result;
    }

    function insert($config) {
//        die(print_r($input));
//        die(print_r($this->input->post()));
        foreach ($config['input'] as $in) {
            $this->db->set($in['field'], $this->input->post($in['id']));
        }
        $this->db->insert($config['table']);
    }

}
