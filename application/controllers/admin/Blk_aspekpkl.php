<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_aspekpkl extends CI_Controller {

	private $table1 = 'blk_aspekpkl';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_aspekpkl/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","aspek","abjad", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_aspekpkl/view', $data);
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
                        'row' => ["aspek","abjad"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_aspek',
                        'data' => ["aspek","abjad"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_aspek', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"aspek", "2"=>"abjad"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_aspek = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_aspekpkl/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_aspek = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_aspekpkl/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $aspek = post("aspek");
$abjad = post("abjad");

        

        $simpan = $this->db->query("
            INSERT INTO blk_aspekpkl
            (aspek,abjad) VALUES ('$aspek','$abjad')
        ");
    

        if($simpan){
            redirect('admin/blk_aspekpkl');
        }
    }

    public function update(){
          $key = post('id_aspek'); $aspek = post("aspek");
$abjad = post("abjad");

        $simpan = $this->db->query("
            UPDATE blk_aspekpkl SET  aspek = '$aspek', abjad = '$abjad' WHERE id_aspek = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_aspekpkl');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_aspekpkl.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","aspek","abjad", "action"];

        $calldata = ["aspek","abjad"];

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
