<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_ijin extends CI_Controller {

	private $table1 = 'blk_ijin';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_ijin/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl suntik kb","masa kb","berakhir kb","ket kb","status", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_ijin/view', $data);
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
                        'row' => ["id_biodata","tgl_suntik_kb","masa_kb","berakhir_kb","ket_kb","status"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_blk_ijin',
                        'data' => ["id_biodata","tgl_suntik_kb","masa_kb","berakhir_kb","ket_kb","status"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_blk_ijin', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_suntik_kb", "3"=>"masa_kb", "4"=>"berakhir_kb", "5"=>"ket_kb", "6"=>"status"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_blk_ijin = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_ijin/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_blk_ijin = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_ijin/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_suntik_kb = post("tgl_suntik_kb");
$masa_kb = post("masa_kb");
$berakhir_kb = post("berakhir_kb");
$ket_kb = post("ket_kb");
$status = post("status");

        

        $simpan = $this->db->query("
            INSERT INTO blk_ijin
            (id_biodata,tgl_suntik_kb,masa_kb,berakhir_kb,ket_kb,status) VALUES ('$id_biodata','$tgl_suntik_kb','$masa_kb','$berakhir_kb','$ket_kb','$status')
        ");
    

        if($simpan){
            redirect('admin/blk_ijin');
        }
    }

    public function update(){
          $key = post('id_blk_ijin'); $id_biodata = post("id_biodata");
$tgl_suntik_kb = post("tgl_suntik_kb");
$masa_kb = post("masa_kb");
$berakhir_kb = post("berakhir_kb");
$ket_kb = post("ket_kb");
$status = post("status");

        $simpan = $this->db->query("
            UPDATE blk_ijin SET  id_biodata = '$id_biodata', tgl_suntik_kb = '$tgl_suntik_kb', masa_kb = '$masa_kb', berakhir_kb = '$berakhir_kb', ket_kb = '$ket_kb', status = '$status' WHERE id_blk_ijin = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_ijin');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_ijin.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl suntik kb","masa kb","berakhir kb","ket kb","status", "action"];

        $calldata = ["id_biodata","tgl_suntik_kb","masa_kb","berakhir_kb","ket_kb","status"];

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
