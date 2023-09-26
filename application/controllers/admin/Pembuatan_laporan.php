<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembuatan_laporan extends CI_Controller {

	private $table1 = 'pembuatan_laporan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pembuatan_laporan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nomor","tanggal","tglmulai","tglakhir","date", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_laporan/view', $data);
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
                        'row' => ["nomor","tanggal","tglmulai","tglakhir","date"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pembuatan',
                        'data' => ["nomor","tanggal","tglmulai","tglakhir","date"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pembuatan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nomor", "2"=>"tanggal", "3"=>"tglmulai", "4"=>"tglakhir", "5"=>"date"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pembuatan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pembuatan_laporan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pembuatan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_laporan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nomor = post("nomor");
$tanggal = post("tanggal");
$tglmulai = post("tglmulai");
$tglakhir = post("tglakhir");
$date = post("date");

        

        $simpan = $this->db->query("
            INSERT INTO pembuatan_laporan
            (nomor,tanggal,tglmulai,tglakhir,date) VALUES ('$nomor','$tanggal','$tglmulai','$tglakhir','$date')
        ");
    

        if($simpan){
            redirect('admin/pembuatan_laporan');
        }
    }

    public function update(){
          $key = post('id_pembuatan'); $nomor = post("nomor");
$tanggal = post("tanggal");
$tglmulai = post("tglmulai");
$tglakhir = post("tglakhir");
$date = post("date");

        $simpan = $this->db->query("
            UPDATE pembuatan_laporan SET  nomor = '$nomor', tanggal = '$tanggal', tglmulai = '$tglmulai', tglakhir = '$tglakhir', date = '$date' WHERE id_pembuatan = '$key'
            ");
    

        if($simpan){
            redirect('admin/pembuatan_laporan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pembuatan_laporan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nomor","tanggal","tglmulai","tglakhir","date", "action"];

        $calldata = ["nomor","tanggal","tglmulai","tglakhir","date"];

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
