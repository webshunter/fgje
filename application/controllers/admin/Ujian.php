<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Ujian extends CI_Controller {

	private $table1 = 'ujian';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/ujian/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","jenis ujian","nilai1","nilai2","nilai3","keterangan","tanggal","status", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/ujian/view', $data);
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
                        'row' => ["id_biodata","jenis_ujian","nilai1","nilai2","nilai3","keterangan","tanggal","status"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_ujian',
                        'data' => ["id_biodata","jenis_ujian","nilai1","nilai2","nilai3","keterangan","tanggal","status"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_ujian', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"jenis_ujian", "3"=>"nilai1", "4"=>"nilai2", "5"=>"nilai3", "6"=>"keterangan", "7"=>"tanggal", "8"=>"status"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_ujian = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/ujian/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_ujian = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/ujian/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$jenis_ujian = post("jenis_ujian");
$nilai1 = post("nilai1");
$nilai2 = post("nilai2");
$nilai3 = post("nilai3");
$keterangan = post("keterangan");
$tanggal = post("tanggal");
$status = post("status");

        

        $simpan = $this->db->query("
            INSERT INTO ujian
            (id_biodata,jenis_ujian,nilai1,nilai2,nilai3,keterangan,tanggal,status) VALUES ('$id_biodata','$jenis_ujian','$nilai1','$nilai2','$nilai3','$keterangan','$tanggal','$status')
        ");
    

        if($simpan){
            redirect('admin/ujian');
        }
    }

    public function update(){
          $key = post('id_ujian'); $id_biodata = post("id_biodata");
$jenis_ujian = post("jenis_ujian");
$nilai1 = post("nilai1");
$nilai2 = post("nilai2");
$nilai3 = post("nilai3");
$keterangan = post("keterangan");
$tanggal = post("tanggal");
$status = post("status");

        $simpan = $this->db->query("
            UPDATE ujian SET  id_biodata = '$id_biodata', jenis_ujian = '$jenis_ujian', nilai1 = '$nilai1', nilai2 = '$nilai2', nilai3 = '$nilai3', keterangan = '$keterangan', tanggal = '$tanggal', status = '$status' WHERE id_ujian = '$key'
            ");
    

        if($simpan){
            redirect('admin/ujian');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-ujian.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","jenis ujian","nilai1","nilai2","nilai3","keterangan","tanggal","status", "action"];

        $calldata = ["id_biodata","jenis_ujian","nilai1","nilai2","nilai3","keterangan","tanggal","status"];

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
