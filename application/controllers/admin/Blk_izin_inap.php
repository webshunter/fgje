<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_izin_inap extends CI_Controller {

	private $table1 = 'blk_izin_inap';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_izin_inap/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nodaftar","keluar kembali","tglmasuk","jammasuk","tglkeluar","jamkeluar","terlambat","akm terlambat","blk pemberi izin","ket", "action"]);
        $this->Createtable->order_set('0, 10');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_inap/view', $data);
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
                        'row' => ["nodaftar","keluar_kembali","tglmasuk","jammasuk","tglkeluar","jamkeluar","terlambat","akm_terlambat","blk_pemberi_izin","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_izin_inap',
                        'data' => ["nodaftar","keluar_kembali","tglmasuk","jammasuk","tglkeluar","jamkeluar","terlambat","akm_terlambat","blk_pemberi_izin","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_izin_inap', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nodaftar", "2"=>"keluar_kembali", "3"=>"tglmasuk", "4"=>"jammasuk", "5"=>"tglkeluar", "6"=>"jamkeluar", "7"=>"terlambat", "8"=>"akm_terlambat", "9"=>"blk_pemberi_izin", "10"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_izin_inap = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_izin_inap/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_izin_inap = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_inap/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nodaftar = post("nodaftar");
$keluar_kembali = post("keluar_kembali");
$tglmasuk = post("tglmasuk");
$jammasuk = post("jammasuk");
$tglkeluar = post("tglkeluar");
$jamkeluar = post("jamkeluar");
$terlambat = post("terlambat");
$akm_terlambat = post("akm_terlambat");
$blk_pemberi_izin = post("blk_pemberi_izin");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_izin_inap
            (nodaftar,keluar_kembali,tglmasuk,jammasuk,tglkeluar,jamkeluar,terlambat,akm_terlambat,blk_pemberi_izin,ket) VALUES ('$nodaftar','$keluar_kembali','$tglmasuk','$jammasuk','$tglkeluar','$jamkeluar','$terlambat','$akm_terlambat','$blk_pemberi_izin','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_izin_inap');
        }
    }

    public function update(){
          $key = post('id_izin_inap'); $nodaftar = post("nodaftar");
$keluar_kembali = post("keluar_kembali");
$tglmasuk = post("tglmasuk");
$jammasuk = post("jammasuk");
$tglkeluar = post("tglkeluar");
$jamkeluar = post("jamkeluar");
$terlambat = post("terlambat");
$akm_terlambat = post("akm_terlambat");
$blk_pemberi_izin = post("blk_pemberi_izin");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_izin_inap SET  nodaftar = '$nodaftar', keluar_kembali = '$keluar_kembali', tglmasuk = '$tglmasuk', jammasuk = '$jammasuk', tglkeluar = '$tglkeluar', jamkeluar = '$jamkeluar', terlambat = '$terlambat', akm_terlambat = '$akm_terlambat', blk_pemberi_izin = '$blk_pemberi_izin', ket = '$ket' WHERE id_izin_inap = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_izin_inap');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_izin_inap.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nodaftar","keluar kembali","tglmasuk","jammasuk","tglkeluar","jamkeluar","terlambat","akm terlambat","blk pemberi izin","ket", "action"];

        $calldata = ["nodaftar","keluar_kembali","tglmasuk","jammasuk","tglkeluar","jamkeluar","terlambat","akm_terlambat","blk_pemberi_izin","ket"];

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
