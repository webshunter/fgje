<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jadwalmateri extends CI_Controller {

	private $table1 = 'blk_jadwalmateri';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jadwalmateri/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","materi id","instruktur id","jam id","kode jadwal","kode detail", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwalmateri/view', $data);
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
                        'row' => ["materi_id","instruktur_id","jam_id","kode_jadwal","kode_detail"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_blk_jadwalmateri',
                        'data' => ["materi_id","instruktur_id","jam_id","kode_jadwal","kode_detail"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_blk_jadwalmateri', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"materi_id", "2"=>"instruktur_id", "3"=>"jam_id", "4"=>"kode_jadwal", "5"=>"kode_detail"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_blk_jadwalmateri = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jadwalmateri/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_blk_jadwalmateri = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwalmateri/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $materi_id = post("materi_id");
$instruktur_id = post("instruktur_id");
$jam_id = post("jam_id");
$kode_jadwal = post("kode_jadwal");
$kode_detail = post("kode_detail");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jadwalmateri
            (materi_id,instruktur_id,jam_id,kode_jadwal,kode_detail) VALUES ('$materi_id','$instruktur_id','$jam_id','$kode_jadwal','$kode_detail')
        ");
    

        if($simpan){
            redirect('admin/blk_jadwalmateri');
        }
    }

    public function update(){
          $key = post('id_blk_jadwalmateri'); $materi_id = post("materi_id");
$instruktur_id = post("instruktur_id");
$jam_id = post("jam_id");
$kode_jadwal = post("kode_jadwal");
$kode_detail = post("kode_detail");

        $simpan = $this->db->query("
            UPDATE blk_jadwalmateri SET  materi_id = '$materi_id', instruktur_id = '$instruktur_id', jam_id = '$jam_id', kode_jadwal = '$kode_jadwal', kode_detail = '$kode_detail' WHERE id_blk_jadwalmateri = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jadwalmateri');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jadwalmateri.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","materi id","instruktur id","jam id","kode jadwal","kode detail", "action"];

        $calldata = ["materi_id","instruktur_id","jam_id","kode_jadwal","kode_detail"];

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
