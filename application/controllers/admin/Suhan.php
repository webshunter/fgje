<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Suhan extends CI_Controller {

	private $table1 = 'suhan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/suhan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","no","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/suhan/view', $data);
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
                        'row' => ["id_biodata","no","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_suhan',
                        'data' => ["id_biodata","no","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_suhan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"no", "3"=>"tglterbit", "4"=>"tglexp", "5"=>"tglterima", "6"=>"tglsimpan", "7"=>"tglbawa", "8"=>"tglminta"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_suhan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/suhan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_suhan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/suhan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$no = post("no");
$tglterbit = post("tglterbit");
$tglexp = post("tglexp");
$tglterima = post("tglterima");
$tglsimpan = post("tglsimpan");
$tglbawa = post("tglbawa");
$tglminta = post("tglminta");

        

        $simpan = $this->db->query("
            INSERT INTO suhan
            (id_biodata,no,tglterbit,tglexp,tglterima,tglsimpan,tglbawa,tglminta) VALUES ('$id_biodata','$no','$tglterbit','$tglexp','$tglterima','$tglsimpan','$tglbawa','$tglminta')
        ");
    

        if($simpan){
            redirect('admin/suhan');
        }
    }

    public function update(){
          $key = post('id_suhan'); $id_biodata = post("id_biodata");
$no = post("no");
$tglterbit = post("tglterbit");
$tglexp = post("tglexp");
$tglterima = post("tglterima");
$tglsimpan = post("tglsimpan");
$tglbawa = post("tglbawa");
$tglminta = post("tglminta");

        $simpan = $this->db->query("
            UPDATE suhan SET  id_biodata = '$id_biodata', no = '$no', tglterbit = '$tglterbit', tglexp = '$tglexp', tglterima = '$tglterima', tglsimpan = '$tglsimpan', tglbawa = '$tglbawa', tglminta = '$tglminta' WHERE id_suhan = '$key'
            ");
    

        if($simpan){
            redirect('admin/suhan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-suhan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","no","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta", "action"];

        $calldata = ["id_biodata","no","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta"];

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
