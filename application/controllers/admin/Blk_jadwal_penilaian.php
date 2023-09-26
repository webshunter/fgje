<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jadwal_penilaian extends CI_Controller {

	private $table1 = 'blk_jadwal_penilaian';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jadwal_penilaian/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","jadwal data tki id","hari","nilai","nilai2","materi id", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal_penilaian/view', $data);
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
                        'row' => ["jadwal_data_tki_id","hari","nilai","nilai2","materi_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_penilaian',
                        'data' => ["jadwal_data_tki_id","hari","nilai","nilai2","materi_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_penilaian', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"jadwal_data_tki_id", "2"=>"hari", "3"=>"nilai", "4"=>"nilai2", "5"=>"materi_id"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_penilaian = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jadwal_penilaian/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_penilaian = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal_penilaian/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $jadwal_data_tki_id = post("jadwal_data_tki_id");
$hari = post("hari");
$nilai = post("nilai");
$nilai2 = post("nilai2");
$materi_id = post("materi_id");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jadwal_penilaian
            (jadwal_data_tki_id,hari,nilai,nilai2,materi_id) VALUES ('$jadwal_data_tki_id','$hari','$nilai','$nilai2','$materi_id')
        ");
    

        if($simpan){
            redirect('admin/blk_jadwal_penilaian');
        }
    }

    public function update(){
          $key = post('id_penilaian'); $jadwal_data_tki_id = post("jadwal_data_tki_id");
$hari = post("hari");
$nilai = post("nilai");
$nilai2 = post("nilai2");
$materi_id = post("materi_id");

        $simpan = $this->db->query("
            UPDATE blk_jadwal_penilaian SET  jadwal_data_tki_id = '$jadwal_data_tki_id', hari = '$hari', nilai = '$nilai', nilai2 = '$nilai2', materi_id = '$materi_id' WHERE id_penilaian = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jadwal_penilaian');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jadwal_penilaian.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","jadwal data tki id","hari","nilai","nilai2","materi id", "action"];

        $calldata = ["jadwal_data_tki_id","hari","nilai","nilai2","materi_id"];

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
