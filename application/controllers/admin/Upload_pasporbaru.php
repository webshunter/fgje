<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Upload_pasporbaru extends CI_Controller {

	private $table1 = 'upload_pasporbaru';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/upload_pasporbaru/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id biodata","namadok","penting","cekdokumen","tglterima","keterangan","no","status","tampilkan","file", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/upload_pasporbaru/view', $data);
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
                        'row' => ["namadok","penting","cekdokumen","tglterima","keterangan","id_pasporbaru","status","tampilkan","file"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pasporbaru',
                        'data' => ["namadok","penting","cekdokumen","tglterima","keterangan","id_pasporbaru","status","tampilkan","file"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pasporbaru', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"namadok", "2"=>"penting", "3"=>"cekdokumen", "4"=>"tglterima", "5"=>"keterangan", "6"=>"id_pasporbaru", "7"=>"status", "8"=>"tampilkan", "9"=>"file"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pasporbaru = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/upload_pasporbaru/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pasporbaru = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/upload_pasporbaru/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$namadok = post("namadok");
$penting = post("penting");
$cekdokumen = post("cekdokumen");
$tglterima = post("tglterima");
$keterangan = post("keterangan");
$status = post("status");
$tampilkan = post("tampilkan");
$file = post("file");

        

        $simpan = $this->db->query("
            INSERT INTO upload_pasporbaru
            (id_biodata,namadok,penting,cekdokumen,tglterima,keterangan,status,tampilkan,file) VALUES ('$id_biodata','$namadok','$penting','$cekdokumen','$tglterima','$keterangan','$status','$tampilkan','$file')
        ");
    

        if($simpan){
            redirect('admin/upload_pasporbaru');
        }
    }

    public function update(){
          $key = post('id_pasporbaru'); $id_biodata = post("id_biodata");
$namadok = post("namadok");
$penting = post("penting");
$cekdokumen = post("cekdokumen");
$tglterima = post("tglterima");
$keterangan = post("keterangan");
$status = post("status");
$tampilkan = post("tampilkan");
$file = post("file");

        $simpan = $this->db->query("
            UPDATE upload_pasporbaru SET  id_biodata = '$id_biodata', namadok = '$namadok', penting = '$penting', cekdokumen = '$cekdokumen', tglterima = '$tglterima', keterangan = '$keterangan', status = '$status', tampilkan = '$tampilkan', file = '$file' WHERE id_pasporbaru = '$key'
            ");
    

        if($simpan){
            redirect('admin/upload_pasporbaru');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-upload_pasporbaru.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id biodata","namadok","penting","cekdokumen","tglterima","keterangan","no","status","tampilkan","file", "action"];

        $calldata = ["namadok","penting","cekdokumen","tglterima","keterangan","id_pasporbaru","status","tampilkan","file"];

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