<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Brifing extends CI_Controller {

	private $table1 = 'brifing';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/brifing/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tgl start","tgl ending","tgl brifing","jam brifing","tempat brifing", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/brifing/view', $data);
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
                        'row' => ["tgl_start","tgl_ending","tgl_brifing","jam_brifing","tempat_brifing"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tgl_start","tgl_ending","tgl_brifing","jam_brifing","tempat_brifing"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tgl_start", "2"=>"tgl_ending", "3"=>"tgl_brifing", "4"=>"jam_brifing", "5"=>"tempat_brifing"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/brifing/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/brifing/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tgl_start = post("tgl_start");
$tgl_ending = post("tgl_ending");
$tgl_brifing = post("tgl_brifing");
$jam_brifing = post("jam_brifing");
$tempat_brifing = post("tempat_brifing");

        

        $simpan = $this->db->query("
            INSERT INTO brifing
            (tgl_start,tgl_ending,tgl_brifing,jam_brifing,tempat_brifing) VALUES ('$tgl_start','$tgl_ending','$tgl_brifing','$jam_brifing','$tempat_brifing')
        ");
    

        if($simpan){
            redirect('admin/brifing');
        }
    }

    public function update(){
          $key = post('id'); $tgl_start = post("tgl_start");
$tgl_ending = post("tgl_ending");
$tgl_brifing = post("tgl_brifing");
$jam_brifing = post("jam_brifing");
$tempat_brifing = post("tempat_brifing");

        $simpan = $this->db->query("
            UPDATE brifing SET  tgl_start = '$tgl_start', tgl_ending = '$tgl_ending', tgl_brifing = '$tgl_brifing', jam_brifing = '$jam_brifing', tempat_brifing = '$tempat_brifing' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/brifing');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-brifing.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tgl start","tgl ending","tgl brifing","jam brifing","tempat brifing", "action"];

        $calldata = ["tgl_start","tgl_ending","tgl_brifing","jam_brifing","tempat_brifing"];

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
