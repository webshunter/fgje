<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dataagen_fee_tki_terbang_copy extends CI_Controller {

	private $table1 = 'dataagen_fee_tki_terbang_copy';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/dataagen_fee_tki_terbang_copy/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tgl1","tgl2","catatan","tgl transfer","pilihan","group","agen","jenis tki","data","agen list","date created","deleted at", "action"]);
        $this->Createtable->order_set('0, 12');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_fee_tki_terbang_copy/view', $data);
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
                        'row' => ["tgl1","tgl2","catatan","tgl_transfer","pilihan","group","agen","jenis_tki","data","agen_list","date_created","deleted_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tgl1","tgl2","catatan","tgl_transfer","pilihan","group","agen","jenis_tki","data","agen_list","date_created","deleted_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tgl1", "2"=>"tgl2", "3"=>"catatan", "4"=>"tgl_transfer", "5"=>"pilihan", "6"=>"group", "7"=>"agen", "8"=>"jenis_tki", "9"=>"data", "10"=>"agen_list", "11"=>"date_created", "12"=>"deleted_at"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/dataagen_fee_tki_terbang_copy/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_fee_tki_terbang_copy/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tgl1 = post("tgl1");
$tgl2 = post("tgl2");
$catatan = post("catatan");
$tgl_transfer = post("tgl_transfer");
$pilihan = post("pilihan");
$group = post("group");
$agen = post("agen");
$jenis_tki = post("jenis_tki");
$data = post("data");
$agen_list = post("agen_list");
$date_created = post("date_created");
$deleted_at = post("deleted_at");

        

        $simpan = $this->db->query("
            INSERT INTO dataagen_fee_tki_terbang_copy
            (tgl1,tgl2,catatan,tgl_transfer,pilihan,group,agen,jenis_tki,data,agen_list,date_created,deleted_at) VALUES ('$tgl1','$tgl2','$catatan','$tgl_transfer','$pilihan','$group','$agen','$jenis_tki','$data','$agen_list','$date_created','$deleted_at')
        ");
    

        if($simpan){
            redirect('admin/dataagen_fee_tki_terbang_copy');
        }
    }

    public function update(){
          $key = post('id'); $tgl1 = post("tgl1");
$tgl2 = post("tgl2");
$catatan = post("catatan");
$tgl_transfer = post("tgl_transfer");
$pilihan = post("pilihan");
$group = post("group");
$agen = post("agen");
$jenis_tki = post("jenis_tki");
$data = post("data");
$agen_list = post("agen_list");
$date_created = post("date_created");
$deleted_at = post("deleted_at");

        $simpan = $this->db->query("
            UPDATE dataagen_fee_tki_terbang_copy SET  tgl1 = '$tgl1', tgl2 = '$tgl2', catatan = '$catatan', tgl_transfer = '$tgl_transfer', pilihan = '$pilihan', group = '$group', agen = '$agen', jenis_tki = '$jenis_tki', data = '$data', agen_list = '$agen_list', date_created = '$date_created', deleted_at = '$deleted_at' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/dataagen_fee_tki_terbang_copy');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-dataagen_fee_tki_terbang_copy.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tgl1","tgl2","catatan","tgl transfer","pilihan","group","agen","jenis tki","data","agen list","date created","deleted at", "action"];

        $calldata = ["tgl1","tgl2","catatan","tgl_transfer","pilihan","group","agen","jenis_tki","data","agen_list","date_created","deleted_at"];

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
