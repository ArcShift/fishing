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

    public function read($id) {
        $this->db->select('f.name, f.email, f.phone_number, COUNT(fp.id) AS postingan, f.bio, f.username, f.url_photo');
        $this->db->where('f.id', $id);
        $this->db->join('fisherman_post fp','fp.id_fisherman = f.id','left');
        $this->db->group_by('f.id');
        return $this->db->get($this->table." f")->row_array();
    }

}
