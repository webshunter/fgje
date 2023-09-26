<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembuatan_ijin extends CI_Controller {

	private $table1 = 'pembuatan_ijin';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pembuatan_ijin/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nomor","lampiran","tampilkan","perihal","kepada","imigrasi","id tki","jabatan","daerah","tanggal", "action"]);
        $this->Createtable->order_set('0, 10');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_ijin/view', $data);
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
                        'row' => ["nomor","lampiran","tampilkan","perihal","kepada","imigrasi","id_tki","jabatan","daerah","tanggal"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pembuatan',
                        'data' => ["nomor","lampiran","tampilkan","perihal","kepada","imigrasi","id_tki","jabatan","daerah","tanggal"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pembuatan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nomor", "2"=>"lampiran", "3"=>"tampilkan", "4"=>"perihal", "5"=>"kepada", "6"=>"imigrasi", "7"=>"id_tki", "8"=>"jabatan", "9"=>"daerah", "10"=>"tanggal"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pembuatan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pembuatan_ijin/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pembuatan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_ijin/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nomor = post("nomor");
$lampiran = post("lampiran");
$tampilkan = post("tampilkan");
$perihal = post("perihal");
$kepada = post("kepada");
$imigrasi = post("imigrasi");
$id_tki = post("id_tki");
$jabatan = post("jabatan");
$daerah = post("daerah");
$tanggal = post("tanggal");

        

        $simpan = $this->db->query("
            INSERT INTO pembuatan_ijin
            (nomor,lampiran,tampilkan,perihal,kepada,imigrasi,id_tki,jabatan,daerah,tanggal) VALUES ('$nomor','$lampiran','$tampilkan','$perihal','$kepada','$imigrasi','$id_tki','$jabatan','$daerah','$tanggal')
        ");
    

        if($simpan){
            redirect('admin/pembuatan_ijin');
        }
    }

    public function update(){
          $key = post('id_pembuatan'); $nomor = post("nomor");
$lampiran = post("lampiran");
$tampilkan = post("tampilkan");
$perihal = post("perihal");
$kepada = post("kepada");
$imigrasi = post("imigrasi");
$id_tki = post("id_tki");
$jabatan = post("jabatan");
$daerah = post("daerah");
$tanggal = post("tanggal");

        $simpan = $this->db->query("
            UPDATE pembuatan_ijin SET  nomor = '$nomor', lampiran = '$lampiran', tampilkan = '$tampilkan', perihal = '$perihal', kepada = '$kepada', imigrasi = '$imigrasi', id_tki = '$id_tki', jabatan = '$jabatan', daerah = '$daerah', tanggal = '$tanggal' WHERE id_pembuatan = '$key'
            ");
    

        if($simpan){
            redirect('admin/pembuatan_ijin');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pembuatan_ijin.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nomor","lampiran","tampilkan","perihal","kepada","imigrasi","id tki","jabatan","daerah","tanggal", "action"];

        $calldata = ["nomor","lampiran","tampilkan","perihal","kepada","imigrasi","id_tki","jabatan","daerah","tanggal"];

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
