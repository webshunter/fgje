<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tugas extends CI_Controller {

	private $table1 = 'tugas';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/tugas/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","pekerjaan rt","merawat bayi","cacat","anak kecil","memasak","jompo", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tugas/view', $data);
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
                        'row' => ["id_biodata","pekerjaan_rt","merawat_bayi","cacat","anak_kecil","memasak","jompo"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_tugas',
                        'data' => ["id_biodata","pekerjaan_rt","merawat_bayi","cacat","anak_kecil","memasak","jompo"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_tugas', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"pekerjaan_rt", "3"=>"merawat_bayi", "4"=>"cacat", "5"=>"anak_kecil", "6"=>"memasak", "7"=>"jompo"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_tugas = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tugas/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_tugas = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tugas/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$pekerjaan_rt = post("pekerjaan_rt");
$merawat_bayi = post("merawat_bayi");
$cacat = post("cacat");
$anak_kecil = post("anak_kecil");
$memasak = post("memasak");
$jompo = post("jompo");

        

        $simpan = $this->db->query("
            INSERT INTO tugas
            (id_biodata,pekerjaan_rt,merawat_bayi,cacat,anak_kecil,memasak,jompo) VALUES ('$id_biodata','$pekerjaan_rt','$merawat_bayi','$cacat','$anak_kecil','$memasak','$jompo')
        ");
    

        if($simpan){
            redirect('admin/tugas');
        }
    }

    public function update(){
          $key = post('id_tugas'); $id_biodata = post("id_biodata");
$pekerjaan_rt = post("pekerjaan_rt");
$merawat_bayi = post("merawat_bayi");
$cacat = post("cacat");
$anak_kecil = post("anak_kecil");
$memasak = post("memasak");
$jompo = post("jompo");

        $simpan = $this->db->query("
            UPDATE tugas SET  id_biodata = '$id_biodata', pekerjaan_rt = '$pekerjaan_rt', merawat_bayi = '$merawat_bayi', cacat = '$cacat', anak_kecil = '$anak_kecil', memasak = '$memasak', jompo = '$jompo' WHERE id_tugas = '$key'
            ");
    

        if($simpan){
            redirect('admin/tugas');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-tugas.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","pekerjaan rt","merawat bayi","cacat","anak kecil","memasak","jompo", "action"];

        $calldata = ["id_biodata","pekerjaan_rt","merawat_bayi","cacat","anak_kecil","memasak","jompo"];

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
