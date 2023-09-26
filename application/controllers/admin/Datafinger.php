<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datafinger extends CI_Controller {

	private $table1 = 'datafinger';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datafinger/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","idblk","data","jari","timenya", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datafinger/view', $data);
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
                        'row' => ["idblk","data","jari","timenya"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_finger',
                        'data' => ["idblk","data","jari","timenya"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_finger', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"idblk", "2"=>"data", "3"=>"jari", "4"=>"timenya"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_finger = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datafinger/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_finger = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datafinger/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $idblk = post("idblk");
$data = post("data");
$jari = post("jari");
$timenya = post("timenya");

        

        $simpan = $this->db->query("
            INSERT INTO datafinger
            (idblk,data,jari,timenya) VALUES ('$idblk','$data','$jari','$timenya')
        ");
    

        if($simpan){
            redirect('admin/datafinger');
        }
    }

    public function update(){
          $key = post('id_finger'); $idblk = post("idblk");
$data = post("data");
$jari = post("jari");
$timenya = post("timenya");

        $simpan = $this->db->query("
            UPDATE datafinger SET  idblk = '$idblk', data = '$data', jari = '$jari', timenya = '$timenya' WHERE id_finger = '$key'
            ");
    

        if($simpan){
            redirect('admin/datafinger');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datafinger.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","idblk","data","jari","timenya", "action"];

        $calldata = ["idblk","data","jari","timenya"];

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
