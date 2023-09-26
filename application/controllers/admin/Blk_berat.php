<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_berat extends CI_Controller {

	private $table1 = 'blk_berat';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_berat/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode berat","berat","ket", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_berat/view', $data);
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
                        'row' => ["kode_berat","berat","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_berat',
                        'data' => ["kode_berat","berat","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_berat', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_berat", "2"=>"berat", "3"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_berat = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_berat/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_berat = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_berat/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_berat = post("kode_berat");
$berat = post("berat");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_berat
            (kode_berat,berat,ket) VALUES ('$kode_berat','$berat','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_berat');
        }
    }

    public function update(){
          $key = post('id_berat'); $kode_berat = post("kode_berat");
$berat = post("berat");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_berat SET  kode_berat = '$kode_berat', berat = '$berat', ket = '$ket' WHERE id_berat = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_berat');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_berat.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode berat","berat","ket", "action"];

        $calldata = ["kode_berat","berat","ket"];

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
