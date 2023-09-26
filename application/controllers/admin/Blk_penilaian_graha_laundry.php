<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_penilaian_graha_laundry extends CI_Controller {

	private $table1 = 'blk_penilaian_graha_laundry';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_penilaian_graha_laundry/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","no daftar","tgl","penilai id","id nilai","id materi", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_penilaian_graha_laundry/view', $data);
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
                        'row' => ["no_daftar","tgl","penilai_id","id_nilai","id_materi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_penilaian_graha_laundry',
                        'data' => ["no_daftar","tgl","penilai_id","id_nilai","id_materi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_penilaian_graha_laundry', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"no_daftar", "2"=>"tgl", "3"=>"penilai_id", "4"=>"id_nilai", "5"=>"id_materi"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_penilaian_graha_laundry = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_penilaian_graha_laundry/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_penilaian_graha_laundry = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_penilaian_graha_laundry/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $no_daftar = post("no_daftar");
$tgl = post("tgl");
$penilai_id = post("penilai_id");
$id_nilai = post("id_nilai");
$id_materi = post("id_materi");

        

        $simpan = $this->db->query("
            INSERT INTO blk_penilaian_graha_laundry
            (no_daftar,tgl,penilai_id,id_nilai,id_materi) VALUES ('$no_daftar','$tgl','$penilai_id','$id_nilai','$id_materi')
        ");
    

        if($simpan){
            redirect('admin/blk_penilaian_graha_laundry');
        }
    }

    public function update(){
          $key = post('id_penilaian_graha_laundry'); $no_daftar = post("no_daftar");
$tgl = post("tgl");
$penilai_id = post("penilai_id");
$id_nilai = post("id_nilai");
$id_materi = post("id_materi");

        $simpan = $this->db->query("
            UPDATE blk_penilaian_graha_laundry SET  no_daftar = '$no_daftar', tgl = '$tgl', penilai_id = '$penilai_id', id_nilai = '$id_nilai', id_materi = '$id_materi' WHERE id_penilaian_graha_laundry = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_penilaian_graha_laundry');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_penilaian_graha_laundry.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","no daftar","tgl","penilai id","id nilai","id materi", "action"];

        $calldata = ["no_daftar","tgl","penilai_id","id_nilai","id_materi"];

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
