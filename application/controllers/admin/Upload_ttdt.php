<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Upload_ttdt extends CI_Controller {

	private $table1 = 'upload_ttdt';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/upload_ttdt/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","pinho","namadok","penting","cekdokumen","tglterima","keterangan","tgl input", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/upload_ttdt/view', $data);
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
                        'row' => ["pinho","namadok","penting","cekdokumen","tglterima","keterangan","tgl_input"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["pinho","namadok","penting","cekdokumen","tglterima","keterangan","tgl_input"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"pinho", "2"=>"namadok", "3"=>"penting", "4"=>"cekdokumen", "5"=>"tglterima", "6"=>"keterangan", "7"=>"tgl_input"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/upload_ttdt/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/upload_ttdt/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $pinho = post("pinho");
$namadok = post("namadok");
$penting = post("penting");
$cekdokumen = post("cekdokumen");
$tglterima = post("tglterima");
$keterangan = post("keterangan");
$tgl_input = post("tgl_input");

        

        $simpan = $this->db->query("
            INSERT INTO upload_ttdt
            (pinho,namadok,penting,cekdokumen,tglterima,keterangan,tgl_input) VALUES ('$pinho','$namadok','$penting','$cekdokumen','$tglterima','$keterangan','$tgl_input')
        ");
    

        if($simpan){
            redirect('admin/upload_ttdt');
        }
    }

    public function update(){
          $key = post('id'); $pinho = post("pinho");
$namadok = post("namadok");
$penting = post("penting");
$cekdokumen = post("cekdokumen");
$tglterima = post("tglterima");
$keterangan = post("keterangan");
$tgl_input = post("tgl_input");

        $simpan = $this->db->query("
            UPDATE upload_ttdt SET  pinho = '$pinho', namadok = '$namadok', penting = '$penting', cekdokumen = '$cekdokumen', tglterima = '$tglterima', keterangan = '$keterangan', tgl_input = '$tgl_input' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/upload_ttdt');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-upload_ttdt.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","pinho","namadok","penting","cekdokumen","tglterima","keterangan","tgl input", "action"];

        $calldata = ["pinho","namadok","penting","cekdokumen","tglterima","keterangan","tgl_input"];

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
