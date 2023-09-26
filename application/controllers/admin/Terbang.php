<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Terbang extends CI_Controller {

	private $table1 = 'terbang';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/terbang/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tanggalterbang","id terbang","statustgl","tiket","statusterbang","tglberangkat", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/terbang/view', $data);
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
                        'row' => ["id_biodata","tanggalterbang","id_terbang","statustgl","tiket","statusterbang","tglberangkat"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_dataterbang',
                        'data' => ["id_biodata","tanggalterbang","id_terbang","statustgl","tiket","statusterbang","tglberangkat"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_dataterbang', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tanggalterbang", "3"=>"id_terbang", "4"=>"statustgl", "5"=>"tiket", "6"=>"statusterbang", "7"=>"tglberangkat"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_dataterbang = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/terbang/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_dataterbang = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/terbang/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tanggalterbang = post("tanggalterbang");
$id_terbang = post("id_terbang");
$statustgl = post("statustgl");
$tiket = post("tiket");
$statusterbang = post("statusterbang");
$tglberangkat = post("tglberangkat");

        

        $simpan = $this->db->query("
            INSERT INTO terbang
            (id_biodata,tanggalterbang,id_terbang,statustgl,tiket,statusterbang,tglberangkat) VALUES ('$id_biodata','$tanggalterbang','$id_terbang','$statustgl','$tiket','$statusterbang','$tglberangkat')
        ");
    

        if($simpan){
            redirect('admin/terbang');
        }
    }

    public function update(){
          $key = post('id_dataterbang'); $id_biodata = post("id_biodata");
$tanggalterbang = post("tanggalterbang");
$id_terbang = post("id_terbang");
$statustgl = post("statustgl");
$tiket = post("tiket");
$statusterbang = post("statusterbang");
$tglberangkat = post("tglberangkat");

        $simpan = $this->db->query("
            UPDATE terbang SET  id_biodata = '$id_biodata', tanggalterbang = '$tanggalterbang', id_terbang = '$id_terbang', statustgl = '$statustgl', tiket = '$tiket', statusterbang = '$statusterbang', tglberangkat = '$tglberangkat' WHERE id_dataterbang = '$key'
            ");
    

        if($simpan){
            redirect('admin/terbang');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-terbang.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tanggalterbang","id terbang","statustgl","tiket","statusterbang","tglberangkat", "action"];

        $calldata = ["id_biodata","tanggalterbang","id_terbang","statustgl","tiket","statusterbang","tglberangkat"];

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
