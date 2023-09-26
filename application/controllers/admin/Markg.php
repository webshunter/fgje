<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Markg extends CI_Controller {

	private $table1 = 'markg';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/markg/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl cair","nilai tma","nilai tmi", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/markg/view', $data);
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
                        'row' => ["id_biodata","tgl_cair","nilai_tma","nilai_tmi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_markg',
                        'data' => ["id_biodata","tgl_cair","nilai_tma","nilai_tmi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_markg', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_cair", "3"=>"nilai_tma", "4"=>"nilai_tmi"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_markg = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/markg/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_markg = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/markg/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_cair = post("tgl_cair");
$nilai_tma = post("nilai_tma");
$nilai_tmi = post("nilai_tmi");

        

        $simpan = $this->db->query("
            INSERT INTO markg
            (id_biodata,tgl_cair,nilai_tma,nilai_tmi) VALUES ('$id_biodata','$tgl_cair','$nilai_tma','$nilai_tmi')
        ");
    

        if($simpan){
            redirect('admin/markg');
        }
    }

    public function update(){
          $key = post('id_markg'); $id_biodata = post("id_biodata");
$tgl_cair = post("tgl_cair");
$nilai_tma = post("nilai_tma");
$nilai_tmi = post("nilai_tmi");

        $simpan = $this->db->query("
            UPDATE markg SET  id_biodata = '$id_biodata', tgl_cair = '$tgl_cair', nilai_tma = '$nilai_tma', nilai_tmi = '$nilai_tmi' WHERE id_markg = '$key'
            ");
    

        if($simpan){
            redirect('admin/markg');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-markg.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl cair","nilai tma","nilai tmi", "action"];

        $calldata = ["id_biodata","tgl_cair","nilai_tma","nilai_tmi"];

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
