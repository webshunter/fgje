<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_penilaian_fisik_mental extends CI_Controller {

	private $table1 = 'blk_penilaian_fisik_mental';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_penilaian_fisik_mental/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","idbio","tgl ang","instruktur","id nilai","id materi", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_penilaian_fisik_mental/view', $data);
        $this->load->view('templateadmin/footer');
	}

	public function table_show($action = 'show', $keyword = '')
	{
		if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $this->Datatable_gugus->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
						"*"
					],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["idbio","tgl_ang","instruktur","id_nilai","id_materi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_penilaian_fisik_mental',
                        'data' => ["idbio","tgl_ang","instruktur","id_nilai","id_materi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_penilaian_fisik_mental', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"idbio", "2"=>"tgl_ang", "3"=>"instruktur", "4"=>"id_nilai", "5"=>"id_materi"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_penilaian_fisik_mental = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_penilaian_fisik_mental/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_penilaian_fisik_mental = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_penilaian_fisik_mental/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $idbio = post("idbio");
$tgl_ang = post("tgl_ang");
$instruktur = post("instruktur");
$id_nilai = post("id_nilai");
$id_materi = post("id_materi");

        

        $simpan = $this->db->query("
            INSERT INTO blk_penilaian_fisik_mental
            (idbio,tgl_ang,instruktur,id_nilai,id_materi) VALUES ('$idbio','$tgl_ang','$instruktur','$id_nilai','$id_materi')
        ");
    

        if($simpan){
            redirect('admin/blk_penilaian_fisik_mental');
        }
    }

    public function update(){
          $key = post('id_penilaian_fisik_mental'); $idbio = post("idbio");
$tgl_ang = post("tgl_ang");
$instruktur = post("instruktur");
$id_nilai = post("id_nilai");
$id_materi = post("id_materi");

        $simpan = $this->db->query("
            UPDATE blk_penilaian_fisik_mental SET  idbio = '$idbio', tgl_ang = '$tgl_ang', instruktur = '$instruktur', id_nilai = '$id_nilai', id_materi = '$id_materi' WHERE id_penilaian_fisik_mental = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_penilaian_fisik_mental');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_penilaian_fisik_mental.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","idbio","tgl ang","instruktur","id nilai","id materi", "action"];

        $calldata = ["idbio","tgl_ang","instruktur","id_nilai","id_materi"];

        for ($i = 0, $l = sizeof($headers); $i < $l; $i++) {
            $sheet->setCellValueByColumnAndRow($i + 1, 1, $headers[$i]);
        }
        
        $qr = $this->db->query("SELECT * FROM $this->table1")->result();

        foreach($qr as $i => $vv){
            $j = 1;
            $sheet->setCellValueByColumnAndRow(0 + 1, ($i + 1 + 1), $i + 1);
            foreach ($calldata as $k => $v) { // column $j
                $sheet->setCellValueByColumnAndRow($j + 1, ($i + 1 + 1), $vv->$v);
                $j++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
        $writer->save('php://output');

    }


}
