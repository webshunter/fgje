<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_izin_keluar extends CI_Controller {

	private $table1 = 'blk_izin_keluar';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_izin_keluar/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nodaftar","tgl","jam keluar","jam kembali","terlambat","akm terlambat","keperluan","ditemani oleh","blk pemberi izin","ket", "action"]);
        $this->Createtable->order_set('0, 10');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_keluar/view', $data);
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
                        'row' => ["nodaftar","tgl","jam_keluar","jam_kembali","terlambat","akm_terlambat","keperluan","ditemani_oleh","blk_pemberi_izin","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_izin_keluar',
                        'data' => ["nodaftar","tgl","jam_keluar","jam_kembali","terlambat","akm_terlambat","keperluan","ditemani_oleh","blk_pemberi_izin","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_izin_keluar', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nodaftar", "2"=>"tgl", "3"=>"jam_keluar", "4"=>"jam_kembali", "5"=>"terlambat", "6"=>"akm_terlambat", "7"=>"keperluan", "8"=>"ditemani_oleh", "9"=>"blk_pemberi_izin", "10"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_izin_keluar = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_izin_keluar/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_izin_keluar = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_keluar/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nodaftar = post("nodaftar");
$tgl = post("tgl");
$jam_keluar = post("jam_keluar");
$jam_kembali = post("jam_kembali");
$terlambat = post("terlambat");
$akm_terlambat = post("akm_terlambat");
$keperluan = post("keperluan");
$ditemani_oleh = post("ditemani_oleh");
$blk_pemberi_izin = post("blk_pemberi_izin");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_izin_keluar
            (nodaftar,tgl,jam_keluar,jam_kembali,terlambat,akm_terlambat,keperluan,ditemani_oleh,blk_pemberi_izin,ket) VALUES ('$nodaftar','$tgl','$jam_keluar','$jam_kembali','$terlambat','$akm_terlambat','$keperluan','$ditemani_oleh','$blk_pemberi_izin','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_izin_keluar');
        }
    }

    public function update(){
          $key = post('id_izin_keluar'); $nodaftar = post("nodaftar");
$tgl = post("tgl");
$jam_keluar = post("jam_keluar");
$jam_kembali = post("jam_kembali");
$terlambat = post("terlambat");
$akm_terlambat = post("akm_terlambat");
$keperluan = post("keperluan");
$ditemani_oleh = post("ditemani_oleh");
$blk_pemberi_izin = post("blk_pemberi_izin");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_izin_keluar SET  nodaftar = '$nodaftar', tgl = '$tgl', jam_keluar = '$jam_keluar', jam_kembali = '$jam_kembali', terlambat = '$terlambat', akm_terlambat = '$akm_terlambat', keperluan = '$keperluan', ditemani_oleh = '$ditemani_oleh', blk_pemberi_izin = '$blk_pemberi_izin', ket = '$ket' WHERE id_izin_keluar = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_izin_keluar');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_izin_keluar.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nodaftar","tgl","jam keluar","jam kembali","terlambat","akm terlambat","keperluan","ditemani oleh","blk pemberi izin","ket", "action"];

        $calldata = ["nodaftar","tgl","jam_keluar","jam_kembali","terlambat","akm_terlambat","keperluan","ditemani_oleh","blk_pemberi_izin","ket"];

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
