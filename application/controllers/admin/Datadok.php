<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datadok extends CI_Controller {

	private $table1 = 'datadok';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datadok/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id agen","id majikan", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datadok/view', $data);
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
                        'row' => ["id_agen","id_majikan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_datadok',
                        'data' => ["id_agen","id_majikan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_datadok', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_agen", "2"=>"id_majikan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_datadok = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datadok/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_datadok = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datadok/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_agen = post("id_agen");
$id_majikan = post("id_majikan");

        

        $simpan = $this->db->query("
            INSERT INTO datadok
            (id_agen,id_majikan) VALUES ('$id_agen','$id_majikan')
        ");
    

        if($simpan){
            redirect('admin/datadok');
        }
    }

    public function update(){
          $key = post('id_datadok'); $id_agen = post("id_agen");
$id_majikan = post("id_majikan");

        $simpan = $this->db->query("
            UPDATE datadok SET  id_agen = '$id_agen', id_majikan = '$id_majikan' WHERE id_datadok = '$key'
            ");
    

        if($simpan){
            redirect('admin/datadok');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datadok.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id agen","id majikan", "action"];

        $calldata = ["id_agen","id_majikan"];

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
