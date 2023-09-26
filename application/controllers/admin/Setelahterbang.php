<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Setelahterbang extends CI_Controller {

	private $table1 = 'setelahterbang';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/setelahterbang/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl setelah terbang","tgl kejadian","kejadian","nilai kekurangan cicilan bank","nilai kekurangan cicilan bank2","ket setelah terbang", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/setelahterbang/view', $data);
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
                        'row' => ["id_biodata","tgl_setelah_terbang","tgl_kejadian","kejadian","nilai_kekurangan_cicilan_bank","nilai_kekurangan_cicilan_bank2","ket_setelah_terbang"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_setelahterbang',
                        'data' => ["id_biodata","tgl_setelah_terbang","tgl_kejadian","kejadian","nilai_kekurangan_cicilan_bank","nilai_kekurangan_cicilan_bank2","ket_setelah_terbang"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_setelahterbang', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_setelah_terbang", "3"=>"tgl_kejadian", "4"=>"kejadian", "5"=>"nilai_kekurangan_cicilan_bank", "6"=>"nilai_kekurangan_cicilan_bank2", "7"=>"ket_setelah_terbang"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_setelahterbang = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/setelahterbang/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_setelahterbang = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/setelahterbang/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_setelah_terbang = post("tgl_setelah_terbang");
$tgl_kejadian = post("tgl_kejadian");
$kejadian = post("kejadian");
$nilai_kekurangan_cicilan_bank = post("nilai_kekurangan_cicilan_bank");
$nilai_kekurangan_cicilan_bank2 = post("nilai_kekurangan_cicilan_bank2");
$ket_setelah_terbang = post("ket_setelah_terbang");

        

        $simpan = $this->db->query("
            INSERT INTO setelahterbang
            (id_biodata,tgl_setelah_terbang,tgl_kejadian,kejadian,nilai_kekurangan_cicilan_bank,nilai_kekurangan_cicilan_bank2,ket_setelah_terbang) VALUES ('$id_biodata','$tgl_setelah_terbang','$tgl_kejadian','$kejadian','$nilai_kekurangan_cicilan_bank','$nilai_kekurangan_cicilan_bank2','$ket_setelah_terbang')
        ");
    

        if($simpan){
            redirect('admin/setelahterbang');
        }
    }

    public function update(){
          $key = post('id_setelahterbang'); $id_biodata = post("id_biodata");
$tgl_setelah_terbang = post("tgl_setelah_terbang");
$tgl_kejadian = post("tgl_kejadian");
$kejadian = post("kejadian");
$nilai_kekurangan_cicilan_bank = post("nilai_kekurangan_cicilan_bank");
$nilai_kekurangan_cicilan_bank2 = post("nilai_kekurangan_cicilan_bank2");
$ket_setelah_terbang = post("ket_setelah_terbang");

        $simpan = $this->db->query("
            UPDATE setelahterbang SET  id_biodata = '$id_biodata', tgl_setelah_terbang = '$tgl_setelah_terbang', tgl_kejadian = '$tgl_kejadian', kejadian = '$kejadian', nilai_kekurangan_cicilan_bank = '$nilai_kekurangan_cicilan_bank', nilai_kekurangan_cicilan_bank2 = '$nilai_kekurangan_cicilan_bank2', ket_setelah_terbang = '$ket_setelah_terbang' WHERE id_setelahterbang = '$key'
            ");
    

        if($simpan){
            redirect('admin/setelahterbang');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-setelahterbang.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl setelah terbang","tgl kejadian","kejadian","nilai kekurangan cicilan bank","nilai kekurangan cicilan bank2","ket setelah terbang", "action"];

        $calldata = ["id_biodata","tgl_setelah_terbang","tgl_kejadian","kejadian","nilai_kekurangan_cicilan_bank","nilai_kekurangan_cicilan_bank2","ket_setelah_terbang"];

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
