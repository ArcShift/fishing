<?php

class Base_model extends CI_Model {

    function reads($pagination, $data) {
        $result = array();
//        die(print_r($data));
        if (isset($data['search']) && $this->input->post('search')) {
            foreach ($data['search'] as $key => $s) {
                foreach ($data['column'] as $c) {
                    if ($s == $c['title']) {
                        if ($key == 0) {
                            $this->db->like($c['field'], $this->input->post('search'));
                        } else {
                            $this->db->or_like($c['field'], $this->input->post('search'));
                        }
                    }
                }
            }
        }
        if (isset($data['filter'])) {
            foreach ($data['filter'] as $f) {
                if ($this->input->post($f['title'])) {
                    foreach ($data['column'] as $c) {
                        if ($f['title'] == $c['title']) {
                            $this->db->like($c['field'], $this->input->post($f['title']));
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
        if (isset($pagination['sort'])) {
            foreach ($data['column'] as $c) {
                if ($pagination['sort'] == $c['title']) {
                    $this->db->order_by($c['field']);
                }
            }
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

    function read($config) {
        $idField = isset($config['idField']) ? $config['idField'] : 'id';
        foreach ($config['field'] as $f) {
            $this->db->select($f['field'] . " AS " . $f['title']);
        }
        if (isset($config['join'])) {
            foreach ($config['join'] as $j) {
                $this->db->join($j['table'], $j['relation']);
            }
        }
        $this->db->where(substr($config['table'], strpos($config['table'], " ") + 1) . '.' . $idField, $this->session->flashdata('id'));
        return $this->db->get($config['table'])->row_array();
    }

    function delete($config) {
        $idField = isset($config['idField']) ? $config['idField'] : 'id';
        $this->db->where($idField, $this->input->post('delete'));
        return $this->db->delete(explode(' ', $config['table'])[0]);
    }

}
