<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Detail_dokmajikan extends CI_Controller {

	private $table1 = 'detail_dokmajikan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/detail_dokmajikan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","dokumen","stats","status","id majikan", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/detail_dokmajikan/view', $data);
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
                        'row' => ["dokumen","stats","status","id_majikan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pembuatan',
                        'data' => ["dokumen","stats","status","id_majikan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pembuatan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"dokumen", "2"=>"stats", "3"=>"status", "4"=>"id_majikan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pembuatan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/detail_dokmajikan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pembuatan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/detail_dokmajikan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $dokumen = post("dokumen");
$stats = post("stats");
$status = post("status");
$id_majikan = post("id_majikan");

        

        $simpan = $this->db->query("
            INSERT INTO detail_dokmajikan
            (dokumen,stats,status,id_majikan) VALUES ('$dokumen','$stats','$status','$id_majikan')
        ");
    

        if($simpan){
            redirect('admin/detail_dokmajikan');
        }
    }

    public function update(){
          $key = post('id_pembuatan'); $dokumen = post("dokumen");
$stats = post("stats");
$status = post("status");
$id_majikan = post("id_majikan");

        $simpan = $this->db->query("
            UPDATE detail_dokmajikan SET  dokumen = '$dokumen', stats = '$stats', status = '$status', id_majikan = '$id_majikan' WHERE id_pembuatan = '$key'
            ");
    

        if($simpan){
            redirect('admin/detail_dokmajikan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-detail_dokmajikan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","dokumen","stats","status","id majikan", "action"];

        $calldata = ["dokumen","stats","status","id_majikan"];

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
