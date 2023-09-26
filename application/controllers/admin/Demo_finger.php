<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Demo_finger extends CI_Controller {

	private $table1 = 'demo_finger';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/demo_finger/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["user id","finger id","finger data", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/demo_finger/view', $data);
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
                        'row' => ["finger_id","finger_data"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'user_id',
                        'data' => ["finger_id","finger_data"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['user_id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"finger_id", "2"=>"finger_data"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE user_id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/demo_finger/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE user_id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/demo_finger/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $user_id = post("user_id");
$finger_id = post("finger_id");
$finger_data = post("finger_data");

        

        $simpan = $this->db->query("
            INSERT INTO demo_finger
            (user_id,finger_id,finger_data) VALUES ('$user_id','$finger_id','$finger_data')
        ");
    

        if($simpan){
            redirect('admin/demo_finger');
        }
    }

    public function update(){
          $key = post('user_id'); $user_id = post("user_id");
$finger_id = post("finger_id");
$finger_data = post("finger_data");

        $simpan = $this->db->query("
            UPDATE demo_finger SET  user_id = '$user_id', finger_id = '$finger_id', finger_data = '$finger_data' WHERE user_id = '$key'
            ");
    

        if($simpan){
            redirect('admin/demo_finger');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-demo_finger.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["user id","finger id","finger data", "action"];

        $calldata = ["finger_id","finger_data"];

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
