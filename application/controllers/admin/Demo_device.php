<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Demo_device extends CI_Controller {

	private $table1 = 'demo_device';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/demo_device/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["device name","sn","vc","ac","vkey", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/demo_device/view', $data);
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
                        'row' => ["sn","vc","ac","vkey"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'sn',
                        'data' => ["sn","vc","ac","vkey"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['sn', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"sn", "2"=>"vc", "3"=>"ac", "4"=>"vkey"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE sn = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/demo_device/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE sn = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/demo_device/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $device_name = post("device_name");
$sn = post("sn");
$vc = post("vc");
$ac = post("ac");
$vkey = post("vkey");

        

        $simpan = $this->db->query("
            INSERT INTO demo_device
            (device_name,sn,vc,ac,vkey) VALUES ('$device_name','$sn','$vc','$ac','$vkey')
        ");
    

        if($simpan){
            redirect('admin/demo_device');
        }
    }

    public function update(){
          $key = post('sn'); $device_name = post("device_name");
$sn = post("sn");
$vc = post("vc");
$ac = post("ac");
$vkey = post("vkey");

        $simpan = $this->db->query("
            UPDATE demo_device SET  device_name = '$device_name', sn = '$sn', vc = '$vc', ac = '$ac', vkey = '$vkey' WHERE sn = '$key'
            ");
    

        if($simpan){
            redirect('admin/demo_device');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-demo_device.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["device name","sn","vc","ac","vkey", "action"];

        $calldata = ["sn","vc","ac","vkey"];

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
