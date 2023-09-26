<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pplk extends CI_Controller {

	private $table1 = 'pplk';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pplk/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nopermonhonan","tglpermohonan","tujuanpermohonan","datatki","pinjaman","aproval","tgl aproval","deleted", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pplk/view', $data);
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
                        'row' => ["nopermonhonan","tglpermohonan","tujuanpermohonan","datatki","pinjaman","aproval","tgl_aproval","deleted"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nopermonhonan","tglpermohonan","tujuanpermohonan","datatki","pinjaman","aproval","tgl_aproval","deleted"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nopermonhonan", "2"=>"tglpermohonan", "3"=>"tujuanpermohonan", "4"=>"datatki", "5"=>"pinjaman", "6"=>"aproval", "7"=>"tgl_aproval", "8"=>"deleted"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pplk/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pplk/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nopermonhonan = post("nopermonhonan");
$tglpermohonan = post("tglpermohonan");
$tujuanpermohonan = post("tujuanpermohonan");
$datatki = post("datatki");
$pinjaman = post("pinjaman");
$aproval = post("aproval");
$tgl_aproval = post("tgl_aproval");
$deleted = post("deleted");

        

        $simpan = $this->db->query("
            INSERT INTO pplk
            (nopermonhonan,tglpermohonan,tujuanpermohonan,datatki,pinjaman,aproval,tgl_aproval,deleted) VALUES ('$nopermonhonan','$tglpermohonan','$tujuanpermohonan','$datatki','$pinjaman','$aproval','$tgl_aproval','$deleted')
        ");
    

        if($simpan){
            redirect('admin/pplk');
        }
    }

    public function update(){
          $key = post('id'); $nopermonhonan = post("nopermonhonan");
$tglpermohonan = post("tglpermohonan");
$tujuanpermohonan = post("tujuanpermohonan");
$datatki = post("datatki");
$pinjaman = post("pinjaman");
$aproval = post("aproval");
$tgl_aproval = post("tgl_aproval");
$deleted = post("deleted");

        $simpan = $this->db->query("
            UPDATE pplk SET  nopermonhonan = '$nopermonhonan', tglpermohonan = '$tglpermohonan', tujuanpermohonan = '$tujuanpermohonan', datatki = '$datatki', pinjaman = '$pinjaman', aproval = '$aproval', tgl_aproval = '$tgl_aproval', deleted = '$deleted' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/pplk');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pplk.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nopermonhonan","tglpermohonan","tujuanpermohonan","datatki","pinjaman","aproval","tgl aproval","deleted", "action"];

        $calldata = ["nopermonhonan","tglpermohonan","tujuanpermohonan","datatki","pinjaman","aproval","tgl_aproval","deleted"];

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
