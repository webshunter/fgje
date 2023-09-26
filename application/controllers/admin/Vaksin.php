<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Vaksin extends CI_Controller {

	private $table1 = 'vaksin';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/vaksin/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nama1","tgl1","nama2","tgl2","nama3","tgl3", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/vaksin/view', $data);
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
                        'row' => ["id_biodata","nama1","tgl1","nama2","tgl2","nama3","tgl3"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["id_biodata","nama1","tgl1","nama2","tgl2","nama3","tgl3"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nama1", "3"=>"tgl1", "4"=>"nama2", "5"=>"tgl2", "6"=>"nama3", "7"=>"tgl3"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/vaksin/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/vaksin/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$nama1 = post("nama1");
$tgl1 = post("tgl1");
$nama2 = post("nama2");
$tgl2 = post("tgl2");
$nama3 = post("nama3");
$tgl3 = post("tgl3");

        

        $simpan = $this->db->query("
            INSERT INTO vaksin
            (id_biodata,nama1,tgl1,nama2,tgl2,nama3,tgl3) VALUES ('$id_biodata','$nama1','$tgl1','$nama2','$tgl2','$nama3','$tgl3')
        ");
    

        if($simpan){
            redirect('admin/vaksin');
        }
    }

    public function update(){
          $key = post('id'); $id_biodata = post("id_biodata");
$nama1 = post("nama1");
$tgl1 = post("tgl1");
$nama2 = post("nama2");
$tgl2 = post("tgl2");
$nama3 = post("nama3");
$tgl3 = post("tgl3");

        $simpan = $this->db->query("
            UPDATE vaksin SET  id_biodata = '$id_biodata', nama1 = '$nama1', tgl1 = '$tgl1', nama2 = '$nama2', tgl2 = '$tgl2', nama3 = '$nama3', tgl3 = '$tgl3' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/vaksin');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-vaksin.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nama1","tgl1","nama2","tgl2","nama3","tgl3", "action"];

        $calldata = ["id_biodata","nama1","tgl1","nama2","tgl2","nama3","tgl3"];

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
