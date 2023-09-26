<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Biaya extends CI_Controller {

	private $table1 = 'biaya';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/biaya/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","biaya", "action"]);
        $this->Createtable->order_set('0, 1');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/biaya/view', $data);
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
                        'row' => ["biaya"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_biaya',
                        'data' => ["biaya"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_biaya', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"biaya"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_biaya = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/biaya/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_biaya = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/biaya/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $biaya = post("biaya");

        

        $simpan = $this->db->query("
            INSERT INTO biaya
            (biaya) VALUES ('$biaya')
        ");
    

        if($simpan){
            redirect('admin/biaya');
        }
    }

    public function update(){
          $key = post('id_biaya'); $biaya = post("biaya");

        $simpan = $this->db->query("
            UPDATE biaya SET  biaya = '$biaya' WHERE id_biaya = '$key'
            ");
    

        if($simpan){
            redirect('admin/biaya');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-biaya.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","biaya", "action"];

        $calldata = ["biaya"];

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
