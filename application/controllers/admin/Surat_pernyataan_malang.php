<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Surat_pernyataan_malang extends CI_Controller {

	private $table1 = 'surat_pernyataan_malang';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/surat_pernyataan_malang/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id tki","id keluarga","tempat","tgl","status2","hubungan2","alamat2","tujuan2","kontrak2", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_pernyataan_malang/view', $data);
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
                        'row' => ["id_tki","id_keluarga","tempat","tgl","status2","hubungan2","alamat2","tujuan2","kontrak2"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_keterangan',
                        'data' => ["id_tki","id_keluarga","tempat","tgl","status2","hubungan2","alamat2","tujuan2","kontrak2"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_keterangan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_tki", "2"=>"id_keluarga", "3"=>"tempat", "4"=>"tgl", "5"=>"status2", "6"=>"hubungan2", "7"=>"alamat2", "8"=>"tujuan2", "9"=>"kontrak2"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_keterangan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/surat_pernyataan_malang/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_keterangan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_pernyataan_malang/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_tki = post("id_tki");
$id_keluarga = post("id_keluarga");
$tempat = post("tempat");
$tgl = post("tgl");
$status2 = post("status2");
$hubungan2 = post("hubungan2");
$alamat2 = post("alamat2");
$tujuan2 = post("tujuan2");
$kontrak2 = post("kontrak2");

        

        $simpan = $this->db->query("
            INSERT INTO surat_pernyataan_malang
            (id_tki,id_keluarga,tempat,tgl,status2,hubungan2,alamat2,tujuan2,kontrak2) VALUES ('$id_tki','$id_keluarga','$tempat','$tgl','$status2','$hubungan2','$alamat2','$tujuan2','$kontrak2')
        ");
    

        if($simpan){
            redirect('admin/surat_pernyataan_malang');
        }
    }

    public function update(){
          $key = post('id_keterangan'); $id_tki = post("id_tki");
$id_keluarga = post("id_keluarga");
$tempat = post("tempat");
$tgl = post("tgl");
$status2 = post("status2");
$hubungan2 = post("hubungan2");
$alamat2 = post("alamat2");
$tujuan2 = post("tujuan2");
$kontrak2 = post("kontrak2");

        $simpan = $this->db->query("
            UPDATE surat_pernyataan_malang SET  id_tki = '$id_tki', id_keluarga = '$id_keluarga', tempat = '$tempat', tgl = '$tgl', status2 = '$status2', hubungan2 = '$hubungan2', alamat2 = '$alamat2', tujuan2 = '$tujuan2', kontrak2 = '$kontrak2' WHERE id_keterangan = '$key'
            ");
    

        if($simpan){
            redirect('admin/surat_pernyataan_malang');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-surat_pernyataan_malang.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id tki","id keluarga","tempat","tgl","status2","hubungan2","alamat2","tujuan2","kontrak2", "action"];

        $calldata = ["id_tki","id_keluarga","tempat","tgl","status2","hubungan2","alamat2","tujuan2","kontrak2"];

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
