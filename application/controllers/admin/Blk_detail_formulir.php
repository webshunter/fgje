<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_detail_formulir extends CI_Controller {

	private $table1 = 'blk_detail_formulir';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_detail_formulir/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nodaftar","noserlok","ket","id formulir","statujk", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_detail_formulir/view', $data);
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
                        'row' => ["nodaftar","noserlok","ket","id_formulir","statujk"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_detail_formulir',
                        'data' => ["nodaftar","noserlok","ket","id_formulir","statujk"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_detail_formulir', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nodaftar", "2"=>"noserlok", "3"=>"ket", "4"=>"id_formulir", "5"=>"statujk"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_detail_formulir = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_detail_formulir/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_detail_formulir = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_detail_formulir/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nodaftar = post("nodaftar");
$noserlok = post("noserlok");
$ket = post("ket");
$id_formulir = post("id_formulir");
$statujk = post("statujk");

        

        $simpan = $this->db->query("
            INSERT INTO blk_detail_formulir
            (nodaftar,noserlok,ket,id_formulir,statujk) VALUES ('$nodaftar','$noserlok','$ket','$id_formulir','$statujk')
        ");
    

        if($simpan){
            redirect('admin/blk_detail_formulir');
        }
    }

    public function update(){
          $key = post('id_detail_formulir'); $nodaftar = post("nodaftar");
$noserlok = post("noserlok");
$ket = post("ket");
$id_formulir = post("id_formulir");
$statujk = post("statujk");

        $simpan = $this->db->query("
            UPDATE blk_detail_formulir SET  nodaftar = '$nodaftar', noserlok = '$noserlok', ket = '$ket', id_formulir = '$id_formulir', statujk = '$statujk' WHERE id_detail_formulir = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_detail_formulir');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_detail_formulir.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nodaftar","noserlok","ket","id formulir","statujk", "action"];

        $calldata = ["nodaftar","noserlok","ket","id_formulir","statujk"];

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
