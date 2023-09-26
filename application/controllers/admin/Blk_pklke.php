<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_pklke extends CI_Controller {

	private $table1 = 'blk_pklke';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_pklke/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id personalblk","nonext", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pklke/view', $data);
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
                        'row' => ["id_personalblk","nonext"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pklke',
                        'data' => ["id_personalblk","nonext"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pklke', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_personalblk", "2"=>"nonext"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pklke = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_pklke/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pklke = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pklke/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_personalblk = post("id_personalblk");
$nonext = post("nonext");

        

        $simpan = $this->db->query("
            INSERT INTO blk_pklke
            (id_personalblk,nonext) VALUES ('$id_personalblk','$nonext')
        ");
    

        if($simpan){
            redirect('admin/blk_pklke');
        }
    }

    public function update(){
          $key = post('id_pklke'); $id_personalblk = post("id_personalblk");
$nonext = post("nonext");

        $simpan = $this->db->query("
            UPDATE blk_pklke SET  id_personalblk = '$id_personalblk', nonext = '$nonext' WHERE id_pklke = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_pklke');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_pklke.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id personalblk","nonext", "action"];

        $calldata = ["id_personalblk","nonext"];

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
