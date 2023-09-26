<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_bayar_ujk extends CI_Controller {

	private $table1 = 'blk_bayar_ujk';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_bayar_ujk/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","noresi","tglsurat","lembagalsp","biayamurni","biayaulang","id laporan bulanan", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_bayar_ujk/view', $data);
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
                        'row' => ["noresi","tglsurat","lembagalsp","biayamurni","biayaulang","id_laporan_bulanan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_bayar_ujk',
                        'data' => ["noresi","tglsurat","lembagalsp","biayamurni","biayaulang","id_laporan_bulanan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_bayar_ujk', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"noresi", "2"=>"tglsurat", "3"=>"lembagalsp", "4"=>"biayamurni", "5"=>"biayaulang", "6"=>"id_laporan_bulanan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_bayar_ujk = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_bayar_ujk/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_bayar_ujk = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_bayar_ujk/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $noresi = post("noresi");
$tglsurat = post("tglsurat");
$lembagalsp = post("lembagalsp");
$biayamurni = post("biayamurni");
$biayaulang = post("biayaulang");
$id_laporan_bulanan = post("id_laporan_bulanan");

        

        $simpan = $this->db->query("
            INSERT INTO blk_bayar_ujk
            (noresi,tglsurat,lembagalsp,biayamurni,biayaulang,id_laporan_bulanan) VALUES ('$noresi','$tglsurat','$lembagalsp','$biayamurni','$biayaulang','$id_laporan_bulanan')
        ");
    

        if($simpan){
            redirect('admin/blk_bayar_ujk');
        }
    }

    public function update(){
          $key = post('id_bayar_ujk'); $noresi = post("noresi");
$tglsurat = post("tglsurat");
$lembagalsp = post("lembagalsp");
$biayamurni = post("biayamurni");
$biayaulang = post("biayaulang");
$id_laporan_bulanan = post("id_laporan_bulanan");

        $simpan = $this->db->query("
            UPDATE blk_bayar_ujk SET  noresi = '$noresi', tglsurat = '$tglsurat', lembagalsp = '$lembagalsp', biayamurni = '$biayamurni', biayaulang = '$biayaulang', id_laporan_bulanan = '$id_laporan_bulanan' WHERE id_bayar_ujk = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_bayar_ujk');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_bayar_ujk.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","noresi","tglsurat","lembagalsp","biayamurni","biayaulang","id laporan bulanan", "action"];

        $calldata = ["noresi","tglsurat","lembagalsp","biayamurni","biayaulang","id_laporan_bulanan"];

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
