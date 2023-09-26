<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_kb extends CI_Controller {

	private $table1 = 'blk_kb';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_kb/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nodaftar","id jenis kb","tgl suntik","kb suntik","masa kadaluwarsa","id instruktur","ket", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_kb/view', $data);
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
                        'row' => ["nodaftar","id_jenis_kb","tgl_suntik","kb_suntik","masa_kadaluwarsa","id_instruktur","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_kb',
                        'data' => ["nodaftar","id_jenis_kb","tgl_suntik","kb_suntik","masa_kadaluwarsa","id_instruktur","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_kb', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nodaftar", "2"=>"id_jenis_kb", "3"=>"tgl_suntik", "4"=>"kb_suntik", "5"=>"masa_kadaluwarsa", "6"=>"id_instruktur", "7"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_kb = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_kb/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_kb = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_kb/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nodaftar = post("nodaftar");
$id_jenis_kb = post("id_jenis_kb");
$tgl_suntik = post("tgl_suntik");
$kb_suntik = post("kb_suntik");
$masa_kadaluwarsa = post("masa_kadaluwarsa");
$id_instruktur = post("id_instruktur");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_kb
            (nodaftar,id_jenis_kb,tgl_suntik,kb_suntik,masa_kadaluwarsa,id_instruktur,ket) VALUES ('$nodaftar','$id_jenis_kb','$tgl_suntik','$kb_suntik','$masa_kadaluwarsa','$id_instruktur','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_kb');
        }
    }

    public function update(){
          $key = post('id_kb'); $nodaftar = post("nodaftar");
$id_jenis_kb = post("id_jenis_kb");
$tgl_suntik = post("tgl_suntik");
$kb_suntik = post("kb_suntik");
$masa_kadaluwarsa = post("masa_kadaluwarsa");
$id_instruktur = post("id_instruktur");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_kb SET  nodaftar = '$nodaftar', id_jenis_kb = '$id_jenis_kb', tgl_suntik = '$tgl_suntik', kb_suntik = '$kb_suntik', masa_kadaluwarsa = '$masa_kadaluwarsa', id_instruktur = '$id_instruktur', ket = '$ket' WHERE id_kb = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_kb');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_kb.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nodaftar","id jenis kb","tgl suntik","kb suntik","masa kadaluwarsa","id instruktur","ket", "action"];

        $calldata = ["nodaftar","id_jenis_kb","tgl_suntik","kb_suntik","masa_kadaluwarsa","id_instruktur","ket"];

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
