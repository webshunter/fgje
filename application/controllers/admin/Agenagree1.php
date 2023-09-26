<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Agenagree1 extends CI_Controller {

	private $table1 = 'agenagree1';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/agenagree1/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","noagree1","tglberlaku1","tglberakhir1","tglterima1","id agen", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/agenagree1/view', $data);
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
                        'row' => ["noagree1","tglberlaku1","tglberakhir1","tglterima1","id_agen"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_agree1',
                        'data' => ["noagree1","tglberlaku1","tglberakhir1","tglterima1","id_agen"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_agree1', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"noagree1", "2"=>"tglberlaku1", "3"=>"tglberakhir1", "4"=>"tglterima1", "5"=>"id_agen"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_agree1 = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/agenagree1/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_agree1 = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/agenagree1/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $noagree1 = post("noagree1");
$tglberlaku1 = post("tglberlaku1");
$tglberakhir1 = post("tglberakhir1");
$tglterima1 = post("tglterima1");
$id_agen = post("id_agen");

        

        $simpan = $this->db->query("
            INSERT INTO agenagree1
            (noagree1,tglberlaku1,tglberakhir1,tglterima1,id_agen) VALUES ('$noagree1','$tglberlaku1','$tglberakhir1','$tglterima1','$id_agen')
        ");
    

        if($simpan){
            redirect('admin/agenagree1');
        }
    }

    public function update(){
          $key = post('id_agree1'); $noagree1 = post("noagree1");
$tglberlaku1 = post("tglberlaku1");
$tglberakhir1 = post("tglberakhir1");
$tglterima1 = post("tglterima1");
$id_agen = post("id_agen");

        $simpan = $this->db->query("
            UPDATE agenagree1 SET  noagree1 = '$noagree1', tglberlaku1 = '$tglberlaku1', tglberakhir1 = '$tglberakhir1', tglterima1 = '$tglterima1', id_agen = '$id_agen' WHERE id_agree1 = '$key'
            ");
    

        if($simpan){
            redirect('admin/agenagree1');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-agenagree1.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","noagree1","tglberlaku1","tglberakhir1","tglterima1","id agen", "action"];

        $calldata = ["noagree1","tglberlaku1","tglberakhir1","tglterima1","id_agen"];

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
