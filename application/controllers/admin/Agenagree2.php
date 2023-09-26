<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Agenagree2 extends CI_Controller {

	private $table1 = 'agenagree2';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/agenagree2/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","noagree2","tglberlaku2","tglberakhir2","tglterima2","id agen", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/agenagree2/view', $data);
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
                        'row' => ["noagree2","tglberlaku2","tglberakhir2","tglterima2","id_agen"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_agree2',
                        'data' => ["noagree2","tglberlaku2","tglberakhir2","tglterima2","id_agen"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_agree2', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"noagree2", "2"=>"tglberlaku2", "3"=>"tglberakhir2", "4"=>"tglterima2", "5"=>"id_agen"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_agree2 = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/agenagree2/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_agree2 = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/agenagree2/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $noagree2 = post("noagree2");
$tglberlaku2 = post("tglberlaku2");
$tglberakhir2 = post("tglberakhir2");
$tglterima2 = post("tglterima2");
$id_agen = post("id_agen");

        

        $simpan = $this->db->query("
            INSERT INTO agenagree2
            (noagree2,tglberlaku2,tglberakhir2,tglterima2,id_agen) VALUES ('$noagree2','$tglberlaku2','$tglberakhir2','$tglterima2','$id_agen')
        ");
    

        if($simpan){
            redirect('admin/agenagree2');
        }
    }

    public function update(){
          $key = post('id_agree2'); $noagree2 = post("noagree2");
$tglberlaku2 = post("tglberlaku2");
$tglberakhir2 = post("tglberakhir2");
$tglterima2 = post("tglterima2");
$id_agen = post("id_agen");

        $simpan = $this->db->query("
            UPDATE agenagree2 SET  noagree2 = '$noagree2', tglberlaku2 = '$tglberlaku2', tglberakhir2 = '$tglberakhir2', tglterima2 = '$tglterima2', id_agen = '$id_agen' WHERE id_agree2 = '$key'
            ");
    

        if($simpan){
            redirect('admin/agenagree2');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-agenagree2.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","noagree2","tglberlaku2","tglberakhir2","tglterima2","id agen", "action"];

        $calldata = ["noagree2","tglberlaku2","tglberakhir2","tglterima2","id_agen"];

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
