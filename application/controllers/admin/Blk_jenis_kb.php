<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jenis_kb extends CI_Controller {

	private $table1 = 'blk_jenis_kb';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jenis_kb/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode jenis kb","ket", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jenis_kb/view', $data);
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
                        'row' => ["kode_jenis_kb","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_jenis_kb',
                        'data' => ["kode_jenis_kb","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_jenis_kb', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_jenis_kb", "2"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_jenis_kb = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jenis_kb/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_jenis_kb = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jenis_kb/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_jenis_kb = post("kode_jenis_kb");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jenis_kb
            (kode_jenis_kb,ket) VALUES ('$kode_jenis_kb','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_jenis_kb');
        }
    }

    public function update(){
          $key = post('id_jenis_kb'); $kode_jenis_kb = post("kode_jenis_kb");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_jenis_kb SET  kode_jenis_kb = '$kode_jenis_kb', ket = '$ket' WHERE id_jenis_kb = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jenis_kb');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jenis_kb.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode jenis kb","ket", "action"];

        $calldata = ["kode_jenis_kb","ket"];

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
