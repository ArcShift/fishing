<?php

class M_site extends CI_Model {

    function validate_email($gen) {
        $this->db->where('validation', $gen);
        $count = $this->db->count_all_results('fisherman');
        if ($count == 1) {
            $this->db->set('validation', 'VALIDATED');
            $this->db->where('validation', $gen);
            $this->db->update('fisherman');
            return true;
        } else {
            return false;
        }
    }

}
