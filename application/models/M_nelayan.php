<?php

class M_nelayan extends CI_Model {

    private $table = "fisherman";

    public function reads($page) {
        $result= array();
        if ($this->input->post('nama')) {
            $this->db->like('name', $this->input->post('nama'));
        }
        $result['count']=$this->db->count_all_results($this->table, FALSE);
        $limit =$this->config->item('page_limit');
        $offset = $limit*($page-1);
        $this->db->limit($limit, $offset);
        $result['data']=$this->db->get()->result_array();
        return $result;
    }

    public function read($id, $method=null) {
        if($method == 'biodata'){
            $this->db->select('f.name, f.email, f.phone_number, COUNT(fp.id) AS postingan, f.bio, f.username, f.url_photo');
            $this->db->where('f.id', $id);
            $this->db->join('fisherman_post fp','fp.id_fisherman = f.id','left');
            $this->db->group_by('f.id');
            return $this->db->get($this->table." f")->row_array();
        }
        if($method == 'pengaduan'){
            $query = $this->db->query("SELECT fc.*, ff.url_file FROM fisherman_complaintment fc
                LEFT JOIN fisherman_complaintment_files ff ON ff.id_fisherman_complaintment = fc.id
                WHERE fc.id_fisherman = ?
            ", $id)->result_array();

            return $query;
        }
        if($method == 'postingan'){
            $query = $this->db->query("SELECT fp.* FROM fisherman_post fp
                WHERE fp.id_fisherman = ?
            ", $id)->result_array();

            return $query;
        }
        if($method == 'tangkapan ikan'){
            $query = $this->db->query("SELECT flc.*, f.name as fish_name FROM fisherman_log_catch_fish flc
                LEFT JOIN fish f ON f.id = flc.id_fish
                WHERE flc.id_fisherman = ?
            ", $id)->result_array();

            return $query;
        }
    }

    function get_pic($id, $method=null){
        if($method == 'complaint'){
            $query = $this->db->query("SELECT fcf.* FROM fisherman_complaintment_files fcf
                WHERE fcf.id_fisherman_complaintment = ?
            ", $id)->result_array();

            return $query;
        }
        if($method == 'catch'){
            $query = $this->db->query("SELECT flc.* FROM fisherman_log_catch_fish_files flc
                WHERE flc.id_fisherman_log_catch_fish = ?
            ", $id)->result_array();

            return $query;
        }
        if($method == 'post'){
            $query = $this->db->query("SELECT fpf.* FROM fisherman_post_files fpf
                WHERE fpf.id_fisherman_post = ?
            ", $id)->result_array();

            return $query;
        }
    }

    function get_cl_post($id, $method){
        if($method == 'like'){
            $query = $this->db->query("SELECT fpf.* FROM fisherman_post_likes fpf
                WHERE fpf.id_fisherman_post = ?
            ", $id)->result_array();

            return $query;
        }

        if($method == 'comment'){
            $query = $this->db->query("SELECT fpf.* FROM fisherman_post_comments fpf
                WHERE fpf.id_fisherman_post = ?
            ", $id)->result_array();

            return $query;
        }

        if($method == 'pic'){
            $query = $this->db->query("SELECT fpf.* FROM fisherman_post_files fpf
                WHERE fpf.id_fisherman_post = ?
            ", $id)->result_array();

            return $query;
        }    
    }

}
