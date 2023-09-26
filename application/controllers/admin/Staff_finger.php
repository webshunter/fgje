<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Staff_finger extends CI_Controller {

	private $table1 = 'staff_finger';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/staff_finger/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id","nama","dept","tgl","tm1 masuk","tm1 keluar","tm2 masuk","tm2 keluar","terlambat","pulang awal","absen","total","catatan", "action"]);
        $this->Createtable->order_set('0, 13');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/staff_finger/view', $data);
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
                        'row' => ["id","nama","dept","tgl","tm1_masuk","tm1_keluar","tm2_masuk","tm2_keluar","terlambat","pulang_awal","absen","total","catatan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_finger',
                        'data' => ["id","nama","dept","tgl","tm1_masuk","tm1_keluar","tm2_masuk","tm2_keluar","terlambat","pulang_awal","absen","total","catatan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_finger', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id", "2"=>"nama", "3"=>"dept", "4"=>"tgl", "5"=>"tm1_masuk", "6"=>"tm1_keluar", "7"=>"tm2_masuk", "8"=>"tm2_keluar", "9"=>"terlambat", "10"=>"pulang_awal", "11"=>"absen", "12"=>"total", "13"=>"catatan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_finger = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/staff_finger/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_finger = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/staff_finger/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id = post("id");
$nama = post("nama");
$dept = post("dept");
$tgl = post("tgl");
$tm1_masuk = post("tm1_masuk");
$tm1_keluar = post("tm1_keluar");
$tm2_masuk = post("tm2_masuk");
$tm2_keluar = post("tm2_keluar");
$terlambat = post("terlambat");
$pulang_awal = post("pulang_awal");
$absen = post("absen");
$total = post("total");
$catatan = post("catatan");

        

        $simpan = $this->db->query("
            INSERT INTO staff_finger
            (id,nama,dept,tgl,tm1_masuk,tm1_keluar,tm2_masuk,tm2_keluar,terlambat,pulang_awal,absen,total,catatan) VALUES ('$id','$nama','$dept','$tgl','$tm1_masuk','$tm1_keluar','$tm2_masuk','$tm2_keluar','$terlambat','$pulang_awal','$absen','$total','$catatan')
        ");
    

        if($simpan){
            redirect('admin/staff_finger');
        }
    }

    public function update(){
          $key = post('id_finger'); $id = post("id");
$nama = post("nama");
$dept = post("dept");
$tgl = post("tgl");
$tm1_masuk = post("tm1_masuk");
$tm1_keluar = post("tm1_keluar");
$tm2_masuk = post("tm2_masuk");
$tm2_keluar = post("tm2_keluar");
$terlambat = post("terlambat");
$pulang_awal = post("pulang_awal");
$absen = post("absen");
$total = post("total");
$catatan = post("catatan");

        $simpan = $this->db->query("
            UPDATE staff_finger SET  id = '$id', nama = '$nama', dept = '$dept', tgl = '$tgl', tm1_masuk = '$tm1_masuk', tm1_keluar = '$tm1_keluar', tm2_masuk = '$tm2_masuk', tm2_keluar = '$tm2_keluar', terlambat = '$terlambat', pulang_awal = '$pulang_awal', absen = '$absen', total = '$total', catatan = '$catatan' WHERE id_finger = '$key'
            ");
    

        if($simpan){
            redirect('admin/staff_finger');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-staff_finger.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id","nama","dept","tgl","tm1 masuk","tm1 keluar","tm2 masuk","tm2 keluar","terlambat","pulang awal","absen","total","catatan", "action"];

        $calldata = ["id","nama","dept","tgl","tm1_masuk","tm1_keluar","tm2_masuk","tm2_keluar","terlambat","pulang_awal","absen","total","catatan"];

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
