<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_no_ranjang extends CI_Controller {

	private $table1 = 'blk_no_ranjang';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_no_ranjang/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode no ranjang","lokasi","ranjang","kasur","sprei","bantal","sarung bantal", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_no_ranjang/view', $data);
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
                        'row' => ["kode_no_ranjang","lokasi","ranjang","kasur","sprei","bantal","sarung_bantal"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_no_ranjang',
                        'data' => ["kode_no_ranjang","lokasi","ranjang","kasur","sprei","bantal","sarung_bantal"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_no_ranjang', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_no_ranjang", "2"=>"lokasi", "3"=>"ranjang", "4"=>"kasur", "5"=>"sprei", "6"=>"bantal", "7"=>"sarung_bantal"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_no_ranjang = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_no_ranjang/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_no_ranjang = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_no_ranjang/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_no_ranjang = post("kode_no_ranjang");
$lokasi = post("lokasi");
$ranjang = post("ranjang");
$kasur = post("kasur");
$sprei = post("sprei");
$bantal = post("bantal");
$sarung_bantal = post("sarung_bantal");

        

        $simpan = $this->db->query("
            INSERT INTO blk_no_ranjang
            (kode_no_ranjang,lokasi,ranjang,kasur,sprei,bantal,sarung_bantal) VALUES ('$kode_no_ranjang','$lokasi','$ranjang','$kasur','$sprei','$bantal','$sarung_bantal')
        ");
    

        if($simpan){
            redirect('admin/blk_no_ranjang');
        }
    }

    public function update(){
          $key = post('id_no_ranjang'); $kode_no_ranjang = post("kode_no_ranjang");
$lokasi = post("lokasi");
$ranjang = post("ranjang");
$kasur = post("kasur");
$sprei = post("sprei");
$bantal = post("bantal");
$sarung_bantal = post("sarung_bantal");

        $simpan = $this->db->query("
            UPDATE blk_no_ranjang SET  kode_no_ranjang = '$kode_no_ranjang', lokasi = '$lokasi', ranjang = '$ranjang', kasur = '$kasur', sprei = '$sprei', bantal = '$bantal', sarung_bantal = '$sarung_bantal' WHERE id_no_ranjang = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_no_ranjang');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_no_ranjang.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode no ranjang","lokasi","ranjang","kasur","sprei","bantal","sarung bantal", "action"];

        $calldata = ["kode_no_ranjang","lokasi","ranjang","kasur","sprei","bantal","sarung_bantal"];

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
