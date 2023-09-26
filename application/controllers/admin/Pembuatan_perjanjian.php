<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembuatan_perjanjian extends CI_Controller {

	private $table1 = 'pembuatan_perjanjian';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pembuatan_perjanjian/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nomor","lembur","namasaksi","hubsaksi","id tki","namadinas","tanggal","a1","a2","a3","a4","a5","a6","a7", "action"]);
        $this->Createtable->order_set('0, 14');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_perjanjian/view', $data);
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
                        'row' => ["nomor","lembur","namasaksi","hubsaksi","id_tki","namadinas","tanggal","a1","a2","a3","a4","a5","a6","a7"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pembuatan',
                        'data' => ["nomor","lembur","namasaksi","hubsaksi","id_tki","namadinas","tanggal","a1","a2","a3","a4","a5","a6","a7"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pembuatan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nomor", "2"=>"lembur", "3"=>"namasaksi", "4"=>"hubsaksi", "5"=>"id_tki", "6"=>"namadinas", "7"=>"tanggal", "8"=>"a1", "9"=>"a2", "10"=>"a3", "11"=>"a4", "12"=>"a5", "13"=>"a6", "14"=>"a7"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pembuatan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pembuatan_perjanjian/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pembuatan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_perjanjian/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nomor = post("nomor");
$lembur = post("lembur");
$namasaksi = post("namasaksi");
$hubsaksi = post("hubsaksi");
$id_tki = post("id_tki");
$namadinas = post("namadinas");
$tanggal = post("tanggal");
$a1 = post("a1");
$a2 = post("a2");
$a3 = post("a3");
$a4 = post("a4");
$a5 = post("a5");
$a6 = post("a6");
$a7 = post("a7");

        

        $simpan = $this->db->query("
            INSERT INTO pembuatan_perjanjian
            (nomor,lembur,namasaksi,hubsaksi,id_tki,namadinas,tanggal,a1,a2,a3,a4,a5,a6,a7) VALUES ('$nomor','$lembur','$namasaksi','$hubsaksi','$id_tki','$namadinas','$tanggal','$a1','$a2','$a3','$a4','$a5','$a6','$a7')
        ");
    

        if($simpan){
            redirect('admin/pembuatan_perjanjian');
        }
    }

    public function update(){
          $key = post('id_pembuatan'); $nomor = post("nomor");
$lembur = post("lembur");
$namasaksi = post("namasaksi");
$hubsaksi = post("hubsaksi");
$id_tki = post("id_tki");
$namadinas = post("namadinas");
$tanggal = post("tanggal");
$a1 = post("a1");
$a2 = post("a2");
$a3 = post("a3");
$a4 = post("a4");
$a5 = post("a5");
$a6 = post("a6");
$a7 = post("a7");

        $simpan = $this->db->query("
            UPDATE pembuatan_perjanjian SET  nomor = '$nomor', lembur = '$lembur', namasaksi = '$namasaksi', hubsaksi = '$hubsaksi', id_tki = '$id_tki', namadinas = '$namadinas', tanggal = '$tanggal', a1 = '$a1', a2 = '$a2', a3 = '$a3', a4 = '$a4', a5 = '$a5', a6 = '$a6', a7 = '$a7' WHERE id_pembuatan = '$key'
            ");
    

        if($simpan){
            redirect('admin/pembuatan_perjanjian');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pembuatan_perjanjian.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nomor","lembur","namasaksi","hubsaksi","id tki","namadinas","tanggal","a1","a2","a3","a4","a5","a6","a7", "action"];

        $calldata = ["nomor","lembur","namasaksi","hubsaksi","id_tki","namadinas","tanggal","a1","a2","a3","a4","a5","a6","a7"];

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
