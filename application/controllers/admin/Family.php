<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Family extends CI_Controller {

	private $table1 = 'family';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/family/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nama bapak","umur bapak","kerja bapak","nama ibu","umur ibu","kerja ibu","nama istri suami","umur istri suami","kerja istri suami","saudara laki","saudar pr","anak ke","data anak", "action"]);
        $this->Createtable->order_set('0, 14');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/family/view', $data);
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
                        'row' => ["id_biodata","nama_bapak","umur_bapak","kerja_bapak","nama_ibu","umur_ibu","kerja_ibu","nama_istri_suami","umur_istri_suami","kerja_istri_suami","saudara_laki","saudar_pr","anak_ke","data_anak"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_family',
                        'data' => ["id_biodata","nama_bapak","umur_bapak","kerja_bapak","nama_ibu","umur_ibu","kerja_ibu","nama_istri_suami","umur_istri_suami","kerja_istri_suami","saudara_laki","saudar_pr","anak_ke","data_anak"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_family', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nama_bapak", "3"=>"umur_bapak", "4"=>"kerja_bapak", "5"=>"nama_ibu", "6"=>"umur_ibu", "7"=>"kerja_ibu", "8"=>"nama_istri_suami", "9"=>"umur_istri_suami", "10"=>"kerja_istri_suami", "11"=>"saudara_laki", "12"=>"saudar_pr", "13"=>"anak_ke", "14"=>"data_anak"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_family = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/family/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_family = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/family/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$nama_bapak = post("nama_bapak");
$umur_bapak = post("umur_bapak");
$kerja_bapak = post("kerja_bapak");
$nama_ibu = post("nama_ibu");
$umur_ibu = post("umur_ibu");
$kerja_ibu = post("kerja_ibu");
$nama_istri_suami = post("nama_istri_suami");
$umur_istri_suami = post("umur_istri_suami");
$kerja_istri_suami = post("kerja_istri_suami");
$saudara_laki = post("saudara_laki");
$saudar_pr = post("saudar_pr");
$anak_ke = post("anak_ke");
$data_anak = post("data_anak");

        

        $simpan = $this->db->query("
            INSERT INTO family
            (id_biodata,nama_bapak,umur_bapak,kerja_bapak,nama_ibu,umur_ibu,kerja_ibu,nama_istri_suami,umur_istri_suami,kerja_istri_suami,saudara_laki,saudar_pr,anak_ke,data_anak) VALUES ('$id_biodata','$nama_bapak','$umur_bapak','$kerja_bapak','$nama_ibu','$umur_ibu','$kerja_ibu','$nama_istri_suami','$umur_istri_suami','$kerja_istri_suami','$saudara_laki','$saudar_pr','$anak_ke','$data_anak')
        ");
    

        if($simpan){
            redirect('admin/family');
        }
    }

    public function update(){
          $key = post('id_family'); $id_biodata = post("id_biodata");
$nama_bapak = post("nama_bapak");
$umur_bapak = post("umur_bapak");
$kerja_bapak = post("kerja_bapak");
$nama_ibu = post("nama_ibu");
$umur_ibu = post("umur_ibu");
$kerja_ibu = post("kerja_ibu");
$nama_istri_suami = post("nama_istri_suami");
$umur_istri_suami = post("umur_istri_suami");
$kerja_istri_suami = post("kerja_istri_suami");
$saudara_laki = post("saudara_laki");
$saudar_pr = post("saudar_pr");
$anak_ke = post("anak_ke");
$data_anak = post("data_anak");

        $simpan = $this->db->query("
            UPDATE family SET  id_biodata = '$id_biodata', nama_bapak = '$nama_bapak', umur_bapak = '$umur_bapak', kerja_bapak = '$kerja_bapak', nama_ibu = '$nama_ibu', umur_ibu = '$umur_ibu', kerja_ibu = '$kerja_ibu', nama_istri_suami = '$nama_istri_suami', umur_istri_suami = '$umur_istri_suami', kerja_istri_suami = '$kerja_istri_suami', saudara_laki = '$saudara_laki', saudar_pr = '$saudar_pr', anak_ke = '$anak_ke', data_anak = '$data_anak' WHERE id_family = '$key'
            ");
    

        if($simpan){
            redirect('admin/family');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-family.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nama bapak","umur bapak","kerja bapak","nama ibu","umur ibu","kerja ibu","nama istri suami","umur istri suami","kerja istri suami","saudara laki","saudar pr","anak ke","data anak", "action"];

        $calldata = ["id_biodata","nama_bapak","umur_bapak","kerja_bapak","nama_ibu","umur_ibu","kerja_ibu","nama_istri_suami","umur_istri_suami","kerja_istri_suami","saudara_laki","saudar_pr","anak_ke","data_anak"];

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
