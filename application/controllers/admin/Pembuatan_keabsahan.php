<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembuatan_keabsahan extends CI_Controller {

	private $table1 = 'pembuatan_keabsahan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pembuatan_keabsahan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id tki","daerah","tanggal","nomor","kepada","no", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_keabsahan/view', $data);
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
                        'row' => ["daerah","tanggal","nomor","kepada","id_pembuatan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pembuatan',
                        'data' => ["daerah","tanggal","nomor","kepada","id_pembuatan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pembuatan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"daerah", "2"=>"tanggal", "3"=>"nomor", "4"=>"kepada", "5"=>"id_pembuatan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pembuatan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pembuatan_keabsahan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pembuatan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_keabsahan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_tki = post("id_tki");
$daerah = post("daerah");
$tanggal = post("tanggal");
$nomor = post("nomor");
$kepada = post("kepada");

        

        $simpan = $this->db->query("
            INSERT INTO pembuatan_keabsahan
            (id_tki,daerah,tanggal,nomor,kepada) VALUES ('$id_tki','$daerah','$tanggal','$nomor','$kepada')
        ");
    

        if($simpan){
            redirect('admin/pembuatan_keabsahan');
        }
    }

    public function update(){
          $key = post('id_pembuatan'); $id_tki = post("id_tki");
$daerah = post("daerah");
$tanggal = post("tanggal");
$nomor = post("nomor");
$kepada = post("kepada");

        $simpan = $this->db->query("
            UPDATE pembuatan_keabsahan SET  id_tki = '$id_tki', daerah = '$daerah', tanggal = '$tanggal', nomor = '$nomor', kepada = '$kepada' WHERE id_pembuatan = '$key'
            ");
    

        if($simpan){
            redirect('admin/pembuatan_keabsahan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pembuatan_keabsahan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id tki","daerah","tanggal","nomor","kepada","no", "action"];

        $calldata = ["daerah","tanggal","nomor","kepada","id_pembuatan"];

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
