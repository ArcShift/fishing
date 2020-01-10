<?php

class Setting extends MY_Controller {

    protected $module = 'setting';

    public function __construct() {
        parent::__construct();
        $this->load->model("m_setting", "model");
    }

    public function cleanup() {
        $this->subTitle = 'clean up';
        $stat = array(
            array('title' => 'Profil', 'path' => 'profil', 'db' => 'fisherman', 'field' => 'url_photo'),
            array('title' => 'Postingan', 'path' => 'post', 'db' => 'fisherman_post_files', 'field' => 'url_file'),
            array('title' => 'Ikan', 'path' => 'ikan', 'db' => 'fish', 'field' => 'url_photo'),
            array('title' => 'Tangkapan', 'path' => 'tangkapan', 'db' => 'fisherman_log_catch_fish_files', 'field' => 'url_file'),
            array('title' => 'Pengaduan', 'path' => 'pengaduan', 'db' => 'fisherman_complaintment_files', 'field' => 'url_file'),
            array('title' => 'Persebaran Ikan', 'path' => 'persebaran_ikan', 'db' => 'persebaran_ikan', 'field' => 'file'),
            array('title' => 'Dokumen', 'path' => 'dokumen', 'db' => 'document', 'field' => 'url'),
            array('title' => 'Pengumuman', 'path' => 'pengumuman', 'db' => 'announcement', 'field' => 'url_img'),
      
        );
        foreach ($stat as $k=>$s) {
            $hapus= false;
            if($this->input->post('hapus')==$k){
                $hapus=true;
            }
            $stat[$k]['total'] = $this->run_cleanup($s['path'],$s['db'],$s['field'],$hapus);
        }
        $this->data['stat']=$stat;
        $this->render('cleanup');
    }

    private function run_cleanup($path, $db, $field, $delete = false) {
        $d = scandir($this->config->item('upload_path') . $path);
        $n = 0;
        for ($i = 0; $i < count($d); $i++) {
            if ($i > 1) {
                $r = $this->model->cleanup($db, $field, $d[$i]);
                if (!$r) {
                    if ($delete) {
                        unlink($this->config->item('upload_path') . $path.'/'.$d[$i]);
                    } else {
                        $n++;
                    }
                }
            }
        }
        return $n;
    }

}
