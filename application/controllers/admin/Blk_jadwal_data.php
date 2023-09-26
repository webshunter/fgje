<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jadwal_data extends CI_Controller {

	private $table1 = 'blk_jadwal_data';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jadwal_data/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","paket id","tanggal","instruktur kode", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal_data/view', $data);
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
                        'row' => ["paket_id","tanggal","instruktur_kode"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_jadwal_data',
                        'data' => ["paket_id","tanggal","instruktur_kode"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_jadwal_data', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"paket_id", "2"=>"tanggal", "3"=>"instruktur_kode"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_jadwal_data = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jadwal_data/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_jadwal_data = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal_data/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $paket_id = post("paket_id");
$tanggal = post("tanggal");
$instruktur_kode = post("instruktur_kode");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jadwal_data
            (paket_id,tanggal,instruktur_kode) VALUES ('$paket_id','$tanggal','$instruktur_kode')
        ");
    

        if($simpan){
            redirect('admin/blk_jadwal_data');
        }
    }

    public function update(){
          $key = post('id_jadwal_data'); $paket_id = post("paket_id");
$tanggal = post("tanggal");
$instruktur_kode = post("instruktur_kode");

        $simpan = $this->db->query("
            UPDATE blk_jadwal_data SET  paket_id = '$paket_id', tanggal = '$tanggal', instruktur_kode = '$instruktur_kode' WHERE id_jadwal_data = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jadwal_data');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jadwal_data.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","paket id","tanggal","instruktur kode", "action"];

        $calldata = ["paket_id","tanggal","instruktur_kode"];

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
