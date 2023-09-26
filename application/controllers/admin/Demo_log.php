<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Demo_log extends CI_Controller {

	private $table1 = 'demo_log';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/demo_log/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["log time","user name","data","kelas", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/demo_log/view', $data);
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
                        'row' => ["user_name","data","kelas"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'log_time',
                        'data' => ["user_name","data","kelas"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['log_time', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"user_name", "2"=>"data", "3"=>"kelas"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE log_time = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/demo_log/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE log_time = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/demo_log/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $log_time = post("log_time");
$user_name = post("user_name");
$data = post("data");
$kelas = post("kelas");

        

        $simpan = $this->db->query("
            INSERT INTO demo_log
            (log_time,user_name,data,kelas) VALUES ('$log_time','$user_name','$data','$kelas')
        ");
    

        if($simpan){
            redirect('admin/demo_log');
        }
    }

    public function update(){
          $key = post('log_time'); $log_time = post("log_time");
$user_name = post("user_name");
$data = post("data");
$kelas = post("kelas");

        $simpan = $this->db->query("
            UPDATE demo_log SET  log_time = '$log_time', user_name = '$user_name', data = '$data', kelas = '$kelas' WHERE log_time = '$key'
            ");
    

        if($simpan){
            redirect('admin/demo_log');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-demo_log.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["log time","user name","data","kelas", "action"];

        $calldata = ["user_name","data","kelas"];

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
