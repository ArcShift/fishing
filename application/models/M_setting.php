<?php

class M_setting extends CI_Model {
    function cleanup($table, $field, $filename) {
        $this->db->select($field);
        $this->db->where($field, $filename);
        $result=$this->db->get($table)->row_array();        
        if(empty($result)){
            return false;
        }else{
            return true;
        }
//        $data= array();
//        foreach ($result as $r) {
//            array_push($data, $r[$field]);
//        }
//        return $data;
    }
}
