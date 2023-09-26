<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_izin_pulang extends CI_Controller {

	private $table1 = 'blk_izin_pulang';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_izin_pulang/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","keluar kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","tglactual","jamactual","terlambat","akm terlambat","keperluan","ket","blkls","adm2","mark","adm","blk","satpam","nodaftar", "action"]);
        $this->Createtable->order_set('0, 18');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_pulang/view', $data);
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
                        'row' => ["keluar_kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","tglactual","jamactual","terlambat","akm_terlambat","keperluan","ket","blkls","adm2","mark","adm","blk","satpam","nodaftar"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_izin_pulang',
                        'data' => ["keluar_kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","tglactual","jamactual","terlambat","akm_terlambat","keperluan","ket","blkls","adm2","mark","adm","blk","satpam","nodaftar"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_izin_pulang', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"keluar_kembali", "2"=>"tglkeluar", "3"=>"jamkeluar", "4"=>"tglkembali", "5"=>"jamkembali", "6"=>"tglactual", "7"=>"jamactual", "8"=>"terlambat", "9"=>"akm_terlambat", "10"=>"keperluan", "11"=>"ket", "12"=>"blkls", "13"=>"adm2", "14"=>"mark", "15"=>"adm", "16"=>"blk", "17"=>"satpam", "18"=>"nodaftar"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_izin_pulang = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_izin_pulang/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_izin_pulang = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_pulang/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $keluar_kembali = post("keluar_kembali");
$tglkeluar = post("tglkeluar");
$jamkeluar = post("jamkeluar");
$tglkembali = post("tglkembali");
$jamkembali = post("jamkembali");
$tglactual = post("tglactual");
$jamactual = post("jamactual");
$terlambat = post("terlambat");
$akm_terlambat = post("akm_terlambat");
$keperluan = post("keperluan");
$ket = post("ket");
$blkls = post("blkls");
$adm2 = post("adm2");
$mark = post("mark");
$adm = post("adm");
$blk = post("blk");
$satpam = post("satpam");
$nodaftar = post("nodaftar");

        

        $simpan = $this->db->query("
            INSERT INTO blk_izin_pulang
            (keluar_kembali,tglkeluar,jamkeluar,tglkembali,jamkembali,tglactual,jamactual,terlambat,akm_terlambat,keperluan,ket,blkls,adm2,mark,adm,blk,satpam,nodaftar) VALUES ('$keluar_kembali','$tglkeluar','$jamkeluar','$tglkembali','$jamkembali','$tglactual','$jamactual','$terlambat','$akm_terlambat','$keperluan','$ket','$blkls','$adm2','$mark','$adm','$blk','$satpam','$nodaftar')
        ");
    

        if($simpan){
            redirect('admin/blk_izin_pulang');
        }
    }

    public function update(){
          $key = post('id_izin_pulang'); $keluar_kembali = post("keluar_kembali");
$tglkeluar = post("tglkeluar");
$jamkeluar = post("jamkeluar");
$tglkembali = post("tglkembali");
$jamkembali = post("jamkembali");
$tglactual = post("tglactual");
$jamactual = post("jamactual");
$terlambat = post("terlambat");
$akm_terlambat = post("akm_terlambat");
$keperluan = post("keperluan");
$ket = post("ket");
$blkls = post("blkls");
$adm2 = post("adm2");
$mark = post("mark");
$adm = post("adm");
$blk = post("blk");
$satpam = post("satpam");
$nodaftar = post("nodaftar");

        $simpan = $this->db->query("
            UPDATE blk_izin_pulang SET  keluar_kembali = '$keluar_kembali', tglkeluar = '$tglkeluar', jamkeluar = '$jamkeluar', tglkembali = '$tglkembali', jamkembali = '$jamkembali', tglactual = '$tglactual', jamactual = '$jamactual', terlambat = '$terlambat', akm_terlambat = '$akm_terlambat', keperluan = '$keperluan', ket = '$ket', blkls = '$blkls', adm2 = '$adm2', mark = '$mark', adm = '$adm', blk = '$blk', satpam = '$satpam', nodaftar = '$nodaftar' WHERE id_izin_pulang = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_izin_pulang');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_izin_pulang.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","keluar kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","tglactual","jamactual","terlambat","akm terlambat","keperluan","ket","blkls","adm2","mark","adm","blk","satpam","nodaftar", "action"];

        $calldata = ["keluar_kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","tglactual","jamactual","terlambat","akm_terlambat","keperluan","ket","blkls","adm2","mark","adm","blk","satpam","nodaftar"];

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
