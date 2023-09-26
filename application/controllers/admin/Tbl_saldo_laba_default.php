<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tbl_saldo_laba_default extends CI_Controller {

	private $table1 = 'tbl_saldo_laba_default';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/tbl_saldo_laba_default/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id saldo laba","nominal","tgl", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_saldo_laba_default/view', $data);
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
                        'row' => ["nominal","tgl"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => '',
                        'data' => ["nominal","tgl"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nominal", "2"=>"tgl"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE  = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tbl_saldo_laba_default/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE  = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_saldo_laba_default/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_saldo_laba = post("id_saldo_laba");
$nominal = post("nominal");
$tgl = post("tgl");

        

        $simpan = $this->db->query("
            INSERT INTO tbl_saldo_laba_default
            (id_saldo_laba,nominal,tgl) VALUES ('$id_saldo_laba','$nominal','$tgl')
        ");
    

        if($simpan){
            redirect('admin/tbl_saldo_laba_default');
        }
    }

    public function update(){
          $key = post(''); $id_saldo_laba = post("id_saldo_laba");
$nominal = post("nominal");
$tgl = post("tgl");

        $simpan = $this->db->query("
            UPDATE tbl_saldo_laba_default SET  id_saldo_laba = '$id_saldo_laba', nominal = '$nominal', tgl = '$tgl' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/tbl_saldo_laba_default');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-tbl_saldo_laba_default.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id saldo laba","nominal","tgl", "action"];

        $calldata = ["nominal","tgl"];

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
