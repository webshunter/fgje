<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_inap extends CI_Controller {

	private $table1 = 'blk_inap';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_inap/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","mulai inap","kembali inap","terlambat inap","hari inap","ket inap", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_inap/view', $data);
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
                        'row' => ["id_biodata","mulai_inap","kembali_inap","terlambat_inap","hari_inap","ket_inap"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_blk_inap',
                        'data' => ["id_biodata","mulai_inap","kembali_inap","terlambat_inap","hari_inap","ket_inap"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_blk_inap', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"mulai_inap", "3"=>"kembali_inap", "4"=>"terlambat_inap", "5"=>"hari_inap", "6"=>"ket_inap"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_blk_inap = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_inap/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_blk_inap = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_inap/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$mulai_inap = post("mulai_inap");
$kembali_inap = post("kembali_inap");
$terlambat_inap = post("terlambat_inap");
$hari_inap = post("hari_inap");
$ket_inap = post("ket_inap");

        

        $simpan = $this->db->query("
            INSERT INTO blk_inap
            (id_biodata,mulai_inap,kembali_inap,terlambat_inap,hari_inap,ket_inap) VALUES ('$id_biodata','$mulai_inap','$kembali_inap','$terlambat_inap','$hari_inap','$ket_inap')
        ");
    

        if($simpan){
            redirect('admin/blk_inap');
        }
    }

    public function update(){
          $key = post('id_blk_inap'); $id_biodata = post("id_biodata");
$mulai_inap = post("mulai_inap");
$kembali_inap = post("kembali_inap");
$terlambat_inap = post("terlambat_inap");
$hari_inap = post("hari_inap");
$ket_inap = post("ket_inap");

        $simpan = $this->db->query("
            UPDATE blk_inap SET  id_biodata = '$id_biodata', mulai_inap = '$mulai_inap', kembali_inap = '$kembali_inap', terlambat_inap = '$terlambat_inap', hari_inap = '$hari_inap', ket_inap = '$ket_inap' WHERE id_blk_inap = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_inap');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_inap.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","mulai inap","kembali inap","terlambat inap","hari inap","ket inap", "action"];

        $calldata = ["id_biodata","mulai_inap","kembali_inap","terlambat_inap","hari_inap","ket_inap"];

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
