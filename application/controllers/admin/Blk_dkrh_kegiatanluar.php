<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_dkrh_kegiatanluar extends CI_Controller {

	private $table1 = 'blk_dkrh_kegiatanluar';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_dkrh_kegiatanluar/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tipe","tglmulai","tglselesai","ket", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_dkrh_kegiatanluar/view', $data);
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
                        'row' => ["id_biodata","tipe","tglmulai","tglselesai","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["id_biodata","tipe","tglmulai","tglselesai","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tipe", "3"=>"tglmulai", "4"=>"tglselesai", "5"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_dkrh_kegiatanluar/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_dkrh_kegiatanluar/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tipe = post("tipe");
$tglmulai = post("tglmulai");
$tglselesai = post("tglselesai");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_dkrh_kegiatanluar
            (id_biodata,tipe,tglmulai,tglselesai,ket) VALUES ('$id_biodata','$tipe','$tglmulai','$tglselesai','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_dkrh_kegiatanluar');
        }
    }

    public function update(){
          $key = post('id'); $id_biodata = post("id_biodata");
$tipe = post("tipe");
$tglmulai = post("tglmulai");
$tglselesai = post("tglselesai");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_dkrh_kegiatanluar SET  id_biodata = '$id_biodata', tipe = '$tipe', tglmulai = '$tglmulai', tglselesai = '$tglselesai', ket = '$ket' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_dkrh_kegiatanluar');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_dkrh_kegiatanluar.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tipe","tglmulai","tglselesai","ket", "action"];

        $calldata = ["id_biodata","tipe","tglmulai","tglselesai","ket"];

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
