<?php
require './vendor/autoload.php';

class Rekap_upt extends MY_Controller {

    protected $module = "rekap_upt";

    public function __construct() {
        parent::__construct();
        $this->load->model("m_rekap_upt", "model");
        $this->data['alat'] = $this->model->alat(); //create, edit
        $this->data['ikan'] = $this->model->ikan();
    }

    public function index() {
        $config['search'] = array('nama kapal', 'alat', 'jenis kapal', 'ikan');
        $config['table'] = "rekap_upt ru";
        $config['join'] = array(
            array("table" => "gear g", "relation" => "g.id = ru.id_gear"),
            array("table" => "fish f", "relation" => "f.id = ru.id_ikan"),
        );
        $config['column'] = array(
            array("title" => "tanggal", "field" => "ru.tanggal"),
            array("title" => "nama kapal", "field" => "ru.nama_kapal"),
            array("title" => "alat", "field" => "g.name"),
            array("title" => "jenis kapal", "field" => "ru.jenis_kapal"),
            array("title" => "ikan", "field" => "f.name"),
            array("title" => "volume", "field" => "ru.volume"),
            array("title" => "harga", "field" => "ru.harga_lelang"),
        );
        $config['crud'] = array('create', 'update', 'delete');
        parent::reads($config);
    }

    public function create() {
        if ($this->input->post('create')) {
            if ($this->model->create()) {
                redirect($this->module);
            }
        }
        $this->render('create');
    }

    function edit() {
        parent:: edit();
    }

    function delete() {
        $config['table'] = 'rekap_upt ru';
        $config['join'] = array(
            array("table" => "gear g", "relation" => "g.id = ru.id_gear"),
            array("table" => "fish f", "relation" => "f.id = ru.id_ikan"),
        );
        $config['field'] = array(
            array("title" => "tanggal", "field" => "ru.tanggal"),
            array("title" => "nama kapal", "field" => "ru.nama_kapal"),
            array("title" => "alat", "field" => "g.name"),
            array("title" => "jenis kapal", "field" => "ru.jenis_kapal"),
            array("title" => "ikan", "field" => "f.name"),
            array("title" => "volume", "field" => "ru.volume"),
            array("title" => "harga", "field" => "ru.harga_lelang"),
        );
        parent::hapus($config);
    }

    public function import_upt() {
        if (!empty($_FILES['upload_xls'])) {
            $file = $_FILES['upload_xls'];

            //var_dump($file);

            $filename = 'data_upt' . date('YmdHis');

            $config['file_name'] = $filename;
            $config['upload_path'] = './upload';
            $config['allowed_types'] = '*';
            $config['max_size'] = '5120'; // 5 MB
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('upload_xls')) {
                $errors = array('error' => $this->upload->display_errors());
                //var_dump($this->upload->do_upload());
                //print_r($errors);
                //die();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('msg', "Data Material!");
                //$this->proses_excel($id_penerima);
                //echo 'sukses';die();
                //------------------------
                $pathfile = 'upload/' . $filename . '.xlsx';

                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($pathfile);
                $sheet = $spreadsheet->getSheet(0);
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                $tgl = $sheet->rangeToArray('B' . 6 . ':' . $highestColumn . 6, NULL, TRUE, FALSE)[0][0];

                for ($row = 6; $row <= $highestRow; $row++) {                  //  Read a row of data into an array
                    $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

                    $list_ikan = array(4 => "MADIDIHANG (YFT)", "MADIDIHANG* (YFT < 10 KG)", "TUNA MATA BESAR", "ALBAKOR", "CAKALANG", "TONGKOL", "LEMURU", "MARLIN", "LEMADANG", "LAYUR", "EKOR MERAH", "PEPEREK", "SALEM", "LAYANG");

                    for ($i = 5; $i <= 17; $i++) {
                        if (!is_null($rowData[0][$i])) {
                            $id_ikan = $this->model->cek_id_ikan($list_ikan[$i]);
                        }
                    }

                    if (!is_null($rowData[0][2])) {
                        $alat_tangkap = $this->model->get_alat_tangkap($rowData[0][2]);
                    } else {
                        $alat_tangkap = 1;
                    }

                    if (!is_null($rowData[0][0])) {
                        $tanggal = str_replace('/', '-', $rowData[0][0]);
                        $tanggal = date("Y-m-d", strtotime($tanggal));
                    } else {
                        $tanggal = str_replace('/', '-', $tgl);
                        $tanggal = date("Y-m-d", strtotime($tanggal));
                    }

                    if (isset($rowData[0][1]) && $rowData[0][1] != NULL) {
                        $data = array(
                            "tanggal" => $tanggal,
                            "nama_kapal" => $rowData[0][1],
                            "id_gear" => $alat_tangkap,
                            "jenis_kapal" => $rowData[0][3],
                            "id_ikan" => !empty($id_ikan) ? $id_ikan : 0,
                            "volume" => $rowData[0][20],
                            "harga_lelang" => $rowData[0][19],
                            "user" => $this->user['id'],
                        );
                        $status = $this->model->insert_data_upt($data);
                    }
                }

                if ($status) {
                    $this->session->set_flashdata('msg', "Material berhasil ditambahkan!");
                } else {
                    $this->session->set_flashdata('msgw', "Material gagal ditambahkan!");
                }
                //---------------------------
                unlink(FCPATH . $pathfile);

                redirect($this->module);
            }
        }
        $this->render('import_upt');
    }

}
