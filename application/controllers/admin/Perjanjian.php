<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Perjanjian extends CI_Controller {

	private $table1 = 'perjanjian';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/perjanjian/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","sponsor","agen","tgl","majikan", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/perjanjian/view', $data);
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
                        'row' => ["id_biodata","sponsor","agen","tgl","majikan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_perjanjian',
                        'data' => ["id_biodata","sponsor","agen","tgl","majikan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_perjanjian', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"sponsor", "3"=>"agen", "4"=>"tgl", "5"=>"majikan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_perjanjian = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/perjanjian/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_perjanjian = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/perjanjian/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$sponsor = post("sponsor");
$agen = post("agen");
$tgl = post("tgl");
$majikan = post("majikan");

        

        $simpan = $this->db->query("
            INSERT INTO perjanjian
            (id_biodata,sponsor,agen,tgl,majikan) VALUES ('$id_biodata','$sponsor','$agen','$tgl','$majikan')
        ");
    

        if($simpan){
            redirect('admin/perjanjian');
        }
    }

    public function update(){
          $key = post('id_perjanjian'); $id_biodata = post("id_biodata");
$sponsor = post("sponsor");
$agen = post("agen");
$tgl = post("tgl");
$majikan = post("majikan");

        $simpan = $this->db->query("
            UPDATE perjanjian SET  id_biodata = '$id_biodata', sponsor = '$sponsor', agen = '$agen', tgl = '$tgl', majikan = '$majikan' WHERE id_perjanjian = '$key'
            ");
    

        if($simpan){
            redirect('admin/perjanjian');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-perjanjian.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","sponsor","agen","tgl","majikan", "action"];

        $calldata = ["id_biodata","sponsor","agen","tgl","majikan"];

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
