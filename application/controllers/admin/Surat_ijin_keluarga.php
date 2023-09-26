<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Surat_ijin_keluarga extends CI_Controller {

	private $table1 = 'surat_ijin_keluarga';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/surat_ijin_keluarga/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id keluarga","pekerjaan1","tempat4","tanggal4","alamat4","desa1","kel1","kab1","rt1","kec1","id tki","pekerjaan2","desa2","kel2","kab2","rt2","kec2","hubungan4","tujuan4", "action"]);
        $this->Createtable->order_set('0, 19');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_ijin_keluarga/view', $data);
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
                        'row' => ["id_keluarga","pekerjaan1","tempat4","tanggal4","alamat4","desa1","kel1","kab1","rt1","kec1","id_tki","pekerjaan2","desa2","kel2","kab2","rt2","kec2","hubungan4","tujuan4"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_ijinku',
                        'data' => ["id_keluarga","pekerjaan1","tempat4","tanggal4","alamat4","desa1","kel1","kab1","rt1","kec1","id_tki","pekerjaan2","desa2","kel2","kab2","rt2","kec2","hubungan4","tujuan4"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_ijinku', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_keluarga", "2"=>"pekerjaan1", "3"=>"tempat4", "4"=>"tanggal4", "5"=>"alamat4", "6"=>"desa1", "7"=>"kel1", "8"=>"kab1", "9"=>"rt1", "10"=>"kec1", "11"=>"id_tki", "12"=>"pekerjaan2", "13"=>"desa2", "14"=>"kel2", "15"=>"kab2", "16"=>"rt2", "17"=>"kec2", "18"=>"hubungan4", "19"=>"tujuan4"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_ijinku = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/surat_ijin_keluarga/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_ijinku = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_ijin_keluarga/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_keluarga = post("id_keluarga");
$pekerjaan1 = post("pekerjaan1");
$tempat4 = post("tempat4");
$tanggal4 = post("tanggal4");
$alamat4 = post("alamat4");
$desa1 = post("desa1");
$kel1 = post("kel1");
$kab1 = post("kab1");
$rt1 = post("rt1");
$kec1 = post("kec1");
$id_tki = post("id_tki");
$pekerjaan2 = post("pekerjaan2");
$desa2 = post("desa2");
$kel2 = post("kel2");
$kab2 = post("kab2");
$rt2 = post("rt2");
$kec2 = post("kec2");
$hubungan4 = post("hubungan4");
$tujuan4 = post("tujuan4");

        

        $simpan = $this->db->query("
            INSERT INTO surat_ijin_keluarga
            (id_keluarga,pekerjaan1,tempat4,tanggal4,alamat4,desa1,kel1,kab1,rt1,kec1,id_tki,pekerjaan2,desa2,kel2,kab2,rt2,kec2,hubungan4,tujuan4) VALUES ('$id_keluarga','$pekerjaan1','$tempat4','$tanggal4','$alamat4','$desa1','$kel1','$kab1','$rt1','$kec1','$id_tki','$pekerjaan2','$desa2','$kel2','$kab2','$rt2','$kec2','$hubungan4','$tujuan4')
        ");
    

        if($simpan){
            redirect('admin/surat_ijin_keluarga');
        }
    }

    public function update(){
          $key = post('id_ijinku'); $id_keluarga = post("id_keluarga");
$pekerjaan1 = post("pekerjaan1");
$tempat4 = post("tempat4");
$tanggal4 = post("tanggal4");
$alamat4 = post("alamat4");
$desa1 = post("desa1");
$kel1 = post("kel1");
$kab1 = post("kab1");
$rt1 = post("rt1");
$kec1 = post("kec1");
$id_tki = post("id_tki");
$pekerjaan2 = post("pekerjaan2");
$desa2 = post("desa2");
$kel2 = post("kel2");
$kab2 = post("kab2");
$rt2 = post("rt2");
$kec2 = post("kec2");
$hubungan4 = post("hubungan4");
$tujuan4 = post("tujuan4");

        $simpan = $this->db->query("
            UPDATE surat_ijin_keluarga SET  id_keluarga = '$id_keluarga', pekerjaan1 = '$pekerjaan1', tempat4 = '$tempat4', tanggal4 = '$tanggal4', alamat4 = '$alamat4', desa1 = '$desa1', kel1 = '$kel1', kab1 = '$kab1', rt1 = '$rt1', kec1 = '$kec1', id_tki = '$id_tki', pekerjaan2 = '$pekerjaan2', desa2 = '$desa2', kel2 = '$kel2', kab2 = '$kab2', rt2 = '$rt2', kec2 = '$kec2', hubungan4 = '$hubungan4', tujuan4 = '$tujuan4' WHERE id_ijinku = '$key'
            ");
    

        if($simpan){
            redirect('admin/surat_ijin_keluarga');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-surat_ijin_keluarga.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id keluarga","pekerjaan1","tempat4","tanggal4","alamat4","desa1","kel1","kab1","rt1","kec1","id tki","pekerjaan2","desa2","kel2","kab2","rt2","kec2","hubungan4","tujuan4", "action"];

        $calldata = ["id_keluarga","pekerjaan1","tempat4","tanggal4","alamat4","desa1","kel1","kab1","rt1","kec1","id_tki","pekerjaan2","desa2","kel2","kab2","rt2","kec2","hubungan4","tujuan4"];

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
