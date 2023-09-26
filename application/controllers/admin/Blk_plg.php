<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_plg extends CI_Controller {

	private $table1 = 'blk_plg';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_plg/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","mulai plg","kembali plg","terlambat plg","hari plg","ket plg", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_plg/view', $data);
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
                        'row' => ["id_biodata","mulai_plg","kembali_plg","terlambat_plg","hari_plg","ket_plg"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_blk_plg',
                        'data' => ["id_biodata","mulai_plg","kembali_plg","terlambat_plg","hari_plg","ket_plg"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_blk_plg', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"mulai_plg", "3"=>"kembali_plg", "4"=>"terlambat_plg", "5"=>"hari_plg", "6"=>"ket_plg"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_blk_plg = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_plg/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_blk_plg = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_plg/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$mulai_plg = post("mulai_plg");
$kembali_plg = post("kembali_plg");
$terlambat_plg = post("terlambat_plg");
$hari_plg = post("hari_plg");
$ket_plg = post("ket_plg");

        

        $simpan = $this->db->query("
            INSERT INTO blk_plg
            (id_biodata,mulai_plg,kembali_plg,terlambat_plg,hari_plg,ket_plg) VALUES ('$id_biodata','$mulai_plg','$kembali_plg','$terlambat_plg','$hari_plg','$ket_plg')
        ");
    

        if($simpan){
            redirect('admin/blk_plg');
        }
    }

    public function update(){
          $key = post('id_blk_plg'); $id_biodata = post("id_biodata");
$mulai_plg = post("mulai_plg");
$kembali_plg = post("kembali_plg");
$terlambat_plg = post("terlambat_plg");
$hari_plg = post("hari_plg");
$ket_plg = post("ket_plg");

        $simpan = $this->db->query("
            UPDATE blk_plg SET  id_biodata = '$id_biodata', mulai_plg = '$mulai_plg', kembali_plg = '$kembali_plg', terlambat_plg = '$terlambat_plg', hari_plg = '$hari_plg', ket_plg = '$ket_plg' WHERE id_blk_plg = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_plg');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_plg.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","mulai plg","kembali plg","terlambat plg","hari plg","ket plg", "action"];

        $calldata = ["id_biodata","mulai_plg","kembali_plg","terlambat_plg","hari_plg","ket_plg"];

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
