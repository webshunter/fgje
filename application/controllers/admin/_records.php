<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class _records extends CI_Controller {

	private $table1 = '_records';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/_records/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tipe","date","table name","table id","data", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/_records/view', $data);
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
                        'row' => ["tipe","date","table_name","table_id","data"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tipe","date","table_name","table_id","data"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tipe", "2"=>"date", "3"=>"table_name", "4"=>"table_id", "5"=>"data"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/_records/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/_records/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tipe = post("tipe");
$date = post("date");
$table_name = post("table_name");
$table_id = post("table_id");
$data = post("data");

        

        $simpan = $this->db->query("
            INSERT INTO _records
            (tipe,date,table_name,table_id,data) VALUES ('$tipe','$date','$table_name','$table_id','$data')
        ");
    

        if($simpan){
            redirect('admin/_records');
        }
    }

    public function update(){
          $key = post('id'); $tipe = post("tipe");
$date = post("date");
$table_name = post("table_name");
$table_id = post("table_id");
$data = post("data");

        $simpan = $this->db->query("
            UPDATE _records SET  tipe = '$tipe', date = '$date', table_name = '$table_name', table_id = '$table_id', data = '$data' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/_records');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-_records.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tipe","date","table name","table id","data", "action"];

        $calldata = ["tipe","date","table_name","table_id","data"];

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
