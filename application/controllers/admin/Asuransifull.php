<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Asuransifull extends CI_Controller {

	private $table1 = 'asuransifull';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/asuransifull/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","noasuransi","namaasuransi","tglasuransi","jumlah", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/asuransifull/view', $data);
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
                        'row' => ["id_biodata","noasuransi","namaasuransi","tglasuransi","jumlah"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_asuransi',
                        'data' => ["id_biodata","noasuransi","namaasuransi","tglasuransi","jumlah"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_asuransi', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"noasuransi", "3"=>"namaasuransi", "4"=>"tglasuransi", "5"=>"jumlah"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_asuransi = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/asuransifull/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_asuransi = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/asuransifull/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$noasuransi = post("noasuransi");
$namaasuransi = post("namaasuransi");
$tglasuransi = post("tglasuransi");
$jumlah = post("jumlah");

        

        $simpan = $this->db->query("
            INSERT INTO asuransifull
            (id_biodata,noasuransi,namaasuransi,tglasuransi,jumlah) VALUES ('$id_biodata','$noasuransi','$namaasuransi','$tglasuransi','$jumlah')
        ");
    

        if($simpan){
            redirect('admin/asuransifull');
        }
    }

    public function update(){
          $key = post('id_asuransi'); $id_biodata = post("id_biodata");
$noasuransi = post("noasuransi");
$namaasuransi = post("namaasuransi");
$tglasuransi = post("tglasuransi");
$jumlah = post("jumlah");

        $simpan = $this->db->query("
            UPDATE asuransifull SET  id_biodata = '$id_biodata', noasuransi = '$noasuransi', namaasuransi = '$namaasuransi', tglasuransi = '$tglasuransi', jumlah = '$jumlah' WHERE id_asuransi = '$key'
            ");
    

        if($simpan){
            redirect('admin/asuransifull');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-asuransifull.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","noasuransi","namaasuransi","tglasuransi","jumlah", "action"];

        $calldata = ["id_biodata","noasuransi","namaasuransi","tglasuransi","jumlah"];

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
