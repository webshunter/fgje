<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jadwal_data_tki_delete extends CI_Controller {

	private $table1 = 'blk_jadwal_data_tki_delete';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jadwal_data_tki_delete/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","biodata id","angkatan","hari","tdk hadir","jam","tipe data","nonaktif flag","jadwal paketjadwal id","jadwal data id","jadwal data tki id", "action"]);
        $this->Createtable->order_set('0, 10');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal_data_tki_delete/view', $data);
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
                        'row' => ["biodata_id","angkatan","hari","tdk_hadir","jam","tipe_data","nonaktif_flag","jadwal_paketjadwal_id","jadwal_data_id","jadwal_data_tki_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_jadwal_data_tki_delete',
                        'data' => ["biodata_id","angkatan","hari","tdk_hadir","jam","tipe_data","nonaktif_flag","jadwal_paketjadwal_id","jadwal_data_id","jadwal_data_tki_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_jadwal_data_tki_delete', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"biodata_id", "2"=>"angkatan", "3"=>"hari", "4"=>"tdk_hadir", "5"=>"jam", "6"=>"tipe_data", "7"=>"nonaktif_flag", "8"=>"jadwal_paketjadwal_id", "9"=>"jadwal_data_id", "10"=>"jadwal_data_tki_id"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_jadwal_data_tki_delete = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jadwal_data_tki_delete/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_jadwal_data_tki_delete = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal_data_tki_delete/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $biodata_id = post("biodata_id");
$angkatan = post("angkatan");
$hari = post("hari");
$tdk_hadir = post("tdk_hadir");
$jam = post("jam");
$tipe_data = post("tipe_data");
$nonaktif_flag = post("nonaktif_flag");
$jadwal_paketjadwal_id = post("jadwal_paketjadwal_id");
$jadwal_data_id = post("jadwal_data_id");
$jadwal_data_tki_id = post("jadwal_data_tki_id");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jadwal_data_tki_delete
            (biodata_id,angkatan,hari,tdk_hadir,jam,tipe_data,nonaktif_flag,jadwal_paketjadwal_id,jadwal_data_id,jadwal_data_tki_id) VALUES ('$biodata_id','$angkatan','$hari','$tdk_hadir','$jam','$tipe_data','$nonaktif_flag','$jadwal_paketjadwal_id','$jadwal_data_id','$jadwal_data_tki_id')
        ");
    

        if($simpan){
            redirect('admin/blk_jadwal_data_tki_delete');
        }
    }

    public function update(){
          $key = post('id_jadwal_data_tki_delete'); $biodata_id = post("biodata_id");
$angkatan = post("angkatan");
$hari = post("hari");
$tdk_hadir = post("tdk_hadir");
$jam = post("jam");
$tipe_data = post("tipe_data");
$nonaktif_flag = post("nonaktif_flag");
$jadwal_paketjadwal_id = post("jadwal_paketjadwal_id");
$jadwal_data_id = post("jadwal_data_id");
$jadwal_data_tki_id = post("jadwal_data_tki_id");

        $simpan = $this->db->query("
            UPDATE blk_jadwal_data_tki_delete SET  biodata_id = '$biodata_id', angkatan = '$angkatan', hari = '$hari', tdk_hadir = '$tdk_hadir', jam = '$jam', tipe_data = '$tipe_data', nonaktif_flag = '$nonaktif_flag', jadwal_paketjadwal_id = '$jadwal_paketjadwal_id', jadwal_data_id = '$jadwal_data_id', jadwal_data_tki_id = '$jadwal_data_tki_id' WHERE id_jadwal_data_tki_delete = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jadwal_data_tki_delete');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jadwal_data_tki_delete.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","biodata id","angkatan","hari","tdk hadir","jam","tipe data","nonaktif flag","jadwal paketjadwal id","jadwal data id","jadwal data tki id", "action"];

        $calldata = ["biodata_id","angkatan","hari","tdk_hadir","jam","tipe_data","nonaktif_flag","jadwal_paketjadwal_id","jadwal_data_id","jadwal_data_tki_id"];

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
