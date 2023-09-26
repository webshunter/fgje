<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Spl_cost extends CI_Controller {

	private $table1 = 'spl_cost';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/spl_cost/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tgl","tki","tipe","date created","date modified", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/spl_cost/view', $data);
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
                        'row' => ["tgl","tki","tipe","date_created","date_modified"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tgl","tki","tipe","date_created","date_modified"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tgl", "2"=>"tki", "3"=>"tipe", "4"=>"date_created", "5"=>"date_modified"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/spl_cost/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/spl_cost/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tgl = post("tgl");
$tki = post("tki");
$tipe = post("tipe");
$date_created = post("date_created");
$date_modified = post("date_modified");

        

        $simpan = $this->db->query("
            INSERT INTO spl_cost
            (tgl,tki,tipe,date_created,date_modified) VALUES ('$tgl','$tki','$tipe','$date_created','$date_modified')
        ");
    

        if($simpan){
            redirect('admin/spl_cost');
        }
    }

    public function update(){
          $key = post('id'); $tgl = post("tgl");
$tki = post("tki");
$tipe = post("tipe");
$date_created = post("date_created");
$date_modified = post("date_modified");

        $simpan = $this->db->query("
            UPDATE spl_cost SET  tgl = '$tgl', tki = '$tki', tipe = '$tipe', date_created = '$date_created', date_modified = '$date_modified' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/spl_cost');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-spl_cost.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tgl","tki","tipe","date created","date modified", "action"];

        $calldata = ["tgl","tki","tipe","date_created","date_modified"];

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
