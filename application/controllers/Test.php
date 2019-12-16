<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test
 *
 * @author Jelajah Tekno Indone
 */
class Test extends CI_Controller {

    public function pengaduan() {
        $this->load->model("m_peta", "model");
        $r = $this->model->pengaduan_json();
        $feature = $json = array(
            'type' => 'FeatureCollection',
            'features' => array(
                array(
                    'type' => 'Feature',
                    'properties' => array(),
                    'geometry' => array(
                        'type' => 'circle',
                        'coordinates' => $r
                    )
                )
            )
        );
        echo json_encode($json);
//        echo json_encode($r);
    }

}
