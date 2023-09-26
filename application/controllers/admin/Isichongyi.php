<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Isichongyi extends CI_Controller {

	private $table1 = 'isichongyi';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/isichongyi/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","kbm","kbi","lbbi","sbt","hub", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/isichongyi/view', $data);
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
                        'row' => ["id_biodata","kbm","kbi","lbbi","sbt","hub"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["id_biodata","kbm","kbi","lbbi","sbt","hub"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"kbm", "3"=>"kbi", "4"=>"lbbi", "5"=>"sbt", "6"=>"hub"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/isichongyi/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/isichongyi/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$kbm = post("kbm");
$kbi = post("kbi");
$lbbi = post("lbbi");
$sbt = post("sbt");
$hub = post("hub");

        

        $simpan = $this->db->query("
            INSERT INTO isichongyi
            (id_biodata,kbm,kbi,lbbi,sbt,hub) VALUES ('$id_biodata','$kbm','$kbi','$lbbi','$sbt','$hub')
        ");
    

        if($simpan){
            redirect('admin/isichongyi');
        }
    }

    public function update(){
          $key = post('id'); $id_biodata = post("id_biodata");
$kbm = post("kbm");
$kbi = post("kbi");
$lbbi = post("lbbi");
$sbt = post("sbt");
$hub = post("hub");

        $simpan = $this->db->query("
            UPDATE isichongyi SET  id_biodata = '$id_biodata', kbm = '$kbm', kbi = '$kbi', lbbi = '$lbbi', sbt = '$sbt', hub = '$hub' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/isichongyi');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-isichongyi.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","kbm","kbi","lbbi","sbt","hub", "action"];

        $calldata = ["id_biodata","kbm","kbi","lbbi","sbt","hub"];

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
