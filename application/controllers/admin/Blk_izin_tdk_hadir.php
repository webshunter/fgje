<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_izin_tdk_hadir extends CI_Controller {

	private $table1 = 'blk_izin_tdk_hadir';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_izin_tdk_hadir/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nodaftar","keluar kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","keperluan","mark","adm","blk", "action"]);
        $this->Createtable->order_set('0, 10');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_tdk_hadir/view', $data);
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
                        'row' => ["nodaftar","keluar_kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","keperluan","mark","adm","blk"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_izin_tdk_hadir',
                        'data' => ["nodaftar","keluar_kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","keperluan","mark","adm","blk"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_izin_tdk_hadir', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nodaftar", "2"=>"keluar_kembali", "3"=>"tglkeluar", "4"=>"jamkeluar", "5"=>"tglkembali", "6"=>"jamkembali", "7"=>"keperluan", "8"=>"mark", "9"=>"adm", "10"=>"blk"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_izin_tdk_hadir = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_izin_tdk_hadir/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_izin_tdk_hadir = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_tdk_hadir/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nodaftar = post("nodaftar");
$keluar_kembali = post("keluar_kembali");
$tglkeluar = post("tglkeluar");
$jamkeluar = post("jamkeluar");
$tglkembali = post("tglkembali");
$jamkembali = post("jamkembali");
$keperluan = post("keperluan");
$mark = post("mark");
$adm = post("adm");
$blk = post("blk");

        

        $simpan = $this->db->query("
            INSERT INTO blk_izin_tdk_hadir
            (nodaftar,keluar_kembali,tglkeluar,jamkeluar,tglkembali,jamkembali,keperluan,mark,adm,blk) VALUES ('$nodaftar','$keluar_kembali','$tglkeluar','$jamkeluar','$tglkembali','$jamkembali','$keperluan','$mark','$adm','$blk')
        ");
    

        if($simpan){
            redirect('admin/blk_izin_tdk_hadir');
        }
    }

    public function update(){
          $key = post('id_izin_tdk_hadir'); $nodaftar = post("nodaftar");
$keluar_kembali = post("keluar_kembali");
$tglkeluar = post("tglkeluar");
$jamkeluar = post("jamkeluar");
$tglkembali = post("tglkembali");
$jamkembali = post("jamkembali");
$keperluan = post("keperluan");
$mark = post("mark");
$adm = post("adm");
$blk = post("blk");

        $simpan = $this->db->query("
            UPDATE blk_izin_tdk_hadir SET  nodaftar = '$nodaftar', keluar_kembali = '$keluar_kembali', tglkeluar = '$tglkeluar', jamkeluar = '$jamkeluar', tglkembali = '$tglkembali', jamkembali = '$jamkembali', keperluan = '$keperluan', mark = '$mark', adm = '$adm', blk = '$blk' WHERE id_izin_tdk_hadir = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_izin_tdk_hadir');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_izin_tdk_hadir.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nodaftar","keluar kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","keperluan","mark","adm","blk", "action"];

        $calldata = ["nodaftar","keluar_kembali","tglkeluar","jamkeluar","tglkembali","jamkembali","keperluan","mark","adm","blk"];

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
