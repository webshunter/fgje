<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Surat_ijin_keluarga_banyuwangi extends CI_Controller {

	private $table1 = 'surat_ijin_keluarga_banyuwangi';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/surat_ijin_keluarga_banyuwangi/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id tki","id keluarga","noktp","tmp","tgl","mengijinkan","nopass","alamat2","tujuan","sebagai", "action"]);
        $this->Createtable->order_set('0, 10');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_ijin_keluarga_banyuwangi/view', $data);
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
                        'row' => ["id_tki","id_keluarga","noktp","tmp","tgl","mengijinkan","nopass","alamat2","tujuan","sebagai"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_surat',
                        'data' => ["id_tki","id_keluarga","noktp","tmp","tgl","mengijinkan","nopass","alamat2","tujuan","sebagai"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_surat', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_tki", "2"=>"id_keluarga", "3"=>"noktp", "4"=>"tmp", "5"=>"tgl", "6"=>"mengijinkan", "7"=>"nopass", "8"=>"alamat2", "9"=>"tujuan", "10"=>"sebagai"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_surat = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/surat_ijin_keluarga_banyuwangi/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_surat = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_ijin_keluarga_banyuwangi/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_tki = post("id_tki");
$id_keluarga = post("id_keluarga");
$noktp = post("noktp");
$tmp = post("tmp");
$tgl = post("tgl");
$mengijinkan = post("mengijinkan");
$nopass = post("nopass");
$alamat2 = post("alamat2");
$tujuan = post("tujuan");
$sebagai = post("sebagai");

        

        $simpan = $this->db->query("
            INSERT INTO surat_ijin_keluarga_banyuwangi
            (id_tki,id_keluarga,noktp,tmp,tgl,mengijinkan,nopass,alamat2,tujuan,sebagai) VALUES ('$id_tki','$id_keluarga','$noktp','$tmp','$tgl','$mengijinkan','$nopass','$alamat2','$tujuan','$sebagai')
        ");
    

        if($simpan){
            redirect('admin/surat_ijin_keluarga_banyuwangi');
        }
    }

    public function update(){
          $key = post('id_surat'); $id_tki = post("id_tki");
$id_keluarga = post("id_keluarga");
$noktp = post("noktp");
$tmp = post("tmp");
$tgl = post("tgl");
$mengijinkan = post("mengijinkan");
$nopass = post("nopass");
$alamat2 = post("alamat2");
$tujuan = post("tujuan");
$sebagai = post("sebagai");

        $simpan = $this->db->query("
            UPDATE surat_ijin_keluarga_banyuwangi SET  id_tki = '$id_tki', id_keluarga = '$id_keluarga', noktp = '$noktp', tmp = '$tmp', tgl = '$tgl', mengijinkan = '$mengijinkan', nopass = '$nopass', alamat2 = '$alamat2', tujuan = '$tujuan', sebagai = '$sebagai' WHERE id_surat = '$key'
            ");
    

        if($simpan){
            redirect('admin/surat_ijin_keluarga_banyuwangi');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-surat_ijin_keluarga_banyuwangi.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id tki","id keluarga","noktp","tmp","tgl","mengijinkan","nopass","alamat2","tujuan","sebagai", "action"];

        $calldata = ["id_tki","id_keluarga","noktp","tmp","tgl","mengijinkan","nopass","alamat2","tujuan","sebagai"];

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
